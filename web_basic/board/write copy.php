<?php 
require_once "../include/admin_check.php"; 
// 필수 파일 포함
include "../include/db_connect.php"; // DB 연결은 실제 처리 시 필요할 수 있음 (예: 작성자 기본값 설정)
include "../include/header.php"; 
// include "../include/admin_check.php"; // 관리자만 접근 가능하도록 반드시 사용 권장!

// 세션 시작 (관리자 정보 등 활용 시 필요)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 관리자 이름 기본값 설정 (예시: 세션에 저장된 관리자 이름 사용)
// $default_author = isset($_SESSION['admin_name']) ? htmlspecialchars($_SESSION['admin_name']) : '관리자'; 
$default_author = '관리자'; // 우선 '관리자'로 고정
?>

<div id="news" class="wrap">
    <script>
    // LNB 관련 스크립트 (list.php와 동일하게 유지 또는 수정)
    $(function(){
        // var navPageTitle = $(".depth2 .active").text() || '전체'; 
        $(".subTop #lnb > a").text('글 작성'); // LNB 제목 '글 작성'으로 설정

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
            <a href="#">글 작성</a> 
            <div class="depth2">
                 <ul>
                     <li class="active"><a href="/web_basic/board/write.php">글 작성</a></li>
                 </ul>
            </div>
        </div>
    </div>
    <section id="container" class="news write">
        <div class="contents page_write">
            <div class="boardWrap">
                <h3>공지사항 작성</h3>
                
                <form name="noticeWriteForm" method="POST" action="write_process.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                    
                    <table class="boardWrite">
                        <caption>공지사항 작성 폼</caption>
                        <colgroup>
                            <col style="width: 15%;">
                            <col style="width: 85%;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th scope="row"><label for="author">작성자</label></th>
                                <td><input type="text" name="author" id="author" value="<?php echo $default_author; ?>" required readonly class="input-text"></td>
                                </tr>
                            <tr>
                                <th scope="row"><label for="title">제목</label></th>
                                <td><input type="text" name="title" id="title" placeholder="제목을 입력하세요" required class="input-text" style="width: 98%;"></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="content">내용</label></th>
                                <td>
                                    <textarea name="content" id="content" rows="15" placeholder="내용을 입력하세요" required class="textarea" style="width: 98%;"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="image">이미지 첨부</label></th>
                                <td><input type="file" name="image" id="image" class="input-file" accept="image/*"> 
                                    <p class="form-hint">이미지 파일을 선택하세요. (JPG, PNG, GIF 등)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btnWrap right">
                        <button type="submit" class="btnSubmit">작성 완료</button>
                        <a href="/web_basic/board/list.php?pagen=285" class="btnCancel">취소</a>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>

<style>
/* 기본 테이블 스타일 */
.boardWrite {
    width: 100%;
    border-top: 2px solid #2c5282;
    border-collapse: collapse;
    margin-bottom: 30px;
}

.boardWrite caption {
    /* 캡션 숨김 (스크린 리더용) */
    position: absolute; 
    width: 1px; height: 1px; 
    padding: 0; margin: -1px; 
    overflow: hidden; clip:rect(0,0,0,0); 
    border: 0;
}

.boardWrite th,
.boardWrite td {
    padding: 15px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: top; /* 내용을 위쪽에 정렬 */
}

.boardWrite th {
    background-color: #f8fafc;
    text-align: left;
    font-weight: 600;
    color: #4a5568;
}

/* 폼 요소 스타일 */
.input-text,
.textarea,
.input-file {
    padding: 8px 10px;
    border: 1px solid #cbd5e0;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box; /* 패딩, 보더 포함하여 너비 계산 */
}

.input-text[readonly] {
    background-color: #edf2f7;
    cursor: not-allowed;
}

.textarea {
    resize: vertical; /* 세로 크기만 조절 가능 */
    min-height: 200px; /* 최소 높이 */
}

.input-file {
    padding: 5px; /* 파일 입력 필드는 패딩 조정 */
}

.form-hint {
    font-size: 12px;
    color: #718096;
    margin-top: 5px;
}

/* 버튼 정렬 */
.btnWrap.right {
    text-align: right;
    margin-top: 20px;
}

.btnWrap button,
.btnWrap a {
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

<script>
// 간단한 폼 유효성 검사 (필수 필드 확인)
function validateForm() {
    const title = document.getElementById('title').value.trim();
    const content = document.getElementById('content').value.trim();
    const author = document.getElementById('author').value.trim(); // 작성자는 readonly 라서 필수는 아닐 수 있음

    if (title === '') {
        alert('제목을 입력해주세요.');
        document.getElementById('title').focus();
        return false; // 폼 제출 중단
    }
    if (content === '') {
        alert('내용을 입력해주세요.');
        document.getElementById('content').focus();
        return false; // 폼 제출 중단
    }
    // 필요한 경우 다른 필드 검사 추가

    return true; // 유효성 검사 통과, 폼 제출 진행
}
</script>

<?php include "../include/footer.php"; ?>