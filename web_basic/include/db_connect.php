<?php
// --- 데이터베이스 연결 정보 ---
// 실제 운영 환경에서는 보안을 위해 이 정보를 별도의 설정 파일이나 환경 변수로 관리하는 것이 좋습니다.

// 업로드용
$db_host = "localhost";             // 데이터베이스 서버 주소 (일반적으로 localhost)
$db_user = "cd0926";                // 데이터베이스 사용자 이름 (실제 사용자 이름으로 변경하세요)
$db_pass = "a7896413";              // 데이터베이스 비밀번호 (실제 비밀번호로 변경하세요)
$db_name = "cd0926";                // 사용할 데이터베이스 이름 (실제 데이터베이스 이름으로 변경하세요)

// 로컬 테스트용
// $db_host = "localhost";                // 데이터베이스 서버 주소 (일반적으로 localhost)
// $db_user = "notice_admin";             // 데이터베이스 사용자 이름 (실제 사용자 이름으로 변경하세요)
// $db_pass = "cd0926";                   // 데이터베이스 비밀번호 (실제 비밀번호로 변경하세요)
// $db_name = "cd0926";                   // 사용할 데이터베이스 이름 (실제 데이터베이스 이름으로 변경하세요)


// --- MySQLi 연결 시도 ---
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// --- 연결 확인 ---
if (!$conn) {
    // 연결 실패 시 오류 메시지 출력 및 스크립트 종료
    // die() 함수는 메시지를 출력하고 즉시 스크립트 실행을 중단합니다.
    // 실제 서비스 환경에서는 사용자에게 상세 오류(예: mysqli_connect_error())를 직접 보여주지 않는 것이 좋습니다.
    // 대신 오류 로그를 기록하고 일반적인 오류 메시지를 보여주는 방식을 사용합니다.
    error_log("Database Connection Error: " . mysqli_connect_error()); // 오류 로그 기록
    die("데이터베이스 연결에 실패했습니다. 관리자에게 문의하세요."); 
}
$conn->set_charset("utf8mb4");

// --- 문자 인코딩 설정 (UTF-8) ---
// 데이터베이스와 PHP 간의 데이터 전송 시 문자 깨짐 방지
if (!mysqli_set_charset($conn, "utf8mb4")) {
    // 문자셋 설정 실패 시 오류 로그 기록 (스크립트를 반드시 중단할 필요는 없을 수 있음)
    error_log("Error loading character set utf8mb4: " . mysqli_error($conn));
    // 필요한 경우 여기서도 die()를 사용하여 중단할 수 있습니다.
    // die("데이터베이스 문자셋 설정에 실패했습니다."); 
}

// 이제 $conn 변수를 다른 PHP 파일에서 include하여 데이터베이스 작업에 사용할 수 있습니다.
?>