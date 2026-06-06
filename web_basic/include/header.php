<?php
if (session_status() === PHP_SESSION_NONE) session_start();
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
$assetVersion = '20260606-2030';
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
    <link rel="stylesheet" href="/web_basic/css/default.css?v=<?php echo $assetVersion; ?>" />
    <link rel="stylesheet" href="/web_basic/css/layout.css?v=<?php echo $assetVersion; ?>" />
    <link rel="stylesheet" href="/web_basic/css/contents.css?v=<?php echo $assetVersion; ?>" />
    <link rel="stylesheet" href="/web_basic/css/board.css?v=<?php echo $assetVersion; ?>" />
    <link rel="stylesheet" href="/web_basic/js/slick/slick.css?v=<?php echo $assetVersion; ?>" />
    <link rel="stylesheet" href="/web_basic/css/main.css?v=<?php echo $assetVersion; ?>" />

    <!-- Scripts -->
    <script src="/web_basic/js/jquery-3.6.0.min.js?v=<?php echo $assetVersion; ?>"></script>
    <script src="/web_basic/js/common.js?v=<?php echo $assetVersion; ?>"></script>
    <script src="/web_basic/js/pictuerfill.js?v=<?php echo $assetVersion; ?>"></script>
    <script src="/web_basic/js/slick/slick.js?v=<?php echo $assetVersion; ?>"></script>
    <script src="/web_basic/js/main.js?v=<?php echo $assetVersion; ?>"></script>
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

            <button class="btnAllNav" type="button" aria-label="모바일 메뉴 열기" aria-controls="mobileNavigation" aria-expanded="false">☰</button>

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
        <div class="allNavView" id="mobileNavigation" aria-hidden="true">
        <div class="allNavCont" role="dialog" aria-modal="true" aria-label="모바일 전체 메뉴">
            <button type="button" class="allNavClose" aria-label="모바일 메뉴 닫기">&times;</button>
            <div class="mobileParticipation">
                <button type="button" onclick="openDonationModal()">참여하기</button>
                <p>정회원 또는 후원회원으로 함께해 주세요</p>
            </div>
            <ul id="mobileGnb">
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

    <div id="donationModal" class="donationModal" aria-hidden="true">
        <div class="donationModalPanel" role="dialog" aria-modal="true" aria-labelledby="donationModalTitle">
            <button type="button" class="donationModalClose" onclick="closeDonationModal()" aria-label="참여하기 창 닫기">&times;</button>

            <div class="donationModalHead">
                <p>글로벌헬스파트너스 참여하기</p>
                <h2 id="donationModalTitle">정회원 또는 후원회원으로 함께해 주세요</h2>
                <span>계좌이체 확인 방식의 1차 신청 기능입니다. 실제 결제 연동은 추후 PG사 연결로 확장할 수 있습니다.</span>
            </div>

            <form id="participationForm" class="participationForm" method="post" action="/web_basic/member/process_participation.php">
                <input type="hidden" name="member_type" id="memberType" value="regular">
                <input type="hidden" name="payment_plan" id="paymentPlan" value="annual">
                <input type="hidden" name="amount" id="participationAmount" value="100000">

                <div class="memberTypeGrid" role="group" aria-label="회원 유형 선택">
                    <button type="button" class="memberTypeCard active" data-member-type="regular">
                        <strong>정회원</strong>
                        <span>연회비 10만원 또는 월회비 1만원</span>
                    </button>
                    <button type="button" class="memberTypeCard" data-member-type="sponsor">
                        <strong>후원회원</strong>
                        <span>1만원 이상 자유 후원</span>
                    </button>
                </div>

                <div class="memberCategoryBox">
                    <p class="formSectionTitle">신청자 유형</p>
                    <div class="inlineRadioGroup">
                        <label>
                            <input type="radio" name="member_category" value="personal" checked>
                            <span>개인</span>
                        </label>
                        <label>
                            <input type="radio" name="member_category" value="organization">
                            <span>사업자 / 단체</span>
                        </label>
                        <label>
                            <input type="radio" name="member_category" value="foreigner">
                            <span>외국인</span>
                        </label>
                    </div>
                </div>

                <div class="participationOptions active" data-options="regular">
                    <p class="formSectionTitle">정회원 회비 선택</p>
                    <div class="amountChoiceGrid">
                        <label class="amountChoice active">
                            <input type="radio" name="regular_plan" value="annual" data-amount="100000" checked>
                            <span>연회비</span>
                            <strong>100,000원</strong>
                        </label>
                        <label class="amountChoice">
                            <input type="radio" name="regular_plan" value="monthly" data-amount="10000">
                            <span>월회비</span>
                            <strong>10,000원</strong>
                        </label>
                    </div>
                </div>

                <div class="participationOptions" data-options="sponsor">
                    <p class="formSectionTitle">후원 금액 선택</p>
                    <div class="amountChoiceGrid sponsorAmountGrid">
                        <label class="amountChoice active">
                            <input type="radio" name="sponsor_amount_preset" value="10000" checked>
                            <strong>10,000원</strong>
                        </label>
                        <label class="amountChoice">
                            <input type="radio" name="sponsor_amount_preset" value="30000">
                            <strong>30,000원</strong>
                        </label>
                        <label class="amountChoice">
                            <input type="radio" name="sponsor_amount_preset" value="50000">
                            <strong>50,000원</strong>
                        </label>
                        <label class="amountChoice">
                            <input type="radio" name="sponsor_amount_preset" value="100000">
                            <strong>100,000원</strong>
                        </label>
                    </div>
                    <label class="customAmountField">
                        <span>직접 입력</span>
                        <input type="number" id="customSponsorAmount" min="10000" step="1000" placeholder="10,000원 이상">
                    </label>
                </div>

                <div class="paymentGuide">
                    <div>
                        <span>입금 예정 금액</span>
                        <strong id="participationAmountText">100,000원</strong>
                    </div>
                    <div>
                        <span>후원계좌</span>
                        <strong>기업은행 69503167004016</strong>
                        <em>예금주: 글로벌헬스파트너스</em>
                    </div>
                </div>

                <div class="paymentInfoBox">
                    <p class="formSectionTitle">납부 정보</p>
                    <div class="fieldGrid">
                        <label>
                            <span>납부 방법</span>
                            <select name="payment_method">
                                <option value="bank_transfer">계좌이체</option>
                            </select>
                        </label>
                        <label>
                            <span>입금자명</span>
                            <input type="text" name="depositor_name" placeholder="신청자와 다를 경우 입력">
                        </label>
                    </div>
                </div>

                <div class="participantFields">
                    <p class="formSectionTitle">신청자 정보</p>
                    <div class="fieldGrid">
                        <label>
                            <span>이름</span>
                            <input type="text" name="applicant_name" autocomplete="name" required>
                        </label>
                        <label>
                            <span>연락처</span>
                            <input type="tel" name="phone" autocomplete="tel" placeholder="010-0000-0000" required>
                        </label>
                    </div>
                    <label>
                        <span>이메일</span>
                        <input type="email" name="email" autocomplete="email" placeholder="name@example.com">
                    </label>
                </div>

                <div class="receiptBox">
                    <p class="formSectionTitle">기부금 영수증</p>
                    <div class="inlineRadioGroup">
                        <label>
                            <input type="radio" name="receipt_requested" value="1" checked>
                            <span>신청</span>
                        </label>
                        <label>
                            <input type="radio" name="receipt_requested" value="0">
                            <span>신청 안함</span>
                        </label>
                    </div>
                    <p class="fieldHelp">영수증 발급에 필요한 고유식별번호 등 민감정보는 홈페이지에서 바로 받지 않고, 담당자가 별도로 안내합니다.</p>
                </div>

                <div class="additionalInfoBox">
                    <p class="formSectionTitle">추가 정보</p>
                    <label>
                        <span>참여 경로</span>
                        <select name="join_route">
                            <option value="">선택해 주세요</option>
                            <option value="homepage">홈페이지</option>
                            <option value="sns">SNS</option>
                            <option value="recommendation">지인 추천</option>
                            <option value="event">행사 / 캠페인</option>
                            <option value="other">기타</option>
                        </select>
                    </label>
                    <label>
                        <span>남기실 말</span>
                        <textarea name="memo" rows="3" placeholder="단체에 전하고 싶은 내용을 남겨주세요."></textarea>
                    </label>
                </div>

                <div class="agreementBox">
                    <label>
                        <input type="checkbox" name="payment_confirmed" value="1" required>
                        <span>위 계좌로 입금했거나 입금 예정임을 확인합니다.</span>
                    </label>
                    <label>
                        <input type="checkbox" name="privacy_agreed" value="1" required>
                        <span>회원 신청 처리를 위한 개인정보 수집 및 이용에 동의합니다.</span>
                    </label>
                </div>

                <p id="participationMessage" class="participationMessage" aria-live="polite"></p>

                <div class="participationActions">
                    <button type="button" class="btnCancel" onclick="closeDonationModal()">닫기</button>
                    <button type="submit" class="btnSubmit">신청 접수하기</button>
                </div>
            </form>
        </div>
    </div>

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
    <script>
        (function() {
            var modal = document.getElementById('donationModal');
            var form = document.getElementById('participationForm');
            var memberTypeInput = document.getElementById('memberType');
            var paymentPlanInput = document.getElementById('paymentPlan');
            var amountInput = document.getElementById('participationAmount');
            var amountText = document.getElementById('participationAmountText');
            var message = document.getElementById('participationMessage');
            var customSponsorAmount = document.getElementById('customSponsorAmount');
            var submitButton = form.querySelector('.btnSubmit');

            function formatWon(amount) {
                return Number(amount).toLocaleString('ko-KR') + '원';
            }

            function setAmount(amount) {
                amountInput.value = amount;
                amountText.textContent = formatWon(amount);
            }

            function setActiveChoice(input) {
                var choices = input.closest('.participationOptions').querySelectorAll('.amountChoice');
                choices.forEach(function(choice) {
                    choice.classList.remove('active');
                });
                input.closest('.amountChoice').classList.add('active');
            }

            function setMemberType(type) {
                memberTypeInput.value = type;
                document.querySelectorAll('.memberTypeCard').forEach(function(card) {
                    card.classList.toggle('active', card.getAttribute('data-member-type') === type);
                });
                document.querySelectorAll('.participationOptions').forEach(function(option) {
                    option.classList.toggle('active', option.getAttribute('data-options') === type);
                });

                if (type === 'regular') {
                    var checkedPlan = form.querySelector('input[name="regular_plan"]:checked');
                    paymentPlanInput.value = checkedPlan.value;
                    setActiveChoice(checkedPlan);
                    setAmount(checkedPlan.getAttribute('data-amount'));
                } else {
                    paymentPlanInput.value = 'one_time';
                    var customAmount = parseInt(customSponsorAmount.value, 10);
                    var checkedSponsor = form.querySelector('input[name="sponsor_amount_preset"]:checked');
                    if (customAmount > 0) {
                        setAmount(customAmount);
                    } else {
                        if (!checkedSponsor) {
                            checkedSponsor = form.querySelector('input[name="sponsor_amount_preset"]');
                            checkedSponsor.checked = true;
                        }
                        setActiveChoice(checkedSponsor);
                        setAmount(checkedSponsor.value);
                    }
                }
            }

            window.openDonationModal = function() {
                modal.style.display = '';
                modal.classList.add('active');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('modalOpen');
                var mobileNav = document.querySelector('.allNavView');
                if (mobileNav) mobileNav.classList.remove('active');
            };

            window.closeDonationModal = function() {
                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('modalOpen');
                message.textContent = '';
                message.className = 'participationMessage';
            };

            document.querySelectorAll('.memberTypeCard').forEach(function(card) {
                card.addEventListener('click', function() {
                    setMemberType(card.getAttribute('data-member-type'));
                });
            });

            form.querySelectorAll('input[name="regular_plan"]').forEach(function(input) {
                input.addEventListener('change', function() {
                    setActiveChoice(input);
                    paymentPlanInput.value = input.value;
                    setAmount(input.getAttribute('data-amount'));
                });
            });

            form.querySelectorAll('input[name="sponsor_amount_preset"]').forEach(function(input) {
                input.addEventListener('change', function() {
                    setActiveChoice(input);
                    customSponsorAmount.value = '';
                    setAmount(input.value);
                });
            });

            customSponsorAmount.addEventListener('input', function() {
                var customAmount = parseInt(customSponsorAmount.value, 10);
                form.querySelectorAll('input[name="sponsor_amount_preset"]').forEach(function(input) {
                    input.checked = false;
                });
                form.querySelectorAll('.sponsorAmountGrid .amountChoice').forEach(function(choice) {
                    choice.classList.remove('active');
                });
                if (customAmount > 0) {
                    setAmount(customAmount);
                }
            });

            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeDonationModal();
                }
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                message.textContent = '';
                message.className = 'participationMessage';

                if (memberTypeInput.value === 'sponsor' && parseInt(amountInput.value, 10) < 10000) {
                    message.textContent = '후원회원 후원금은 10,000원 이상 입력해 주세요.';
                    message.classList.add('error');
                    return;
                }

                submitButton.disabled = true;
                submitButton.textContent = '접수 중...';

                fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                })
                .then(function(response) { return response.json(); })
                .then(function(result) {
                    if (!result.success) {
                        throw new Error(result.message || '신청 접수 중 오류가 발생했습니다.');
                    }
                    message.textContent = result.message;
                    message.classList.add('success');
                    form.reset();
                    form.querySelector('input[name="sponsor_amount_preset"]').checked = true;
                    setMemberType('regular');
                })
                .catch(function(error) {
                    message.textContent = error.message;
                    message.classList.add('error');
                })
                .finally(function() {
                    submitButton.disabled = false;
                    submitButton.textContent = '신청 접수하기';
                });
            });
        })();
    </script>
</body>
</html>
