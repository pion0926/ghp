<?php
// include "../include/admin_check.php";
include "../include/db_connect.php";

// 관리자 확인
// if (!checkAdmin()) {
//     die("권한이 없습니다.");
// }

// 파일 업로드 처리
if (isset($_FILES['history_image']) && $_FILES['history_image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = "/web_basic/img/introduce/";
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;

    // 업로드 디렉토리가 없으면 생성
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    $fileName = basename($_FILES['history_image']['name']);
    $targetFile = $uploadPath . $fileName;
    $webPath = $uploadDir . $fileName; // DB에 저장될 경로

    // 파일 이동
    if (move_uploaded_file($_FILES['history_image']['tmp_name'], $targetFile)) {
        // DB에 저장
        $stmt = $conn->prepare("INSERT INTO history (image_path) VALUES (?)");
        $stmt->bind_param("s", $webPath);
        $stmt->execute();
        $stmt->close();

        // ✅ 원하는 페이지로 리디렉션
        header("Location: introduce.php?section=introduce&pagen=230");
        exit;
    } else {
        echo "파일 업로드에 실패했습니다.";
    }
} else {
    echo "업로드된 파일이 없거나 오류가 발생했습니다.";
}
?>
