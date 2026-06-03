<?php
include "../include/admin_check.php";

// Check if user is admin
checkAdmin();

// Get notice ID
$sno = isset($_GET['sno']) ? $_GET['sno'] : 0;
$pagen = isset($_GET['pagen']) ? $_GET['pagen'] : 0;

if ($sno > 0) {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "web_basic");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Get file name before deleting
    $stmt = $conn->prepare("SELECT file_name FROM notices WHERE sno = ?");
    $stmt->bind_param("i", $sno);
    $stmt->execute();
    $result = $stmt->get_result();
    $notice = $result->fetch_assoc();
    $stmt->close();
    
    // Delete file if exists
    if ($notice && $notice['file_name']) {
        $file_path = '../uploads/' . $notice['file_name'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    
    // Delete notice from database
    $stmt = $conn->prepare("DELETE FROM notices WHERE sno = ?");
    $stmt->bind_param("i", $sno);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: /web_basic/board/list.php?pagen=" . $pagen);
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
} else {
    header("Location: /web_basic/board/list.php?pagen=" . $pagen);
    exit();
}
?> 