<?php
// Include the header
include '../include/header.php';

// Get the page number from URL
$pagen = isset($_GET['pagen']) ? $_GET['pagen'] : '356';
$section = isset($_GET['section']) ? $_GET['section'] : 'business';

// Validate page number
if ($pagen >= 1 && $pagen <= 900) {
    $filename = $pagen . '.php';
    
    // Start the main content area
    echo '<div id="business" class="wrap">';
    echo '<div class="subTop">';
    echo '<div class="pageGroup">';
    
    // Get page title based on page number
    $page_title = '';
    switch($pagen) {
        case '356':
            $page_title = '국제협력';
            break;
        case '250':
            $page_title = '인재양성';
            break;
        case '251':
            $page_title = '연구·조사';
            break;
        case '252':
            $page_title = '지구촌봉사단';
            break;
        case '253':
            $page_title = '해외파견간사';
            break;
        case '214':
            $page_title = '정책사업';
            break;
        case '449':
            $page_title = '봉사활동';
            break;
        default:
            $page_title = '사업안내';
    }
    
    echo '<h2>' . $page_title . '</h2>';
    echo '</div>';
    echo '</div>';
    
    // Include the specific page content
    if (file_exists($filename)) {
        include $filename;
    } else {
        echo '<div class="error-message">페이지를 찾을 수 없습니다.</div>';
    }
    
    echo '</div>'; // Close wrap div
} else {
    echo '<div class="error-message">잘못된 페이지 번호입니다.</div>';
}

// Include the footer
include '../include/footer.php';
?>
