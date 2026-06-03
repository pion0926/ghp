<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stored_username = 'admin';
    $stored_hashed_password = '$2y$10$7K63FF5OkBbAjs4nsGgIEeDRPul3S.ghdF.GjowtkW8zFPfM0tDLO';

    if ($username === $stored_username && password_verify($password, $stored_hashed_password)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['is_admin'] = 1;
        header('Location: /web_basic/board/list.php?pagen=285');
        exit;
    } else {
        $error = "잘못된 사용자 이름 또는 비밀번호입니다.";
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>관리자 로그인</title>
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }
        .btn-login {
            width: 100%;
            padding: 10px;
            background: #2c5282;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-login:hover {
            background: #2b6cb0;
        }
        .error {
            color: #e53e3e;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>관리자 로그인</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">사용자 이름</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">로그인</button>
        </form>
    </div>
</body>
</html> 