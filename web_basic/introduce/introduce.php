<?php
// Include the header
include '../include/header.php';

// Get the page number from URL
$pagen = isset($_GET['pagen']) ? $_GET['pagen'] : '206';
$section = isset($_GET['section']) ? $_GET['section'] : 'introduce';

// Validate page number
if ($pagen >= 1 && $pagen <= 900) {
    $filename = $pagen . '.php';
    
    // Start the main content area
    echo '<div id="introduce" class="wrap">';
    echo '<div class="subTop">';
    echo '<div class="pageGroup">';
    
    // Get page title based on page number
    $page_title = '';
    switch($pagen) {
        case '206':
            $page_title = '비전과 가치';
            break;
        case '207':
            $page_title = '인사말';
            break;
        case '230':
            $page_title = '연혁';
            break;
        case '448':
            $page_title = '재정보고';
            break;
        case '246':
            $page_title = '조직도';
            break;
        case '211':
            $page_title = '임원소개';
            break;
        case '212':
            $page_title = '찾아오시는길';
            break;
        default:
            $page_title = '단체소개';
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