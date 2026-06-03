<?php
require_once "../include/admin_check.php"; 
include "../include/db_connect.php"; 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- 1. 요청 방식 확인 ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php'); 
    exit;
}

// --- 2. 데이터 가져오기 및 기본 검증 ---
// sno 변수를 추가로 가져옵니다.
$sno = isset($_POST['sno']) ? (int)$_POST['sno'] : 0;
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';

// 필수 필드 검증 (sno도 필수!)
if ($sno === 0 || empty($title) || empty($content)) {
    echo "<script>
            alert('필수 입력값이 누락되었습니다.');
            history.back();
          </script>";
    exit;
}

// --- 3. 이미지 파일 처리 ---
$upload_dir = "../uploads/images/"; 
$image_filename = null; // 새 이미지 파일명 초기화

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];

    // 파일 크기, 형식 검증 (write_process.php의 로직 활용)
    $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
    if ($image_size > 5 * 1024 * 1024 || !in_array(mime_content_type($image_tmp_name), $allowed_mime_types)) {
        echo "<script>alert('파일 형식 또는 크기가 올바르지 않습니다.'); history.back();</script>";
        exit;
    }

    // 기존 이미지 삭제
    try {
        $sql_get_old_image = "SELECT image FROM notices WHERE sno = ?";
        $stmt_old = $conn->prepare($sql_get_old_image);
        $stmt_old->bind_param("i", $sno);
        $stmt_old->execute();
        $result_old = $stmt_old->get_result();
        $row_old = $result_old->fetch_assoc();
        
        if ($row_old && !empty($row_old['image'])) {
            $old_image_path = $upload_dir . $row_old['image'];
            if (file_exists($old_image_path)) {
                unlink($old_image_path); // 서버에서 기존 이미지 파일 삭제
            }
        }
        $stmt_old->close();
    } catch (Exception $e) {
        error_log("Failed to delete old image for sno=" . $sno . ": " . $e->getMessage());
    }

    // 새 이미지 업로드 및 파일명 생성
    $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $image_filename = uniqid('img_', true) . '.' . $image_extension;
    $upload_path = $upload_dir . $image_filename;

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (!move_uploaded_file($image_tmp_name, $upload_path)) {
        echo "<script>alert('새 이미지 업로드에 실패했습니다.'); history.back();</script>";
        exit;
    }
}

// --- 4. 데이터베이스 업데이트 ---
try {
    if ($image_filename) {
        // 새 이미지가 있는 경우, image 컬럼도 업데이트
        $sql = "UPDATE notices SET title = ?, content = ?, image = ?, updated_at = NOW() WHERE sno = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $content, $image_filename, $sno);
    } else {
        // 새 이미지가 없는 경우, title과 content만 업데이트
        $sql = "UPDATE notices SET title = ?, content = ?, updated_at = NOW() WHERE sno = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $content, $sno);
    }
    
    if ($stmt->execute()) {
        echo "<script>
                alert('게시글이 성공적으로 수정되었습니다.');
                window.location.href = 'view.php?sno=" . $sno . "';
              </script>";
    } else {
        throw new Exception("게시글 수정 중 오류 발생: " . $stmt->error);
    }
    $stmt->close();

} catch (Exception $e) {
    error_log("게시글 수정 오류: " . $e->getMessage());
    echo "<script>alert('게시글 수정에 실패했습니다.'); history.back();</script>";
}

$conn->close();

?>