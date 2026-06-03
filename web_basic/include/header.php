<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="글로벌헬스파트너스, 누구도 소외되지 않는 건강한 삶, 보다 나은 내일을 만들어가는 NGO" />
    <meta name="keywords" content="글로벌헬스파트너스, NGO, 건강한 삶" />
    <meta property="og:site_name" content="글로벌헬스파트너스" />
    <meta property="og:title" content="글로벌헬스파트너스" />
    <meta property="og:description" content="글로벌헬스파트너스, 누구도 소외되지 않는 건강한 삶, 보다 나은 내일을 만들어가는 NGO" />
    <meta property="og:url" content="https://gbhealthpartners.kr" />
    <meta property="og:image" content="/web_basic/img/common/로고_가로형-한글영문(new).png" />
    <meta property="og:type" content="website" />

    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/png" href="favicon.ico" />

    <title>글로벌헬스파트너스</title>

    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtm.js?id=GTM-KM4JGCQ8"></script>
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KM4JGCQ8');
    </script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/web_basic/css/default.css" />
    <link rel="stylesheet" href="/web_basic/css/layout.css" />
    <link rel="stylesheet" href="/web_basic/css/contents.css" />
    <link rel="stylesheet" href="/web_basic/css/board.css" />
    <link rel="stylesheet" href="/web_basic/js/slick/slick.css" />
    <link rel="stylesheet" href="/web_basic/css/main.css" />

    <!-- Scripts -->
    <script src="/web_basic/js/jquery-3.6.0.min.js"></script>
    <script src="/web_basic/js/common.js"></script>
    <script src="/web_basic/js/pictuerfill.js"></script>
    <script src="/web_basic/js/slick/slick.js"></script>
    <script src="/web_basic/js/main.js"></script>
</head>

<body class="pc">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KM4JGCQ8"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <ul class="sknavi_box">
        <li><a href="#section" class="sknavi">본문바로가기</a></li>
        <li><a href="#gnb" class="sknavi">메인메뉴 바로가기</a></li>
        <li><a href="#footer" class="sknavi">사이트정보 바로가기</a></li>
    </ul>

    <header id="header" class="scroll">
        <div class="headerWrap">
            <h1>
                <a href="/web_basic">
                    <img src="/web_basic/img/common/로고_가로형-한글영문(new).png" alt="글로벌헬스파트너스" />
                </a>
            </h1>

            <button class="btnAllNav" aria-label="모바일 메뉴 열기">☰</button>

            <div class="rightCont">
                <nav class="navList">
                    <ul id="gnb">
                        <?php include 'navigation.php'; ?>
                    </ul>
                </nav>
                <p class="btnGo">
                    <a href="javascript:;" onclick="openDonationModal()">참여하기</a>
                </p>
            </div>
        </div>
        <div class="allNavView">
        <div class="allNavCont">
            <div class="allNavClose">&times;</div>
            <ul id="gnb">
            <li>
                <a href="javascript:void(0);" class="mobileMenuToggle">단체소개 <span class="arrow">▼</span> </a>
                <div class="depth">
                <ul>
                    <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=206">비전과 가치</a></li>
                    <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=207">인사말</a></li>
                    <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=230">연혁</a></li>
                    <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=448">재정보고</a></li>
                    <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=246">조직도</a></li>
                    <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=211">임원소개</a></li>
                </ul>
                </div>
            </li>
            <li>
                <a href="javascript:void(0);" class="mobileMenuToggle">사업안내 <span class="arrow">▼</span> </a>
                <div class="depth">
                <ul>
                    <li><a href="/web_basic/business/business.php?section=business&pagen=356">국제협력</a></li>
                    <li><a href="/web_basic/business/business.php?section=business&pagen=449">봉사활동</a></li>
                    <li><a href="/web_basic/business/business.php?section=business&pagen=250">인재양성</a></li>
                    <li><a href="/web_basic/business/business.php?section=business&pagen=251">연구조사</a></li>
                    <li><a href="/web_basic/business/business.php?section=business&pagen=252">의료지원</a></li>
                </ul>
                </div>
            </li>
            <li>
                <a href="javascript:void(0);" class="mobileMenuToggle">소식 <span class="arrow">▼</span> </a>
                <div class="depth">
                <ul>
                    <li><a href="/web_basic/board/list.php?section=news&pagen=285">공지</a></li>
                    <li><a href="/web_basic/board/list.php?section=news&pagen=299">뉴스</a></li>
                </ul>
                </div>
            </li>
            </ul>
        </div>
        </div>
    </header>

    <!-- Donation Modal -->
    <!-- <div id="donationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDonationModal()">&times;</span>
            <h2>준비중입니다</h2>
            <p>현재 후원하기 기능은 준비 중입니다. 나중에 다시 시도해 주세요.</p>
            <div class="form-buttons">
                <button type="button" class="btnCancel" onclick="closeDonationModal()">닫기</button>
            </div>
        </div>
    </div> -->

    <!-- Modal Scripts -->
    <script>
        function openDonationModal() {
            document.getElementById('donationModal').style.display = 'block';
        }

        function closeDonationModal() {
            document.getElementById('donationModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target === document.getElementById('donationModal')) {
                closeDonationModal();
            }
        };
    </script>
</body>
</html>
