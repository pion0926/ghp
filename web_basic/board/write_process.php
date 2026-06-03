<?php
require_once "../include/admin_check.php"; 

include "../include/db_connect.php"; // 데이터베이스 연결 필수
// include "../include/admin_check.php"; // 관리자 권한 확인 필수! 주석 해제 권장

// 세션 시작 (관리자 확인, 메시지 전달 등에 필요)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- 1. 요청 방식 확인 ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // POST 방식이 아니면 비정상 접근으로 간주하고 목록으로 리디렉션
    header('Location: list.php'); 
    exit;
}

// --- 2. 데이터 가져오기 및 기본 검증 ---
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$author = isset($_POST['author']) ? trim($_POST['author']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$image_filename = null; // 이미지 파일명 초기화

// 필수 필드 검증
if (empty($title) || empty($content) || empty($author)) {
    // 필수 값이 없으면 오류 메시지와 함께 이전 페이지로 리디렉션 (JavaScript 경고 대신)
    // 실제 서비스에서는 세션이나 GET 파라미터로 오류 메시지를 전달하는 것이 더 사용자 친화적입니다.
    echo "<script>
            alert('제목, 내용, 작성자는 필수 입력 항목입니다.');
            window.location.href = 'write.php'; 
          </script>";
    exit;
}

// --- 3. 이미지 파일 처리 ---
$upload_dir = "../uploads/images/"; // 이미지를 저장할 서버 디렉토리 (실제 경로로 수정하고, 웹서버 쓰기 권한 확인!)
$allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif']; // 허용할 이미지 MIME 타입
$max_file_size = 5 * 1024 * 1024; // 최대 파일 크기 (예: 5MB)

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_mime_type = mime_content_type($image_tmp_name); // 파일의 실제 MIME 타입 확인

    // 파일 크기 검증
    if ($image_size > $max_file_size) {
        echo "<script>
                alert('이미지 파일 크기는 5MB를 초과할 수 없습니다.');
                window.location.href = 'write.php'; 
              </script>";
        exit;
    }

    // MIME 타입 검증
    if (!in_array($image_mime_type, $allowed_mime_types)) {
        echo "<script>
                alert('허용되지 않는 이미지 형식입니다. (JPG, PNG, GIF만 가능)');
                window.location.href = 'write.php'; 
              </script>";
        exit;
    }

    // 고유한 파일명 생성 (파일명 중복 방지)
    $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $image_filename = uniqid('img_', true) . '.' . $image_extension; // 예: img_60c72b3a5b1f2.jpg
    $upload_path = $upload_dir . $image_filename;

    // 업로드 디렉토리 존재 확인 및 생성 (없으면)
    if (!is_dir($upload_dir)) {
        if (!mkdir($upload_dir, 0777, true)) { // 권한 설정 주의! (0755 또는 더 제한적으로 설정 권장)
             error_log("Failed to create upload directory: " . $upload_dir);
             echo "<script>
                    alert('파일 업로드 디렉토리를 생성할 수 없습니다. 관리자에게 문의하세요.');
                    window.location.href = 'write.php'; 
                  </script>";
             exit;
        }
    }
    
    // 임시 파일을 지정된 경로로 이동
    if (!move_uploaded_file($image_tmp_name, $upload_path)) {
        error_log("Failed to move uploaded file: " . $image_tmp_name . " to " . $upload_path);
        echo "<script>
                alert('파일 업로드 중 오류가 발생했습니다.');
                window.location.href = 'write.php'; 
              </script>";
        exit;
    }

} elseif (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
    // 파일이 첨부되었으나 업로드 중 오류 발생
    error_log("File upload error code: " . $_FILES['image']['error']);
    echo "<script>
            alert('파일 업로드 중 오류가 발생했습니다. 오류 코드: " . $_FILES['image']['error'] . "');
            window.location.href = 'write.php'; 
          </script>";
    exit;
}
// 파일이 첨부되지 않은 경우 $image_filename은 null 유지

// --- 4. 데이터베이스 저장 ---
if ($conn) {
    try {
        // SQL INSERT 쿼리 (created_at, updated_at은 NOW() 함수 사용, views는 0으로 설정)
        // DB 테이블에서 created_at, updated_at 컬럼이 DEFAULT CURRENT_TIMESTAMP로 설정되어 있다면 NOW() 생략 가능
        // DB 테이블에서 views 컬럼이 DEFAULT 0 으로 설정되어 있다면 0 생략 가능
        // date 컬럼은 현재 사용하지 않으므로 INSERT 문에서 제외 (필요시 추가)
        $sql = "INSERT INTO notices (title, author, content, image, created_at, updated_at, views) 
                VALUES (?, ?, ?, ?, NOW(), NOW(), 0)";
        
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // 파라미터 바인딩 (ssss: string, string, string, string)
            $stmt->bind_param("ssss", $title, $author, $content, $image_filename);
            
            // 쿼리 실행
            $success = $stmt->execute();
            
            if ($success) {
                // 성공 시 목록 페이지로 리디렉션
                $stmt->close();
                $conn->close();
                echo "<script>
                        alert('게시글이 성공적으로 등록되었습니다.');
                        window.location.href = 'list.php?pagen=285'; // pagen=285 파라미터 포함
                      </script>";
                exit;
            } else {
                // 실행 실패
                $error_message = "게시글 등록 중 오류가 발생했습니다. (Execute Error)";
                error_log("Notice insert execute failed: " . $stmt->error);
            }
            $stmt->close();
        } else {
            // prepare 실패
            $error_message = "게시글 등록 중 오류가 발생했습니다. (Statement Error)";
            error_log("Notice insert prepare failed: " . $conn->error);
        }

    } catch (Exception $e) {
        $error_message = "데이터베이스 처리 중 오류가 발생했습니다: " . $e->getMessage();
        error_log("Database error in write_process.php: " . $e->getMessage());
    }
    $conn->close(); // 오류 발생 시에도 연결 종료

} else {
    // DB 연결 실패
    $error_message = "데이터베이스에 연결할 수 없습니다.";
    error_log("Database connection failed in write_process.php.");
}

// --- 5. 오류 발생 시 처리 ---
// 여기까지 코드가 실행되었다면 오류가 발생한 것
echo "<script>
        alert('오류가 발생하여 게시글을 등록하지 못했습니다. " . addslashes($error_message) . "');
        window.location.href = 'write.php'; // 오류 발생 시 다시 작성 페이지로
      </script>";
exit;

?>