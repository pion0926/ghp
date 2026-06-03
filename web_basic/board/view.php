<?php 
// 데이터베이스 연결 파일 포함
include "../include/header.php"; 
include "../include/db_connect.php"; 


$notice = null; 
$error_message = null; 

// URL에서 sno 가져오기
$sno = isset($_GET['sno']) ? intval($_GET['sno']) : 0;

if ($sno > 0) {
    if ($conn) {
        try {
            // --- 조회수 증가 처리 ---
            $view_update_key = 'notice_view_' . $sno;
            if (!isset($_SESSION[$view_update_key])) {
                $sql_update_view = "UPDATE notices SET views = views + 1 WHERE sno = ?";
                $stmt_update_view = $conn->prepare($sql_update_view);
                if ($stmt_update_view) {
                    $stmt_update_view->bind_param("i", $sno);
                    $stmt_update_view->execute();
                    $stmt_update_view->close();
                    $_SESSION[$view_update_key] = true; 
                } else {
                     error_log("Failed to prepare statement for view count update: " . $conn->error);
                }
            }

            // --- 게시글 데이터 조회 ---
            // category 컬럼 제거, image 컬럼 추가
            $sql = "SELECT sno, title, content, author, created_at, views, image FROM notices WHERE sno = ?"; 
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("i", $sno); 
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) { // $result 유효성 검사 추가
                    $notice = $result->fetch_assoc(); 
                } else {
                    // 쿼리는 성공했지만 결과가 없는 경우
                    $error_message = "요청하신 게시물을 찾을 수 없습니다.";
                }
                $stmt->close();
            } else {
                 // prepare 실패
                 $error_message = "데이터를 조회하는 중 오류가 발생했습니다. (Statement Error)";
                 error_log("Failed to prepare statement for notice select: " . $conn->error);
            }

        } catch (Exception $e) {
            $error_message = "데이터베이스 처리 중 오류가 발생했습니다: " . $e->getMessage();
            error_log("Database error in view.php: " . $e->getMessage());
        }
        
        // 데이터베이스 연결 종료는 footer.php에서 처리될 수 있음
        // $conn->close(); 

    } else {
        $error_message = "데이터베이스에 연결할 수 없습니다.";
        error_log("Database connection failed in view.php.");
    }
} else {
    $error_message = "잘못된 접근입니다. 게시글 번호가 올바르지 않습니다.";
}

$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true; // 관리자 여부 확인 (실제 구현에 맞게 수정)

?>

<div id="news" class="wrap">
    <script>
    // 기존 스크립트 유지
    $(function(){
        var navPageTitle = $(".depth2 .active").text() || '전체'; 
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
                    <li class="active"><a href="/web_basic/board/list.php?pagen=285" id="depthname">전체</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section id="container" class="news group_num_217">
        <div class="contents page_286">
            <div class="contenstView">
                <div class="boardWrap">
                    <?php if ($notice): // $notice 변수에 데이터가 있을 때만 출력 ?>
                    <div class="boardView">
                        <div class="viewTop">
                            <h3><?php echo htmlspecialchars($notice['title']); ?></h3>
                            <div class="viewInfo">
                                <dl>
                                    <dt>작성자</dt>
                                    <dd><?php echo htmlspecialchars($notice['author']); ?></dd>
                                </dl>
                                <dl>
                                    <dt>작성일</dt>
                                    <dd><?php echo date("Y-m-d", strtotime($notice['created_at'])); ?></dd> 
                                </dl>
                                <dl>
                                    <dt>조회수</dt>
                                    <dd><?php echo $notice['views']; ?></dd>
                                </dl>
                                </div>
                        </div>
                        <div class="viewContent">
                            <?php 
                            // 이미지 표시 로직 (필요한 경우 추가)
                            if (!empty($notice['image'])) {
                                // 웹 브라우저에서 접근 가능한 이미지 경로 설정 (★★★ 중요: 실제 경로 확인 및 수정 필요 ★★★)
                                // 예시: 웹사이트 루트의 'uploads/images/' 폴더 안에 이미지가 저장된 경우
                                // 만약 /web_basic/ 폴더가 웹 루트라면 '/web_basic/uploads/images/' 형태가 될 수 있습니다.
                                $image_web_path = '/web_basic/uploads/images/' . htmlspecialchars($notice['image']); 

                                // (선택 사항) 실제 서버에 파일이 존재하는지 확인 후 표시 (더 안전함)
                                // 서버 상의 절대 경로를 확인해야 합니다. $_SERVER['DOCUMENT_ROOT'] 사용 예시.
                                // ★★★ 중요: 서버 환경에 맞게 경로를 정확히 설정해야 합니다. ★★★
                                $image_server_path = $_SERVER['DOCUMENT_ROOT'] . '/web_basic/uploads/images/' . $notice['image']; 

                                if (file_exists($image_server_path)) {
                                    echo '<div class="notice-image-wrapper" style="text-align: center; margin-bottom: 30px;">'; // 이미지 중앙 정렬 및 하단 여백
                                    echo '<img src="' . $image_web_path . '" alt="' . htmlspecialchars($notice['title']) . ' 첨부 이미지" style="max-width: 80%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">'; // 크기, 스타일 조정
                                    echo '</div>';
                                } else {
                                    // 파일이 DB에는 기록되었으나 서버에 존재하지 않는 경우 (오류 로깅 등)
                                    error_log("Image file not found for notice sno=" . $notice['sno'] . ": " . $image_server_path);
                                    // echo "<p><em>[이미지 파일을 찾을 수 없습니다.]</em></p>"; // 사용자에게 메시지 표시 (선택 사항)
                                }
                            }
                            
                            // HTML 내용 출력
                            echo $notice['content']; 
                            ?>
                        </div>
                        <div class="viewBottom">
                            <div class="btnWrap">
                                <a href="/web_basic/board/list.php?pagen=285" class="btnList">목록</a>
                                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1): ?>
                                    <div class="btnGroup">
                                        <a href="edit.php?sno=<?= htmlspecialchars($sno) ?>" class="btnEdit">수정</a>
                                        <a href="delete_process.php?sno=<?= htmlspecialchars($sno) ?>" class="btnDelete" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php else: // $notice 변수가 비어있거나 null일 때 (게시글을 찾지 못했거나 오류 발생 시) ?>
                    <div class="error-message">
                        <p><?php echo $error_message ?: "게시물을 불러오는 데 실패했습니다."; // 설정된 오류 메시지 출력 ?></p>
                        <div class="btnWrap">
                            <a href="/web_basic/board/list.php?pagen=285" class="btnList">목록</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* 기존 스타일 유지 */
.notice-content { max-width: 1000px; margin: 0 auto; padding: 20px; }
.notice-header { text-align: center; margin-bottom: 40px; }
.notice-header h3 { color: #333; margin-bottom: 15px; }
.notice-section { margin-bottom: 40px; }
.notice-section h4 { color: #2c5282; border-bottom: 2px solid #2c5282; padding-bottom: 10px; margin-bottom: 20px; }
.feature-grid, .achievement-grid, .recruitment-grid, .volunteer-grid, .donation-grid, .usage-grid, .agenda-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
.feature-item, .achievement-item, .recruitment-item, .volunteer-item, .donation-item, .usage-item, .agenda-item { background: #f8fafc; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
.feature-item h5, .achievement-item h5, .recruitment-item h5, .volunteer-item h5, .donation-item h5, .usage-item h5, .agenda-item h5 { color: #2c5282; margin-bottom: 15px; }
.feature-list, .qualification-list { background: #f8fafc; padding: 20px; border-radius: 8px; }
.feature-list li, .qualification-list li { margin-bottom: 10px; padding-left: 20px; position: relative; }
.feature-list li:before, .qualification-list li:before { content: "•"; color: #2c5282; position: absolute; left: 0; }
.activity-info, .meeting-info, .application-info, .donation-methods, .receipt-info, .registration-info { background: #f8fafc; padding: 20px; border-radius: 8px; }
.info-item, .method-item { margin-bottom: 20px; }
.info-item h5, .method-item h5 { color: #2c5282; margin-bottom: 10px; }
.notice-footer { text-align: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid #e2e8f0; }
.error-message { text-align: center; padding: 40px; background: #f8fafc; border-radius: 8px; }
.error-message p { margin-bottom: 20px; }
@media (max-width: 768px) { .feature-grid, .achievement-grid, .recruitment-grid, .volunteer-grid, .donation-grid, .usage-grid, .agenda-grid { grid-template-columns: 1fr; } }
.viewTop { background: #f8fafc; border-radius: 12px; padding: 30px; margin-bottom: 40px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
.viewTop h3 { font-size: 28px; color: #2c5282; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 2px solid #e2e8f0; }
.viewInfo { display: flex; justify-content: flex-start; align-items: center; gap: 20px; color: #718096; font-size: 14px; flex-wrap: wrap; }
.viewInfo dl { display: flex; align-items: center; gap: 8px; margin: 0; }
.viewInfo dt { color: #a0aec0; font-weight: 500; flex-shrink: 0; }
.viewInfo dd { margin: 0; font-weight: 500; color: #4a5568; }
.viewContent img { max-width: 100%; height: auto; margin-bottom: 20px; } /* 이미지 스타일 예시 */
/* === 버튼 관련 수정된 CSS 시작 === */
.btnWrap {
    display: flex;
    justify-content: space-between; /* 목록 버튼을 왼쪽에, 그룹을 오른쪽에 정렬 */
    align-items: center;
    margin-top: 20px;
}

.btnGroup {
    display: flex;
    gap: 10px; /* 수정과 삭제 버튼 사이 간격 */
}
.btnEdit {
  box-sizing: border-box;
  display: inline-block;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  font-size: 16px;
  line-height: normal;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
  
  /* 수정 버튼 고유 색상 설정 */
  background-color: #cc6301ff; /* 배경색 */
  color: #ffffff; /* 글자색 */
}

/* 마우스 오버 시 색상 변경 */
.btnEdit:hover {
  background-color: #2b6cb0; /* 호버 시 배경색 */
}
.btnList, .btnDelete {
    /* box-sizing: border-box; 를 추가하여 padding과 border가 너비/높이에 포함되도록 함 */
    box-sizing: border-box; 
    display: inline-block; /* 또는 inline-flex */
    padding: 10px 20px; 
    border: none; 
    border-radius: 5px; 
    text-decoration: none; 
    font-size: 16px; 
    /* line-height: 1.5; */ /* line-height 대신 padding으로 높이 조절 유도, 기본값 사용 */
    line-height: normal; 
    text-align: center; /* 텍스트 중앙 정렬 */
    vertical-align: middle; /* inline-block 요소간 세로 정렬 */
    cursor: pointer; 
    transition: background-color 0.3s, color 0.3s; 
    /* 최소 높이를 명시적으로 설정하여 일관성 확보 (선택 사항) */
    /* min-height: 40px; */ /* 버튼 내용과 패딩에 맞는 적절한 값 */
}

.btnList {
    background-color: #2c5282; 
    color: white; 
}

.btnList:hover {
    background-color: #2b6cb0; 
}

.btnDelete {
    background-color: #e53e3e; 
    color: white; 
    /* justify-content: space-between; 사용 시 margin 불필요 */
    /* margin-left: 10px; */ 
}

.btnDelete:hover {
    background-color: #c53030; 
}
/* === 버튼 관련 수정된 CSS 끝 === */
</style>

<?php include "../include/footer.php"; ?>