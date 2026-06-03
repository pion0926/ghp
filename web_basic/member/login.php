<?php 
// 로그인 페이지에서는 세션을 파괴하여 이전 로그인 정보를 초기화할 수 있습니다 (선택 사항).
// session_start();
// session_destroy();

// 오류 메시지 처리 (login_process.php 에서 리디렉션 시 전달)
$error_message = '';
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        $error_message = '아이디 또는 비밀번호가 올바르지 않습니다.';
    } else {
        $error_message = '로그인 처리 중 오류가 발생했습니다.';
    }
}
// 로그아웃 메시지 처리
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
     $error_message = '성공적으로 로그아웃되었습니다.'; // 오류 메시지 변수를 재활용
}

// 로그인 상태라면 리스트 페이지로 이동시킬 수도 있습니다.
// session_start();
// if (isset($_SESSION['user_id'])) {
//    header('Location: /web_basic/board/list.php?pagen=285');
//    exit;
// }

// 헤더 포함 (레이아웃 일관성을 위해)
// include "../include/header.php"; 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <style>
        /* 간단한 로그인 폼 스타일 */
        body { font-family: sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .login-container { background-color: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .login-container h2 { text-align: center; color: #333; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; color: #555; font-weight: bold; }
        .form-group input[type="text"],
        .form-group input[type="password"] { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 16px; }
        .login-button { width: 100%; padding: 12px; background-color: #2c5282; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; transition: background-color 0.2s; }
        .login-button:hover { background-color: #2b6cb0; }
        .error-message { color: #dc3545; text-align: center; margin-bottom: 20px; font-size: 14px; }
        .logout-message { color: #28a745; text-align: center; margin-bottom: 20px; font-size: 14px; } /* 로그아웃 메시지 스타일 */
    </style>
</head>
<body>
    <div class="login-container">
        <h2>로그인</h2>
        
        <?php if (!empty($error_message)): ?>
            <p class="<?php echo (isset($_GET['logout']) ? 'logout-message' : 'error-message'); ?>">
                <?php echo $error_message; ?>
            </p>
        <?php endif; ?>

        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="username">아이디</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">로그인</button>
        </form>
        </div>

    <?php // include "../include/footer.php"; ?> 
</body>
</html>