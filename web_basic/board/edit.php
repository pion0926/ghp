<?php
require_once "../include/admin_check.php";
include "../include/db_connect.php";
include "../include/header.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// URL 파라미터에서 게시글 번호(sno) 가져오기
$sno = isset($_GET['sno']) ? (int)$_GET['sno'] : 0;

if ($sno === 0) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 데이터베이스에서 해당 게시글 정보 가져오기
$sql = "SELECT sno, title, content, author FROM notices WHERE sno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $sno);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); history.back();</script>";
    exit;
}

// 불러온 정보를 변수에 할당
$title = htmlspecialchars($row['title']);
$content = htmlspecialchars($row['content']);
$author = htmlspecialchars($row['author']);
?>

<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

<div id="news" class="wrap">
    <script>
    $(function(){
        $(".subTop #lnb > a").text('글 수정');
        $(document).on("click", "#lnb > a", function(e){
            e.preventDefault();
            $("#lnb > div").slideToggle(100);
        });
    });
    $(window).on("load resize", function() {
        if ($(window).width() > 1279) {
            $("#lnb > div").removeAttr("style");
        }
    });
    </script>

    <div class="subTop">
        <div class="pageGroup"><h2>공지</h2></div>
        <div id="lnb">
            <a href="#">글 수정</a> 
            <div class="depth2">
                <ul>
                    <li class="active"><a href="/web_basic/board/write.php">글 작성</a></li>
                    <li><a href="/web_basic/board/list.php?pagen=285">목록</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section id="container" class="news write">
        <div class="contents page_write">
            <div class="boardWrap">
                <h3>공지사항 수정</h3>
                <form name="noticeEditForm" method="POST" action="edit_process.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <input type="hidden" name="sno" value="<?php echo htmlspecialchars($sno); ?>">
                    <table class="boardWrite">
                        <caption>공지사항 수정 폼</caption>
                        <colgroup>
                            <col style="width: 15%;">
                            <col style="width: 85%;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th scope="row"><label for="author">작성자</label></th>
                                <td><input type="text" name="author" id="author" value="<?php echo $author; ?>" required readonly class="input-text"></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="title">제목</label></th>
                                <td><input type="text" name="title" id="title" placeholder="제목을 입력하세요" required class="input-text" style="width: 98%;" value="<?php echo $title; ?>"></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="content">내용</label></th>
                                <td>
                                    <textarea name="content" id="content" rows="15" required class="textarea" style="width: 98%;"><?php echo $content; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="image">이미지 첨부</label></th>
                                <td>
                                    <input type="file" name="image" id="image" class="input-file" accept="image/*"> 
                                    <p class="form-hint">새로운 이미지를 선택하여 변경할 수 있습니다. (기존 이미지는 삭제됩니다.)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btnWrap right">
                        <button type="submit" class="btnSubmit">수정 완료</button>
                        <a href="/web_basic/board/view.php?sno=<?php echo htmlspecialchars($sno); ?>" class="btnCancel">취소</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    CKEDITOR.replace('content');

    function validateForm() {
        const title = document.getElementById('title').value.trim();
        const content = CKEDITOR.instances.content.getData().trim();

        if (title === '') {
            alert('제목을 입력해주세요.');
            document.getElementById('title').focus();
            return false;
        }
        if (content === '') {
            alert('내용을 입력해주세요.');
            CKEDITOR.instances.content.focus();
            return false;
        }
        return true;
    }
</script>

<style>
/* 기존 스타일 유지 (btnWrap, btnGroup 등) */
.boardWrite {
    width: 100%;
    border-top: 2px solid #2c5282;
    border-collapse: collapse;
    margin-bottom: 30px;
}
.boardWrite caption {
    position: absolute; 
    width: 1px; height: 1px; 
    padding: 0; margin: -1px; 
    overflow: hidden; clip:rect(0,0,0,0); 
    border: 0;
}
.boardWrite th, .boardWrite td {
    padding: 15px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: top;
}
.boardWrite th {
    background-color: #f8fafc;
    text-align: left;
    font-weight: 600;
    color: #4a5568;
}
.input-text, .textarea, .input-file {
    padding: 8px 10px;
    border: 1px solid #cbd5e0;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}
.input-text[readonly] {
    background-color: #edf2f7;
    cursor: not-allowed;
}
.input-file { padding: 5px; }
.form-hint {
    font-size: 12px;
    color: #718096;
    margin-top: 5px;
}
.btnWrap.right {
    text-align: right;
    margin-top: 20px;
}
.btnWrap button, .btnWrap a {
    display: inline-block;
    padding: 10px 20px;
    margin-left: 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.2s, color 0.2s, border-color 0.2s;
}
.btnSubmit {
    background-color: #2c5282;
    color: white;
    border: 1px solid #2c5282;
}
.btnSubmit:hover {
    background-color: #2b6cb0;
    border-color: #2b6cb0;
}
.btnCancel {
    background-color: #6c757d;
    color: white;
    border: 1px solid #6c757d;
}
.btnCancel:hover {
    background-color: #5a6268;
    border-color: #5a6268;
}
</style>

<?php include "../include/footer.php"; ?>