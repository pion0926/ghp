<?php
// CKEditor 이미지 업로드 처리
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/web_basic/uploads/news/ckeditor/';
$uploadUrl = '/web_basic/uploads/news/ckeditor/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if ($_FILES['upload']) {
    $file = $_FILES['upload'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($ext, $allowed)) {
        http_response_code(400);
        echo json_encode(['error' => ['message' => '허용되지 않는 파일 형식입니다.']]);
        exit;
    }

    $newName = 'img_' . time() . '_' . rand(1000,9999) . '.' . $ext;
    $filePath = $uploadDir . $newName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        echo json_encode([
            'url' => $uploadUrl . $newName
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => ['message' => '파일 업로드에 실패했습니다.']]);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => ['message' => '업로드된 파일이 없습니다.']]);
}
?>
