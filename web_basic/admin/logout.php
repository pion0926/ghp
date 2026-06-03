<?php
session_start(); // 세션 시작 (세션 변수 접근을 위해 필수)

// 모든 세션 변수 해제
$_SESSION = array();

// 세션 자체를 파괴
session_destroy();

// 로그인 페이지 또는 홈페이지로 리디렉션
header("Location: /web_basic/login.php"); 
exit;
?>