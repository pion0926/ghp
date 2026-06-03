<?php
session_start();
include "../include/db_connect.php";

// POST 데이터 검증
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('잘못된 요청입니다.');
}

// 필수 필드 검증
$required_fields = ['noticeId', 'donationType', 'donationAmount', 'donorType'];
foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        die('필수 정보가 누락되었습니다.');
    }
}

// 데이터 정제
$notice_id = intval($_POST['noticeId']);
$donation_type = $_POST['donationType'];
$amount = intval($_POST['donationAmount']);
$donor_type = $_POST['donorType'];

// 후원자 정보 처리
if ($donor_type === 'personal') {
    if (!isset($_POST['donorName']) || !isset($_POST['donorPhone'])) {
        die('개인 정보가 누락되었습니다.');
    }
    $donor_name = $_POST['donorName'];
    $donor_phone = $_POST['donorPhone'];
    $org_name = null;
    $org_contact_name = null;
    $org_contact_phone = null;
} else {
    if (!isset($_POST['orgName']) || !isset($_POST['orgContactName']) || !isset($_POST['orgContactPhone'])) {
        die('기업/단체 정보가 누락되었습니다.');
    }
    $donor_name = null;
    $donor_phone = null;
    $org_name = $_POST['orgName'];
    $org_contact_name = $_POST['orgContactName'];
    $org_contact_phone = $_POST['orgContactPhone'];
}

try {
    // 데이터베이스 연결
    $conn = new mysqli("localhost", "root", "", "web_basic");
    if ($conn->connect_error) {
        throw new Exception("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    // 트랜잭션 시작
    $conn->begin_transaction();

    // 후원 정보 저장
    $stmt = $conn->prepare("INSERT INTO donations (
        notice_id, donation_type, amount, donor_type,
        donor_name, donor_phone, org_name, org_contact_name, org_contact_phone
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "isiisssss",
        $notice_id,
        $donation_type,
        $amount,
        $donor_type,
        $donor_name,
        $donor_phone,
        $org_name,
        $org_contact_name,
        $org_contact_phone
    );

    if (!$stmt->execute()) {
        throw new Exception("후원 정보 저장 실패: " . $stmt->error);
    }

    // 트랜잭션 커밋
    $conn->commit();

    // 성공 응답
    echo json_encode([
        'success' => true,
        'message' => '후원이 성공적으로 처리되었습니다.'
    ]);

} catch (Exception $e) {
    // 오류 발생 시 롤백
    if (isset($conn)) {
        $conn->rollback();
    }
    
    // 오류 응답
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => '오류가 발생했습니다: ' . $e->getMessage()
    ]);
} finally {
    // 리소스 정리
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($conn)) {
        $conn->close();
    }
}
?> 