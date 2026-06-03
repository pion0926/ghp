<?php
require_once "../include/admin_check.php"; // ★★★ 관리자 권한 확인 필수! ★★★
require_once "../include/db_connect.php"; // 데이터베이스 연결 필수

// 세션은 admin_check.php 에서 이미 시작되었을 수 있음
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// --- 2. sno 값 확인 ---
$sno = isset($_GET['sno']) ? intval($_GET['sno']) : 0;

if ($sno <= 0) {
    // sno 값이 유효하지 않으면 목록 페이지로 리디렉션
    echo "<script>
            alert('잘못된 접근입니다. 게시글 번호가 올바르지 않습니다.');
            window.location.href = 'list.php?pagen=285'; 
          </script>";
    exit;
}

// --- 3. 데이터베이스 업데이트 ---
$error_message = null; // 오류 메시지 초기화
$success = false;      // 성공 여부 초기화

if ($conn) {
    try {
        // is_deleted 상태를 1로 변경 (소프트 삭제)
        $sql = "UPDATE notices SET is_deleted = 1 WHERE sno = ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // 파라미터 바인딩 (i: integer)
            $stmt->bind_param("i", $sno);

            // 쿼리 실행
            if ($stmt->execute()) {
                // 업데이트 성공 확인 (실제로 변경된 행이 있는지 확인)
                if ($stmt->affected_rows > 0) {
                    $success = true; // 성공 플래그 설정
                } else {
                    // sno에 해당하는 게시글이 없거나 이미 삭제된 상태일 수 있음
                    $error_message = "삭제할 게시글을 찾을 수 없거나 이미 삭제된 상태일 수 있습니다.";
                    error_log("Soft delete failed: No rows affected for sno=" . $sno);
                }
            } else {
                // 실행 실패
                $error_message = "게시글 삭제 처리 중 오류가 발생했습니다. (Execute Error)";
                error_log("Notice soft delete execute failed: " . $stmt->error);
            }
            $stmt->close();
        } else {
            // prepare 실패
            $error_message = "게시글 삭제 처리 중 오류가 발생했습니다. (Statement Error)";
            error_log("Notice soft delete prepare failed: " . $conn->error);
        }

    } catch (Exception $e) {
        $error_message = "데이터베이스 처리 중 오류가 발생했습니다: " . $e->getMessage();
        error_log("Database error in delete_process.php: " . $e->getMessage());
    }
    $conn->close(); // 작업 완료 후 연결 종료

} else {
    // DB 연결 실패
    $error_message = "데이터베이스에 연결할 수 없습니다.";
    error_log("Database connection failed in delete_process.php.");
}

// --- 4. 결과에 따른 리디렉션 ---
if ($success) {
    // 성공 시 메시지와 함께 목록 페이지로 이동
    echo "<script>
            alert('게시글이 성공적으로 삭제되었습니다.');
            window.location.href = 'list.php?pagen=285'; 
          </script>";
    exit;
} else {
    // 실패 시 오류 메시지와 함께 목록 페이지로 이동 (또는 이전 페이지로)
    $alert_message = $error_message ?: "알 수 없는 오류로 삭제에 실패했습니다.";
    echo "<script>
            alert('" . addslashes($alert_message) . "');
            // history.back(); // 이전 페이지로 돌아가기
            window.location.href = 'list.php?pagen=285'; // 목록 페이지로 이동
          </script>";
    exit;
}

?>