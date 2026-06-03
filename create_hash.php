<?php
// create_hash.php

// ★★★ 여기에 실제 사용할 비밀번호를 입력하세요 ★★★
$plain_password = 'cd0926'; 

// 비밀번호 해시 생성 (PASSWORD_DEFAULT는 현재 권장되는 알고리즘 사용)
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

// 결과 출력
echo "입력한 비밀번호: " . htmlspecialchars($plain_password) . "<br>";
echo "생성된 해시 값: <strong>" . htmlspecialchars($hashed_password) . "</strong>"; 
?>