<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../include/db_connect.php';

$participationConfig = require __DIR__ . '/participation_config.php';

function respond_json($success, $message, $data = array(), $status = 200) {
    http_response_code($status);
    echo json_encode(array_merge(array(
        'success' => $success,
        'message' => $message
    ), $data), JSON_UNESCAPED_UNICODE);
    exit;
}

function value_label($value, $labels) {
    return isset($labels[$value]) ? $labels[$value] : $value;
}

function post_google_sheet($webhookUrl, $payload) {
    if ($webhookUrl === '') {
        return array('success' => false, 'message' => 'Google Sheet webhook URL is not configured.');
    }

    if (!function_exists('curl_init')) {
        return array('success' => false, 'message' => 'PHP cURL extension is not available.');
    }

    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload, JSON_UNESCAPED_UNICODE));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 8);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false || $statusCode < 200 || $statusCode >= 300) {
        return post_google_sheet_get_fallback($webhookUrl, $payload, $error !== '' ? $error : 'HTTP ' . $statusCode);
    }

    $decoded = json_decode($response, true);
    if (!is_array($decoded) || empty($decoded['success'])) {
        return post_google_sheet_get_fallback($webhookUrl, $payload, 'Unexpected Google Apps Script response: ' . mb_substr(strip_tags($response), 0, 200, 'UTF-8'));
    }

    return array('success' => true, 'message' => $response);
}

function post_google_sheet_get_fallback($webhookUrl, $payload, $previousMessage) {
    $separator = strpos($webhookUrl, '?') === false ? '?' : '&';
    $fallbackUrl = $webhookUrl . $separator . 'payload=' . rawurlencode(json_encode($payload, JSON_UNESCAPED_UNICODE));

    $ch = curl_init($fallbackUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 8);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false || $statusCode < 200 || $statusCode >= 300) {
        return array('success' => false, 'message' => $previousMessage . ' / GET fallback failed: ' . ($error !== '' ? $error : 'HTTP ' . $statusCode));
    }

    $decoded = json_decode($response, true);
    if (!is_array($decoded) || empty($decoded['success'])) {
        return array('success' => false, 'message' => $previousMessage . ' / GET fallback unexpected response: ' . mb_substr(strip_tags($response), 0, 200, 'UTF-8'));
    }

    return array('success' => true, 'message' => $response);
}

function send_admin_email($config, $payload) {
    $subject = '[글로벌헬스파트너스] 참여 신청이 접수되었습니다 #' . $payload['application_id'];
    if (function_exists('mb_encode_mimeheader')) {
        $encodedSubject = mb_encode_mimeheader($subject, 'UTF-8');
        $encodedFromName = mb_encode_mimeheader($config['from_name'], 'UTF-8');
    } else {
        $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
        $encodedFromName = '=?UTF-8?B?' . base64_encode($config['from_name']) . '?=';
    }

    $body = implode("\n", array(
        '새 참여 신청이 접수되었습니다.',
        '',
        '신청번호: ' . $payload['application_id'],
        '신청일시: ' . $payload['created_at'],
        '회원유형: ' . $payload['member_type_label'],
        '신청자유형: ' . $payload['member_category_label'],
        '납부방식: ' . $payload['payment_plan_label'],
        '납부방법: ' . $payload['payment_method_label'],
        '입금자명: ' . ($payload['depositor_name'] !== '' ? $payload['depositor_name'] : '-'),
        '금액: ' . number_format((int)$payload['amount']) . '원',
        '이름: ' . $payload['applicant_name'],
        '연락처: ' . $payload['phone'],
        '이메일: ' . ($payload['email'] !== '' ? $payload['email'] : '-'),
        '기부금 영수증: ' . $payload['receipt_requested_label'],
        '참여 경로: ' . ($payload['join_route_label'] !== '' ? $payload['join_route_label'] : '-'),
        '메모: ' . ($payload['memo'] !== '' ? $payload['memo'] : '-'),
        '',
        '입금계좌: ' . $payload['bank_name'] . ' ' . $payload['bank_account'] . ' (' . $payload['account_holder'] . ')',
        '구글시트: ' . $config['google_sheet_url']
    ));

    $headers = array(
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $encodedFromName . ' <' . $config['from_email'] . '>'
    );

    return @mail($config['admin_email'], $encodedSubject, $body, implode("\r\n", $headers));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond_json(false, '잘못된 접근입니다.', array(), 405);
}

$memberType = isset($_POST['member_type']) ? trim($_POST['member_type']) : '';
$memberCategory = isset($_POST['member_category']) ? trim($_POST['member_category']) : 'personal';
$paymentPlan = isset($_POST['payment_plan']) ? trim($_POST['payment_plan']) : '';
$paymentMethod = isset($_POST['payment_method']) ? trim($_POST['payment_method']) : 'bank_transfer';
$depositorName = isset($_POST['depositor_name']) ? trim($_POST['depositor_name']) : '';
$amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 0;
$applicantName = isset($_POST['applicant_name']) ? trim($_POST['applicant_name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$receiptRequested = isset($_POST['receipt_requested']) && $_POST['receipt_requested'] === '1' ? 1 : 0;
$joinRoute = isset($_POST['join_route']) ? trim($_POST['join_route']) : '';
$memo = isset($_POST['memo']) ? trim($_POST['memo']) : '';
$paymentConfirmed = isset($_POST['payment_confirmed']) && $_POST['payment_confirmed'] === '1';
$privacyAgreed = isset($_POST['privacy_agreed']) && $_POST['privacy_agreed'] === '1';

if (!in_array($memberType, array('regular', 'sponsor'), true)) {
    respond_json(false, '회원 유형을 다시 선택해 주세요.', array(), 422);
}

if (!in_array($memberCategory, array('personal', 'organization', 'foreigner'), true)) {
    respond_json(false, '신청자 유형을 다시 선택해 주세요.', array(), 422);
}

if ($paymentMethod !== 'bank_transfer') {
    respond_json(false, '현재는 계좌이체 신청만 가능합니다.', array(), 422);
}

if ($applicantName === '' || $phone === '') {
    respond_json(false, '이름과 연락처를 입력해 주세요.', array(), 422);
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond_json(false, '이메일 형식을 확인해 주세요.', array(), 422);
}

if (!$paymentConfirmed) {
    respond_json(false, '입금 확인 항목에 동의해 주세요.', array(), 422);
}

if (!$privacyAgreed) {
    respond_json(false, '개인정보 수집 및 이용에 동의해 주세요.', array(), 422);
}

if ($memberType === 'regular') {
    if ($paymentPlan === 'annual') {
        $amount = 100000;
    } elseif ($paymentPlan === 'monthly') {
        $amount = 10000;
    } else {
        respond_json(false, '정회원 회비 방식을 다시 선택해 주세요.', array(), 422);
    }
} else {
    $paymentPlan = 'one_time';
    if ($amount < 10000) {
        respond_json(false, '후원회원 후원금은 10,000원 이상이어야 합니다.', array(), 422);
    }
}

$createTableSql = "
    CREATE TABLE IF NOT EXISTS participation_applications (
        id INT AUTO_INCREMENT PRIMARY KEY,
        member_type VARCHAR(20) NOT NULL,
        member_category VARCHAR(20) NOT NULL DEFAULT 'personal',
        payment_plan VARCHAR(20) NOT NULL,
        payment_method VARCHAR(30) NOT NULL DEFAULT 'bank_transfer',
        depositor_name VARCHAR(100) DEFAULT NULL,
        amount INT NOT NULL,
        applicant_name VARCHAR(100) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        email VARCHAR(255) DEFAULT NULL,
        receipt_requested TINYINT(1) NOT NULL DEFAULT 0,
        join_route VARCHAR(50) DEFAULT NULL,
        memo TEXT DEFAULT NULL,
        bank_name VARCHAR(100) NOT NULL,
        bank_account VARCHAR(100) NOT NULL,
        account_holder VARCHAR(100) NOT NULL,
        payment_status VARCHAR(20) NOT NULL DEFAULT 'reported',
        member_status VARCHAR(20) NOT NULL DEFAULT 'active',
        sheet_synced TINYINT(1) NOT NULL DEFAULT 0,
        email_sent TINYINT(1) NOT NULL DEFAULT 0,
        notified_at DATETIME DEFAULT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
";

if (!$conn->query($createTableSql)) {
    error_log('Participation table error: ' . $conn->error);
    respond_json(false, '신청 저장 준비 중 오류가 발생했습니다.', array(), 500);
}

function ensure_column($conn, $table, $column, $definition) {
    $tableEscaped = $conn->real_escape_string($table);
    $columnEscaped = $conn->real_escape_string($column);
    $result = $conn->query("SHOW COLUMNS FROM `{$tableEscaped}` LIKE '{$columnEscaped}'");
    if ($result && $result->num_rows > 0) {
        return true;
    }
    return $conn->query("ALTER TABLE `{$tableEscaped}` ADD COLUMN {$definition}");
}

$columnsReady =
    ensure_column($conn, 'participation_applications', 'member_category', "`member_category` VARCHAR(20) NOT NULL DEFAULT 'personal' AFTER `member_type`") &&
    ensure_column($conn, 'participation_applications', 'payment_method', "`payment_method` VARCHAR(30) NOT NULL DEFAULT 'bank_transfer' AFTER `payment_plan`") &&
    ensure_column($conn, 'participation_applications', 'depositor_name', "`depositor_name` VARCHAR(100) DEFAULT NULL AFTER `payment_method`") &&
    ensure_column($conn, 'participation_applications', 'receipt_requested', "`receipt_requested` TINYINT(1) NOT NULL DEFAULT 0 AFTER `email`") &&
    ensure_column($conn, 'participation_applications', 'join_route', "`join_route` VARCHAR(50) DEFAULT NULL AFTER `receipt_requested`") &&
    ensure_column($conn, 'participation_applications', 'sheet_synced', "`sheet_synced` TINYINT(1) NOT NULL DEFAULT 0 AFTER `member_status`") &&
    ensure_column($conn, 'participation_applications', 'email_sent', "`email_sent` TINYINT(1) NOT NULL DEFAULT 0 AFTER `sheet_synced`") &&
    ensure_column($conn, 'participation_applications', 'notified_at', "`notified_at` DATETIME DEFAULT NULL AFTER `email_sent`");

if (!$columnsReady) {
    error_log('Participation alter table error: ' . $conn->error);
    respond_json(false, '신청 저장 항목 준비 중 오류가 발생했습니다.', array(), 500);
}

$bankName = '기업은행';
$bankAccount = '69503167004016';
$accountHolder = '글로벌헬스파트너스';
$paymentStatus = 'reported';
$memberStatus = 'active';

$stmt = $conn->prepare("
    INSERT INTO participation_applications
        (member_type, member_category, payment_plan, payment_method, depositor_name, amount, applicant_name, phone, email, receipt_requested, join_route, memo, bank_name, bank_account, account_holder, payment_status, member_status)
    VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    error_log('Participation prepare error: ' . $conn->error);
    respond_json(false, '신청 저장 중 오류가 발생했습니다.', array(), 500);
}

$stmt->bind_param(
    'sssssisssisssssss',
    $memberType,
    $memberCategory,
    $paymentPlan,
    $paymentMethod,
    $depositorName,
    $amount,
    $applicantName,
    $phone,
    $email,
    $receiptRequested,
    $joinRoute,
    $memo,
    $bankName,
    $bankAccount,
    $accountHolder,
    $paymentStatus,
    $memberStatus
);

if (!$stmt->execute()) {
    error_log('Participation insert error: ' . $stmt->error);
    respond_json(false, '신청 저장에 실패했습니다. 관리자에게 문의해 주세요.', array(), 500);
}

$applicationId = $stmt->insert_id;
$createdAt = date('Y-m-d H:i:s');
$memberTypeLabels = array('regular' => '정회원', 'sponsor' => '후원회원');
$memberCategoryLabels = array('personal' => '개인', 'organization' => '사업자 / 단체', 'foreigner' => '외국인');
$paymentPlanLabels = array('annual' => '연회비', 'monthly' => '월회비', 'one_time' => '일시후원');
$paymentMethodLabels = array('bank_transfer' => '계좌이체');
$joinRouteLabels = array(
    '' => '',
    'homepage' => '홈페이지',
    'sns' => 'SNS',
    'recommendation' => '지인 추천',
    'event' => '행사 / 캠페인',
    'other' => '기타'
);

$typeLabel = value_label($memberType, $memberTypeLabels);
$amountLabel = number_format($amount) . '원';
$notificationPayload = array(
    'application_id' => $applicationId,
    'created_at' => $createdAt,
    'member_type' => $memberType,
    'member_type_label' => $typeLabel,
    'member_category' => $memberCategory,
    'member_category_label' => value_label($memberCategory, $memberCategoryLabels),
    'payment_plan' => $paymentPlan,
    'payment_plan_label' => value_label($paymentPlan, $paymentPlanLabels),
    'payment_method' => $paymentMethod,
    'payment_method_label' => value_label($paymentMethod, $paymentMethodLabels),
    'depositor_name' => $depositorName,
    'amount' => $amount,
    'applicant_name' => $applicantName,
    'phone' => $phone,
    'email' => $email,
    'receipt_requested' => $receiptRequested,
    'receipt_requested_label' => $receiptRequested ? '신청' : '신청 안함',
    'join_route' => $joinRoute,
    'join_route_label' => value_label($joinRoute, $joinRouteLabels),
    'memo' => $memo,
    'bank_name' => $bankName,
    'bank_account' => $bankAccount,
    'account_holder' => $accountHolder
);

$sheetResult = post_google_sheet(trim($participationConfig['google_sheet_webhook_url']), $notificationPayload);
$emailSent = send_admin_email($participationConfig, $notificationPayload);
$sheetSynced = $sheetResult['success'] ? 1 : 0;
$emailSentFlag = $emailSent ? 1 : 0;

$updateStmt = $conn->prepare("
    UPDATE participation_applications
    SET sheet_synced = ?, email_sent = ?, notified_at = NOW()
    WHERE id = ?
");

if ($updateStmt) {
    $updateStmt->bind_param('iii', $sheetSynced, $emailSentFlag, $applicationId);
    $updateStmt->execute();
}

if (!$sheetResult['success']) {
    error_log('Participation Google Sheet sync skipped/failed: ' . $sheetResult['message']);
}

if (!$emailSent) {
    error_log('Participation admin email failed for application #' . $applicationId);
}

respond_json(true, $typeLabel . ' 신청이 접수되었습니다. 입금 확인 기준 금액은 ' . $amountLabel . '입니다.', array(
    'application_id' => $applicationId,
    'amount' => $amount,
    'member_type' => $memberType,
    'sheet_synced' => $sheetSynced,
    'email_sent' => $emailSentFlag
));
?>
