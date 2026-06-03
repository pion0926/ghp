<?php
include "../include/admin_check.php";

// Check if user is admin
checkAdmin();

// Get form data
$mode = $_POST['mode'];
$sno = $_POST['sno'];
$pagen = $_POST['pagen'];
$title = $_POST['title'];
$content = $_POST['content'];

// Connect to database
$conn = new mysqli("localhost", "root", "", "web_basic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
$file_name = '';
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $upload_dir = '../uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    $file_name = basename($_FILES['file']['name']);
    $target_path = $upload_dir . $file_name;
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
        // If editing and there's a current file, delete it
        if ($mode === 'edit' && isset($_POST['current_file']) && $_POST['current_file']) {
            $old_file = $upload_dir . $_POST['current_file'];
            if (file_exists($old_file)) {
                unlink($old_file);
            }
        }
    } else {
        die("Error uploading file");
    }
} elseif ($mode === 'edit' && isset($_POST['current_file'])) {
    $file_name = $_POST['current_file'];
}

// Prepare SQL statement
if ($mode === 'write') {
    $stmt = $conn->prepare("INSERT INTO notices (title, content, file_name, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $title, $content, $file_name);
} else {
    $stmt = $conn->prepare("UPDATE notices SET title = ?, content = ?, file_name = ? WHERE sno = ?");
    $stmt->bind_param("sssi", $title, $content, $file_name, $sno);
}

// Execute SQL statement
if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: /web_basic/board/list.php?pagen=" . $pagen);
    exit();
} else {
    die("Error: " . $stmt->error);
}
?> 