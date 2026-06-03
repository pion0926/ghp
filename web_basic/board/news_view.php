<?php
session_start();
include "../include/header.php";
include "../include/db_connect.php";

$news = null;
$error_message = null;
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0 && $conn) {
    $view_key = 'news_view_' . $id;
    if (!isset($_SESSION[$view_key])) {
        $conn->query("UPDATE news SET view_count = view_count + 1 WHERE id = $id");
        $_SESSION[$view_key] = true;
    }

    $sql = "SELECT id, title, content, author, published_at, view_count, thumbnail_path FROM news WHERE id = $id AND is_visible = 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $news = mysqli_fetch_assoc($result);
    } else {
        $error_message = "뉴스 기사를 찾을 수 없습니다.";
    }
} else {
    $error_message = "잘못된 접근입니다.";
}
?>

<div id="news" class="wrap">
    <script>
    $(function(){
        var navPageTitle = $(".depth2 .active").text() || '전체'; 
        $(".subTop #lnb > a").text(navPageTitle); 
        $(document).on("click", "#lnb > a", function(e){
            e.preventDefault();
            $("#lnb > div").slideToggle(100);
        });
    });
    $(window).on("load resize", function() {
        if ($(window).width() > 1279){
            $("#lnb > div").removeAttr("style");
        }
    });
    </script>

    <div class="subTop">
        <div class="pageGroup">
            <h2>뉴스</h2>
        </div>
        <div id="lnb">
            <a href="/web_basic/board/list.php?pagen=299">전체</a>
            <div class="depth2">
                <ul>
                    <li class="active"><a href="/web_basic/board/list.php?pagen=299" id="depthname">전체</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section id="container" class="news group_num_217">
        <div class="contents page_299">
            <div class="contenstView">
                <div class="boardWrap">
                    <?php if ($news): ?>
                    <div class="boardView">
                        <div class="viewTop">
                            <h3><?= htmlspecialchars($news['title']) ?></h3>
                            <div class="viewInfo">
                                <dl>
                                    <dt>작성자</dt>
                                    <dd><?= htmlspecialchars($news['author']) ?></dd>
                                </dl>
                                <dl>
                                    <dt>작성일</dt>
                                    <dd><?= date("Y-m-d", strtotime($news['published_at'])) ?></dd>
                                </dl>
                                <dl>
                                    <dt>조회수</dt>
                                    <dd><?= $news['view_count'] ?></dd>
                                </dl>
                            </div>
                        </div>

                        <div class="viewContent">
                            <?php if (!empty($news['thumbnail_path'])): ?>
                                <div style="text-align:center; margin-bottom:30px;">
                                    <img src="<?= htmlspecialchars($news['thumbnail_path']) ?>" alt="뉴스 이미지" style="max-width:80%; height:auto; border-radius:8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                </div>
                            <?php endif; ?>
                            <?= $news['content'] ?>
                        </div>

                        <div class="viewBottom">
                            <div class="btnWrap">
                                <a href="/web_basic/board/list.php?pagen=299" class="btnList">목록</a>
                                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1): ?>
                                    <div class="btnGroup">
                                        <a href="edit_news.php?id=<?= htmlspecialchars($id) ?>" class="btnEdit">수정</a>
                                        <a href="delete_news_process.php?id=<?= $news['id'] ?>"
                                            class="btnDelete"
                                            onclick="return confirm('정말로 이 뉴스 기사를 삭제하시겠습니까?');">삭제</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="error-message">
                        <p><?= $error_message ?: "게시물을 불러오는 데 실패했습니다."; ?></p>
                        <div class="btnWrap">
                            <a href="/web_basic/board/list.php?pagen=299" class="btnList">목록</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- 공통 스타일 적용 -->
<style>
.viewTop {
    background: #f8fafc;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 40px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}
.viewTop h3 {
    font-size: 28px;
    color: #2c5282;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e2e8f0;
}
.viewInfo {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    font-size: 14px;
    color: #718096;
}
.viewInfo dl {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
}
.viewInfo dt {
    color: #a0aec0;
    font-weight: 500;
}
.viewInfo dd {
    margin: 0;
    color: #4a5568;
    font-weight: 500;
}
.viewContent img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}
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
.error-message {
    text-align: center;
    padding: 40px;
    background: #f8fafc;
    border-radius: 8px;
}
.error-message p {
    margin-bottom: 20px;
}
</style>

<?php include "../include/footer.php"; ?>
