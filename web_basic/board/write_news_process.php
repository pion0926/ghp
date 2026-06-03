<?php
session_start();
require_once "../include/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("잘못된 요청입니다.");
}

// 필드 가져오기
$title = trim($_POST['title'] ?? '');
$summary = trim($_POST['summary'] ?? '');
$content = trim($_POST['content'] ?? '');
$author = trim($_POST['author'] ?? '관리자');

if ($title === '' || $summary === '' || $content === '') {
    echo "<script>alert('모든 항목을 입력해주세요.'); history.back();</script>";
    exit;
}

// 썸네일 업로드 처리
$thumbnail_path = '';
$upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_basic/uploads/news/";

if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['thumbnail']['tmp_name'];
    $file_name = basename($_FILES['thumbnail']['name']);
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($file_ext, $allowed_ext)) {
        echo "<script>alert('지원하지 않는 이미지 형식입니다. (jpg, png, gif)'); history.back();</script>";
        exit;
    }

    // 파일명 중복 방지
    $new_name = 'thumb_' . time() . '_' . rand(1000, 9999) . '.' . $file_ext;
    $destination = $upload_dir . $new_name;

    if (move_uploaded_file($file_tmp, $destination)) {
        $thumbnail_path = "/web_basic/uploads/news/" . $new_name;
    } else {
        echo "<script>alert('썸네일 업로드에 실패했습니다.'); history.back();</script>";
        exit;
    }
}

// DB 저장 처리
$sql = "INSERT INTO news (title, summary, content, author, thumbnail_path, published_at, is_visible, view_count)
        VALUES (?, ?, ?, ?, ?, NOW(), 1, 0)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $title, $summary, $content, $author, $thumbnail_path);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('뉴스가 등록되었습니다.'); location.href='/web_basic/board/list.php?pagen=299';</script>";
} else {
    echo "<script>alert('데이터 저장 중 오류가 발생했습니다.'); history.back();</script>";
    error_log("SQL 오류: " . $conn->error);
}
?>
