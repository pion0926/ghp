<?php include "../include/header.php"; ?>

<div id="news" class="wrap">
    <?php
    $pagen = isset($_GET['pagen']) ? $_GET['pagen'] : '285';
    $search_option = isset($_GET['search_option']) ? $_GET['search_option'] : '';
    $search_info = isset($_GET['search_info']) ? $_GET['search_info'] : '';

    // Define all notices
    $notices = [
        '1693' => [
            'title' => '[공지] 글로벌헬스파트너스 웹사이트 리뉴얼 안내',
            'category' => '일반',
            'author' => '관리자',
            'date' => '2024-03-29',
            'views' => '123'
        ],
        '1692' => [
            'title' => '[보고] 2024년 1분기 사업 보고서 발간',
            'category' => '일반',
            'author' => '관리자',
            'date' => '2024-03-28',
            'views' => '89'
        ],
        '1691' => [
            'title' => '[채용] 2024년 신입직원 채용 공고',
            'category' => '채용',
            'author' => '인사팀',
            'date' => '2024-03-27',
            'views' => '256'
        ],
        '1690' => [
            'title' => '[모집] 2024년 상반기 의료 봉사활동 참여자 모집',
            'category' => '일반',
            'author' => '봉사팀',
            'date' => '2024-03-26',
            'views' => '145'
        ],
        '1689' => [
            'title' => '[안내] 2024년 기부금 구입 안내',
            'category' => '일반',
            'author' => '기부팀',
            'date' => '2024-03-25',
            'views' => '78'
        ],
        '1688' => [
            'title' => '[안내] 2024년 정기총회 개최 안내',
            'category' => '일반',
            'author' => '총무팀',
            'date' => '2024-03-24',
            'views' => '92'
        ]
    ];

    // Filter notices based on search criteria
    if (!empty($search_info)) {
        $filtered_notices = [];
        foreach ($notices as $sno => $notice) {
            if ($search_option === '제목' && stripos($notice['title'], $search_info) !== false) {
                $filtered_notices[$sno] = $notice;
            } elseif ($search_option === '내용') {
                // Get the content from view.php
                include 'view.php';
                if (isset($notices[$sno]['content']) && stripos($notices[$sno]['content'], $search_info) !== false) {
                    $filtered_notices[$sno] = $notice;
                }
            }
        }
        $notices = $filtered_notices;
    }

    // Sort notices by date (newest first)
    uasort($notices, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });

    // Define valid page numbers and their corresponding PHP files
    $valid_pages = [
        '285' => '285.php',
        '299' => '299.php',
        '314' => '314.php',
        '328' => '328.php',
        '348' => '348.php',
        '377' => '377.php'
    ];

    if (array_key_exists($pagen, $valid_pages)) {
        $filepath = $valid_pages[$pagen];
        if (file_exists($filepath)) {
            include $filepath;
        } else {
            echo '<div class="error">Error: The requested page could not be found.</div>';
        }
    } else {
        echo '<div class="error">Error: Invalid page number.</div>';
    }
    ?>
</div>
