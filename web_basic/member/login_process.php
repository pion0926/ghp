<?php
// DB 연결 및 세션 시작
require_once "../include/db_connect.php"; // DB 연결 필수

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// POST 데이터 확인
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['username']) || !isset($_POST['password'])) {
    header('Location: login.php'); // 비정상 접근 시 로그인 폼으로
    exit;
}

// 입력값 가져오기
$username = trim($_POST['username']);
$password = $_POST['password']; // 비밀번호는 trim하지 않음

// 입력값 유효성 검사 (간단)
if (empty($username) || empty($password)) {
    header('Location: login.php?error=1'); // 빈 값 오류
    exit;
}

// 데이터베이스에서 사용자 정보 조회
if ($conn) {
    try {
        $sql = "SELECT user_id, username, password_hash, is_admin FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                // 사용자가 존재하면 비밀번호 확인
                $user = $result->fetch_assoc();
                
                // password_verify() 함수로 제출된 비밀번호와 해시된 비밀번호 비교
                if (password_verify($password, $user['password_hash'])) {
                    // 비밀번호 일치: 로그인 성공!
                    
                    // 세션 재생성 (세션 고정 공격 방지)
                    session_regenerate_id(true); 
                    
                    // 세션 변수에 사용자 정보 저장
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['is_admin'] = ($user['is_admin'] == 1); // is_admin 값을 boolean으로 저장

                    $stmt->close();
                    $conn->close();

                    // 로그인 성공 후 리디렉션 (게시판 목록 페이지로)
                    header('Location: /web_basic/board/list.php?pagen=285');
                    exit;

                } else {
                    // 비밀번호 불일치
                    header('Location: login.php?error=1');
                    exit;
                }
            } else {
                // 사용자 아이디 없음
                header('Location: login.php?error=1');
                exit;
            }
            $stmt->close();
        } else {
            // SQL prepare 실패
            error_log("Login prepare failed: " . $conn->error);
            header('Location: login.php?error=2');
            exit;
        }

    } catch (Exception $e) {
        error_log("Login database error: " . $e->getMessage());
        header('Location: login.php?error=2');
        exit;
    }
    $conn->close();
} else {
    // DB 연결 실패
    error_log("Login DB connection failed.");
    header('Location: login.php?error=2');
    exit;
}
?>