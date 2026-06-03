<?php
require_once "../include/admin_check.php";
include "../include/db_connect.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// URL에서 게시글 번호(id) 가져오기
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id === 0) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 데이터베이스 연결이 유효한지 확인
if ($conn) {
    try {
        // 기존 썸네일 파일 경로를 가져옴
        $sql_get_thumb = "SELECT thumbnail_path FROM news WHERE id = ?";
        $stmt_get = $conn->prepare($sql_get_thumb);
        $stmt_get->bind_param("i", $id);
        $stmt_get->execute();
        $result_get = $stmt_get->get_result();
        $row_get = $result_get->fetch_assoc();
        $stmt_get->close();

        // 데이터베이스에서 뉴스 삭제
        $sql = "DELETE FROM news WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // 삭제 성공 시 서버에서 썸네일 파일도 삭제
            if ($row_get && !empty($row_get['thumbnail_path'])) {
                $old_path = $_SERVER['DOCUMENT_ROOT'] . $row_get['thumbnail_path'];
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }
            
            echo "<script>alert('뉴스 기사가 성공적으로 삭제되었습니다.'); window.location.href='list.php?pagen=299';</script>";
        } else {
            throw new Exception("뉴스 삭제 중 오류 발생: " . $stmt->error);
        }
        $stmt->close();

    } catch (Exception $e) {
        error_log("뉴스 삭제 오류: " . $e->getMessage());
        echo "<script>alert('뉴스 삭제에 실패했습니다.'); history.back();</script>";
    }

    $conn->close();
} else {
    error_log("Database connection failed in delete_news_process.php.");
    echo "<script>alert('데이터베이스 연결에 실패했습니다.'); history.back();</script>";
}
?>