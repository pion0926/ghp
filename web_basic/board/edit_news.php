<?php 
require_once "../include/admin_check.php"; 
include "../include/db_connect.php"; 
include "../include/header.php"; 

$default_author = '관리자';

// URL에서 id 가져오기
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id === 0) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 데이터베이스에서 해당 뉴스 정보 가져오기
$sql = "SELECT id, title, content, summary, author, thumbnail_path FROM news WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<script>alert('존재하지 않는 뉴스 기사입니다.'); history.back();</script>";
    exit;
}

// 불러온 정보를 변수에 할당
$title = htmlspecialchars($row['title']);
$summary = htmlspecialchars($row['summary']);
$content = $row['content']; // CKEditor 내용을 그대로 사용
$author = htmlspecialchars($row['author']);
$thumbnail_path = htmlspecialchars($row['thumbnail_path']);

?>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<div id="news" class="wrap">
    <div class="subTop">
        <div class="pageGroup"><h2>뉴스</h2></div>
        <div id="lnb">
            <a href="#">뉴스 수정</a> 
            <div class="depth2">
                <ul>
                    <li class="active"><a href="/web_basic/board/list.php?section=news&pagen=299">뉴스 수정</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section id="container" class="news write">
        <div class="contents page_write">
            <div class="boardWrap">
                <h3>뉴스 수정</h3>
                <form method="POST" action="edit_news_process.php" enctype="multipart/form-data" onsubmit="return validateFormAndSync()">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                    <table class="boardWrite">
                        <caption>뉴스 수정 폼</caption>
                        <colgroup>
                            <col style="width: 15%;">
                            <col style="width: 85%;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th scope="row"><label for="author">작성자</label></th>
                                <td><input type="text" name="author" id="author" value="<?= $author ?>" required readonly class="input-text"></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="title">제목</label></th>
                                <td><input type="text" name="title" id="title" placeholder="제목을 입력하세요" required class="input-text" style="width: 98%;" value="<?= $title ?>"></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="summary">요약문</label></th>
                                <td><textarea name="summary" id="summary" rows="4" placeholder="간단한 요약을 입력하세요" required class="textarea" style="width: 98%;"><?= $summary ?></textarea></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="content">내용</label></th>
                                <td>
                                    <textarea name="content" id="content" rows="15" class="textarea" style="width: 98%;"><?= $content ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="thumbnail">썸네일 이미지</label></th>
                                <td>
                                    <input type="file" name="thumbnail" id="thumbnail" class="input-file" accept="image/*"> 
                                    <p class="form-hint">새로운 이미지를 선택하여 변경할 수 있습니다. (기존 이미지는 삭제됩니다.)</p>
                                    <?php if ($thumbnail_path): ?>
                                        <div style="margin-top: 10px;">
                                            <p>현재 썸네일:</p>
                                            <img src="<?= htmlspecialchars($thumbnail_path) ?>" alt="현재 썸네일" style="max-width: 150px; height: auto; border: 1px solid #ddd;">
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btnWrap right">
                        <button type="submit" class="btnSubmit">수정 완료</button>
                        <a href="news_view.php?id=<?= htmlspecialchars($id) ?>" class="btnCancel">취소</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
let myEditor;
ClassicEditor
    .create(document.querySelector('#content'), {
        extraPlugins: [CustomUploadAdapterPlugin]
    })
    .then(editor => {
        myEditor = editor; // myEditor 변수에 할당
        editor.editing.view.change(writer => {
            const root = editor.editing.view.document.getRoot();
            writer.setStyle('font-size', '16px', root);
            writer.setStyle('line-height', '1.6', root);
            writer.setStyle('min-height', '300px', root);
        });
    })
    .catch(error => console.error(error));

function validateFormAndSync() {
    // CKEditor의 데이터를 textarea로 동기화
    document.querySelector('#content').value = myEditor.getData();

    const title = document.getElementById('title').value.trim();
    const summary = document.getElementById('summary').value.trim();
    const content = myEditor.getData().trim(); // 에디터 내부 값

    if (title === '' || summary === '' || content === '') {
        alert('제목, 요약문, 내용을 모두 입력해주세요.');
        if (title === '') document.getElementById('title').focus();
        else if (summary === '') document.getElementById('summary').focus();
        return false;
    }
    return true;
}

// ✅ 커스텀 업로드 어댑터 플러그인 정의
function CustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapter(loader);
    };
}

// ✅ 업로드 어댑터 클래스
class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file.then(file => {
            return new Promise((resolve, reject) => {
                const data = new FormData();
                data.append('upload', file);

                fetch('/web_basic/board/upload.php', {
                    method: 'POST',
                    body: data
                })
                .then(response => response.json())
                .then(result => {
                    if (result.url) {
                        resolve({ default: result.url });
                    } else {
                        reject(result.error?.message || '업로드 실패');
                    }
                })
                .catch(error => {
                    reject('서버 에러: ' + error.message);
                });
            });
        });
    }

    abort() {
        // 중단 로직은 선택사항
    }
}
</script>

<style>
/* 동일한 스타일 유지 (생략 가능) */
.boardWrite { width: 100%; border-top: 2px solid #2c5282; border-collapse: collapse; margin-bottom: 30px; }
.boardWrite th, .boardWrite td { padding: 15px; border-bottom: 1px solid #e2e8f0; vertical-align: top; }
.boardWrite th { background-color: #f8fafc; text-align: left; font-weight: 600; color: #4a5568; }
.input-text, .textarea, .input-file { padding: 8px 10px; border: 1px solid #cbd5e0; border-radius: 4px; font-size: 14px; box-sizing: border-box; }
.btnWrap.right { text-align: right; margin-top: 20px; }
.btnWrap button, .btnWrap a { display: inline-block; padding: 10px 20px; margin-left: 10px; border-radius: 4px; font-size: 14px; text-decoration: none; cursor: pointer; }
.btnSubmit { background-color: #2c5282; color: white; border: 1px solid #2c5282; }
.btnSubmit:hover { background-color: #2b6cb0; }
.btnCancel { background-color: #6c757d; color: white; border: 1px solid #6c757d; }
.btnCancel:hover { background-color: #5a6268; }
</style>

<?php include "../include/footer.php"; ?>