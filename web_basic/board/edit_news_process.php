<?php
session_start();
require_once "../include/admin_check.php";
include "../include/db_connect.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("잘못된 요청입니다.");
}

$id = (int)($_POST['id'] ?? 0);
$title = trim($_POST['title'] ?? '');
$summary = trim($_POST['summary'] ?? '');
$content = trim($_POST['content'] ?? '');
$author = trim($_POST['author'] ?? '관리자');

if ($id === 0 || $title === '' || $summary === '' || $content === '') {
    echo "<script>alert('필수 입력값이 누락되었거나 잘못된 접근입니다.'); history.back();</script>";
    exit;
}

$upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_basic/uploads/news/";
$thumbnail_path_for_db = null;

$sql_get_old_thumb = "SELECT thumbnail_path FROM news WHERE id = ?";
$stmt_get_old = $conn->prepare($sql_get_old_thumb);
if ($stmt_get_old) {
    $stmt_get_old->bind_param("i", $id);
    $stmt_get_old->execute();
    $result_get_old = $stmt_get_old->get_result();
    $row_get_old = $result_get_old->fetch_assoc();
    $stmt_get_old->close();
    
    $thumbnail_path_for_db = $row_get_old['thumbnail_path'] ?? null;
} else {
    error_log("SQL Prepare 오류 (get old thumb): " . $conn->error);
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

    if (!empty($thumbnail_path_for_db)) {
        $old_file_path = $_SERVER['DOCUMENT_ROOT'] . $thumbnail_path_for_db;
        if (file_exists($old_file_path)) {
            unlink($old_file_path);
        }
    }

    $new_name = 'thumb_' . time() . '_' . rand(1000, 9999) . '.' . $file_ext;
    $destination = $upload_dir . $new_name;

    if (move_uploaded_file($file_tmp, $destination)) {
        $thumbnail_path_for_db = "/web_basic/uploads/news/" . $new_name;
    } else {
        echo "<script>alert('썸네일 업로드에 실패했습니다.'); history.back();</script>";
        exit;
    }
}

// 썸네일 경로에 따라 다른 쿼리 사용
if ($thumbnail_path_for_db !== null) {
    $sql = "UPDATE news SET title = ?, summary = ?, content = ?, thumbnail_path = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssi", $title, $summary, $content, $thumbnail_path_for_db, $id);
    } else {
        echo "<script>alert('데이터 업데이트 준비 중 오류가 발생했습니다. (CASE 1)'); history.back();</script>";
        error_log("SQL Prepare 오류 (CASE 1): " . $conn->error);
        exit;
    }
} else {
    $sql = "UPDATE news SET title = ?, summary = ?, content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssi", $title, $summary, $content, $id);
    } else {
        echo "<script>alert('데이터 업데이트 준비 중 오류가 발생했습니다. (CASE 2)'); history.back();</script>";
        error_log("SQL Prepare 오류 (CASE 2): " . $conn->error);
        exit;
    }
}

if ($stmt->execute()) {
    echo "<script>alert('뉴스가 성공적으로 수정되었습니다.'); location.href='/web_basic/board/news_view.php?id=" . $id . "';</script>";
} else {
    echo "<script>alert('데이터 수정 중 오류가 발생했습니다.'); history.back();</script>";
    error_log("SQL Execute 오류: " . $stmt->error);
}

$stmt->close();
$conn->close();
?>