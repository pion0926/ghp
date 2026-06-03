<?php 
include "../include/admin_check.php"; // 관리자 확인 (필요에 따라 주석 해제 또는 사용)
include "../include/header.php"; 
include "../include/db_connect.php"; // 데이터베이스 연결

// --- 검색 변수 처리 ---
// GET 파라미터에서 검색 옵션과 검색어 가져오기 (XSS 방지)
$search_option = isset($_GET['search_option']) ? htmlspecialchars($_GET['search_option'], ENT_QUOTES, 'UTF-8') : '';
$search_info = isset($_GET['search_info']) ? htmlspecialchars($_GET['search_info'], ENT_QUOTES, 'UTF-8') : '';
$where_sql = ""; // WHERE 절 초기화
$search_param_type = ""; // Prepared statement 타입 초기화
$search_param_val = []; // Prepared statement 값 초기화

// 검색어가 있을 경우 WHERE 절 구성
if (!empty($search_info)) {
    $search_term = "%" . $search_info . "%"; // LIKE 검색을 위한 와일드카드 추가
    if ($search_option === '제목') {
        $where_sql = " WHERE title LIKE ?";
        $search_param_type = "s"; // string
        $search_param_val[] = $search_term;
    } elseif ($search_option === '내용') {
        $where_sql = " WHERE content LIKE ?"; // content 컬럼 검색 (DB에 content 컬럼 필요)
        $search_param_type = "s";
        $search_param_val[] = $search_term;
    } elseif ($search_option === '작성자') { // 작성자 검색 추가 예시
        $where_sql = " WHERE author LIKE ?";
        $search_param_type = "s";
        $search_param_val[] = $search_term;
    } else { 
        // 기본 검색 (제목 또는 내용) - DB 부하 고려 필요
        $where_sql = " WHERE title LIKE ? OR content LIKE ?";
        $search_param_type = "ss";
        $search_param_val[] = $search_term;
        $search_param_val[] = $search_term;
    }
}

// --- 페이지네이션 변수 처리 ---
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 현재 페이지, 없으면 1
$list_num = 10; // 페이지 당 보여줄 게시글 수
$page_num = 10; // 페이지 블록 당 보여줄 페이지 수
$start = ($page - 1) * $list_num; // 가져올 게시글의 시작 위치 (offset)

// --- ★★★ WHERE 절 조합 (is_deleted = 0 추가) ★★★ ---
$combined_where = " WHERE is_deleted = 0";
if (!empty($where_sql)) {
    // 검색 조건이 있으면, 'WHERE'를 'AND' 로 바꾸고 'is_deleted=0' 뒤에 추가
    $combined_where .= " AND (" . substr($where_sql, 7) . ")"; 
}

// --- 전체 게시글 수 조회 ---
$count_sql = "SELECT COUNT(*) as cnt FROM notices" . $combined_where; // 조합된 WHERE 사용
$stmt_count = $conn->prepare($count_sql);

// 검색 파라미터 바인딩 (is_deleted=0 은 값이므로 바인딩 불필요)
if (!empty($search_param_type)) { 
    // 바인딩 로직 (이전 코드와 동일하게 유지)
    $bind_params_count = [$search_param_type];
    foreach ($search_param_val as $key => &$val) { 
        $bind_params_count[] = $val;
    }
    unset($val); 
    // PHP 5.6 이상 Splat operator 사용 권장
    if (version_compare(PHP_VERSION, '5.6.0', '>=')) {
        $stmt_count->bind_param(...$bind_params_count);
    } else {
        call_user_func_array([$stmt_count, 'bind_param'], $bind_params_count);
    }
}

$stmt_count->execute();
$result_count = $stmt_count->get_result();
$row_count = $result_count->fetch_assoc();
$total_count = $row_count['cnt']; 
$stmt_count->close();


// --- 페이지네이션 계산 ---
$total_page = ceil($total_count / $list_num); // 전체 페이지 수
$total_block = ceil($total_page / $page_num); // 전체 페이지 블록 수
$now_block = ceil($page / $page_num); // 현재 페이지 블록
$s_page = ($now_block - 1) * $page_num + 1; // 현재 블록의 시작 페이지
if ($s_page <= 0) $s_page = 1;
$e_page = $now_block * $page_num; // 현재 블록의 마지막 페이지
if ($e_page > $total_page) $e_page = $total_page;

// --- ★★★ 게시글 목록 조회 (수정된 WHERE 절 + LIMIT) ★★★ ---
$list_sql = "SELECT sno, title, author, created_at, views FROM notices" 
            . $combined_where // 조합된 WHERE 사용
            . " ORDER BY sno DESC LIMIT ?, ?"; // LIMIT 파라미터 추가

$stmt_list = $conn->prepare($list_sql);
if (!$stmt_list) {
    // prepare 실패 시 에러 메시지 출력
    die("SQL prepare 실패 (게시글 목록 조회): " . $conn->error);
}
// 파라미터 바인딩 (검색 파라미터 + LIMIT 파라미터)
$limit_param_type = "ii"; 
$limit_param_val = [$start, $list_num];

// 검색 파라미터와 LIMIT 파라미터 결합
$all_param_type = $search_param_type . $limit_param_type; 
$all_param_val = array_merge($search_param_val, $limit_param_val); 

if (!empty($all_param_type)) {
    // 바인딩 로직 (이전 코드와 동일하게 유지)
    $bind_params_list = [$all_param_type];
    foreach ($all_param_val as $key => &$val) { 
        $bind_params_list[] = $val;
    }
    unset($val);
    // PHP 5.6 이상 Splat operator 사용 권장
    if (version_compare(PHP_VERSION, '5.6.0', '>=')) {
        $stmt_list->bind_param(...$bind_params_list);
    } else {
        call_user_func_array([$stmt_list, 'bind_param'], $bind_params_list);
    }
}

$stmt_list->execute();
$result_list = $stmt_list->get_result();
$notices_list = [];

if($result_list) {
    while($row = $result_list->fetch_assoc()) {
        $notices_list[] = $row;
    }
}
$stmt_list->close();
$conn->close(); // 데이터베이스 연결 종료
?>

<div id="news" class="wrap">
    <script>
    // 기존 스크립트 유지
    $(function(){
        // LNB 타이틀을 '전체' 또는 선택된 카테고리로 설정 (카테고리 기능 구현 시 필요)
        var navPageTitle = $(".depth2 li.active a").text() || '전체'; 
        $(".subTop #lnb > a").text(navPageTitle); 

        $(document).on("click", "#lnb > a", function(e){
            e.preventDefault();
            $("#lnb > div").slideToggle(100);
        });
    });
    $(window).on("load resize", function() {
        var wid_w = $(window).width();
        if(wid_w > 1279){
            $("#lnb > div").removeAttr("style");
        }
    });
    </script>
    <div class="subTop">
        <div class="pageGroup">
            <h2>공지</h2>
        </div>
        <div id="lnb">
             <a href="/web_basic/board/list.php?pagen=285">전체</a> 
            <div class="depth2">
                <ul>
                    <li class="<?php echo empty($_GET['CATENUM']) ? 'active' : ''; ?>"><a href="/web_basic/board/list.php?pagen=285" id="depthname">전체</a></li>
                    </ul>
            </div>
        </div>
    </div>
    <section id="container" class="news group_num_217">
        <div class="contents page_285">
            <div class="boardWrap">
                <div class="boardList">
                    <?php if (function_exists('isAdmin') && isAdmin()): ?>
                        <div class="boardManage">
                            <a href="/web_basic/board/write.php" class="btnWrite">글 작성</a> 
                        </div>
                    <?php endif; ?>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">번호</th>
                                <th scope="col">제목</th>
                                <th scope="col">작성자</th>
                                <th scope="col">작성일</th>
                                <th scope="col">조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($notices_list)): ?>
                                <?php 
                                // 게시글 번호 계산 (역순으로 표시)
                                $current_list_num = $total_count - ($page - 1) * $list_num; 
                                ?>
                                <?php foreach ($notices_list as $notice): ?>
                                <tr>
                                    <td><?php echo $current_list_num--; ?></td>
                                    <td class="title">
                                        <a href="/web_basic/board/view.php?sno=<?php echo $notice['sno']; ?><?php echo !empty($search_info) ? '&search_option='.urlencode($search_option).'&search_info='.urlencode($search_info) : ''; ?><?php echo $page > 1 ? '&page='.$page : ''; ?>">
                                            <?php echo htmlspecialchars($notice['title']); ?>
                                        </a>
                                    </td>
                                    <td><?php echo htmlspecialchars($notice['author']); ?></td>
                                    <td><?php echo date("Y-m-d", strtotime($notice['created_at'])); // 날짜 형식 지정 ?></td>
                                    <td><?php echo $notice['views']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">등록된 게시글이 없습니다. <?php echo !empty($search_info) ? '검색 결과가 없습니다.' : ''; ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    <?php if ($page > 1): // 처음 페이지 버튼 ?>
                        <a href="/web_basic/board/list.php?pagen=285<?php echo !empty($search_info) ? '&search_option='.urlencode($search_option).'&search_info='.urlencode($search_info) : ''; ?>&page=1">처음</a>
                    <?php endif; ?>
                    <?php if ($now_block > 1): // 이전 블록 버튼 ?>
                        <a href="/web_basic/board/list.php?pagen=285<?php echo !empty($search_info) ? '&search_option='.urlencode($search_option).'&search_info='.urlencode($search_info) : ''; ?>&page=<?php echo $s_page - 1; ?>">이전</a>
                    <?php endif; ?>

                    <?php for ($p = $s_page; $p <= $e_page; $p++): // 현재 블록 페이지 번호 ?>
                        <a href="/web_basic/board/list.php?pagen=285<?php echo !empty($search_info) ? '&search_option='.urlencode($search_option).'&search_info='.urlencode($search_info) : ''; ?>&page=<?php echo $p; ?>" 
                           class="<?php echo ($p == $page) ? 'active' : ''; ?>">
                           <?php echo $p; ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($now_block < $total_block): // 다음 블록 버튼 ?>
                        <a href="/web_basic/board/list.php?pagen=285<?php echo !empty($search_info) ? '&search_option='.urlencode($search_option).'&search_info='.urlencode($search_info) : ''; ?>&page=<?php echo $e_page + 1; ?>">다음</a>
                    <?php endif; ?>
                     <?php if ($page < $total_page): // 마지막 페이지 버튼 ?>
                        <a href="/web_basic/board/list.php?pagen=285<?php echo !empty($search_info) ? '&search_option='.urlencode($search_option).'&search_info='.urlencode($search_info) : ''; ?>&page=<?php echo $total_page; ?>">맨끝</a>
                    <?php endif; ?>
                </div>

                <fieldset class="searchArea">
                    <form action="/web_basic/board/list.php" name="searchform" method="GET">
                        <input type="hidden" name="pagen" value="285"> 
                        <div class="boardSearch">
                            <label class="lhide" for="search">검색할 조건을 선택해주세요</label>
                            <select class="select" name="search_option" id="search" title="검색할 조건을 선택해주세요">
                                <option value="제목" <?php echo $search_option === '제목' ? 'selected' : ''; ?>>제목</option>
                                <option value="작성자" <?php echo $search_option === '작성자' ? 'selected' : ''; ?>>작성자</option> 
                            </select>
                            <div class="searchBox">
                                <label class="lhide" for="searchtext">검색어를 입력하세요.</label>
                                <input type="text" class="text" placeholder="검색어를 입력해주세요." title="검색어를 입력해주세요." name="search_info" value="<?php echo $search_info; ?>" id="searchtext">
                                <input type="submit" value="검색">
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
</div>

<div id="donationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeDonationModal()">&times;</span>
        <h2>준비중입니다</h2>
        <p>현재 후원하기 기능은 준비 중입니다. 나중에 다시 시도해 주세요.</p>
        <div class="form-buttons">
            <button type="button" class="btnCancel" onclick="closeDonationModal()">닫기</button>
        </div>
    </div>
</div>

<style>
/* 기존 스타일 */
.boardList table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

.boardList th,
.boardList td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #e2e8f0;
    font-size: 14px; /* 폰트 크기 조정 */
}

.boardList th {
    background: #f8fafc;
    font-weight: 600;
    color: #2c5282;
}

.boardList td.title {
    text-align: left;
}

.boardList td.title a {
    color: #2d3748;
    text-decoration: none;
    transition: color 0.2s;
}

.boardList td.title a:hover {
    color: #2c5282;
}

/* 페이지네이션 스타일 */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center; /* 세로 정렬 */
    gap: 5px;
    margin-bottom: 30px;
}

.pagination a {
    display: inline-flex; /* flex 아이템 정렬 위해 */
    justify-content: center;
    align-items: center;
    min-width: 32px; /* 최소 너비 */
    height: 32px; /* 높이 고정 */
    padding: 0 10px; /* 내부 좌우 여백 */
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    color: #4a5568;
    text-decoration: none;
    transition: all 0.2s;
    font-size: 13px; /* 폰트 크기 */
}

.pagination a:hover,
.pagination a.active {
    background: #2c5282;
    color: white;
    border-color: #2c5282;
}

/* 검색 영역 스타일 */
.searchArea {
    border: none;
    margin-top: 20px;
    padding: 20px; /* 안쪽 여백 추가 */
    background-color: #f8fafc; /* 배경색 추가 */
    border-radius: 8px; /* 둥근 모서리 */
}

.boardSearch {
    display: flex;
    justify-content: center;
    gap: 10px;
    align-items: center;
}

.boardSearch .select {
    padding: 8px;
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    min-width: 100px;
    height: 38px; /* 높이 통일 */
    font-size: 14px;
}

.searchBox {
    display: flex;
    gap: 10px;
}

.searchBox .text {
    padding: 8px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    min-width: 250px; /* 너비 조정 */
    height: 38px; /* 높이 통일 */
    font-size: 14px;
}

.searchBox input[type="submit"] {
    padding: 8px 16px;
    background: #2c5282;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.2s;
    height: 38px; /* 높이 통일 */
    font-size: 14px;
}

.searchBox input[type="submit"]:hover {
    background: #2b6cb0;
}

.lhide { /* 스크린 리더용 숨김 텍스트 */
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}

/* 글쓰기 버튼 */
.boardManage {
    margin-bottom: 20px;
    text-align: right;
}

.btnWrite {
    display: inline-block;
    padding: 10px 20px; /* 크기 조정 */
    background: #2c5282;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.2s;
    font-size: 14px; /* 폰트 크기 */
}

.btnWrite:hover {
    background: #2b6cb0;
}

/* 모달 스타일 (기존 유지) */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4);
}
.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    max-width: 600px;
    border-radius: 8px;
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}
.close:hover {
    color: black;
}
.form-buttons {
    margin-top: 30px;
    text-align: right;
}
.form-buttons button {
    padding: 10px 20px;
    margin-left: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}
.form-buttons .btnSubmit {
    background-color: #2c5282;
    color: white;
}
.form-buttons .btnCancel {
    background-color: #6c757d;
    color: white;
}
</style>

<script>
function closeDonationModal() {
    document.getElementById('donationModal').style.display = 'none';
}
// 모달 닫기 버튼 이벤트
// 스크립트 실행 시점에 .close 요소가 없을 수 있으므로 DOM 로드 후 실행하도록 변경
document.addEventListener('DOMContentLoaded', (event) => {
    const closeModalButton = document.querySelector('#donationModal .close');
    if(closeModalButton) {
      closeModalButton.onclick = closeDonationModal;
    }
});

// 모달 외부 클릭 시 닫기
window.onclick = function(event) {
    const modal = document.getElementById('donationModal');
    if (event.target == modal) {
        closeDonationModal();
    }
}
</script>

<?php include "../include/footer.php"; ?>