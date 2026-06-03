<?php

function isAdmin() {
    return (isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] === true || $_SESSION['is_admin'] === 1));
}


function requireAdmin() {
    if (!isAdmin()) {
        echo "<script>
            alert('관리자 권한이 없습니다. 관리자 계정으로 로그인해주세요.');
            window.location.href = '/web_basic/member/login.php';
        </script>";
        exit;
    }
}
