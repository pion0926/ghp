<?php include "../include/header.php"; ?>

<?php
// Get the notice ID from URL
$sno = isset($_GET['sno']) ? $_GET['sno'] : '';

// Define notice content based on sno
$notices = [
    '1693' => [
        'title' => '[공지] 글로벌헬스파트너스 웹사이트 리뉴얼 안내',
        'category' => '일반',
        'author' => '관리자',
        'date' => '2024-03-29',
        'views' => '123',
        'content' => '
            <div class="notice-content">
                <div class="notice-header">
                    <p>안녕하세요. 글로벌헬스파트너스입니다.</p>
                    <p>더 나은 서비스 제공을 위해 웹사이트를 새롭게 개편했습니다.</p>
                </div>
                
                <div class="notice-section">
                    <h4>주요 변경사항</h4>
                    <div class="feature-grid">
                        <div class="feature-item">
                            <h5>모바일 최적화</h5>
                            <p>모든 디바이스에서 최적화된 웹 경험 제공</p>
                        </div>
                        <div class="feature-item">
                            <h5>UI/UX 개선</h5>
                            <p>직관적인 네비게이션과 사용자 친화적 디자인</p>
                        </div>
                        <div class="feature-item">
                            <h5>콘텐츠 확장</h5>
                            <p>더 풍부한 정보와 미디어 콘텐츠 제공</p>
                        </div>
                        <div class="feature-item">
                            <h5>검색 기능 강화</h5>
                            <p>빠르고 정확한 정보 검색 가능</p>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>새로운 기능</h4>
                    <ul class="feature-list">
                        <li>실시간 기부 현황 표시</li>
                        <li>봉사활동 일정 캘린더</li>
                        <li>다국어 지원 (한국어, 영어, 중국어)</li>
                        <li>온라인 기부 시스템 개선</li>
                    </ul>
                </div>

                <div class="notice-footer">
                    <p>새로운 웹사이트를 통해 더 나은 서비스를 제공하도록 하겠습니다.</p>
                    <p>문의사항: webmaster@globalhealth.org</p>
                </div>
            </div>'
    ],
    '1692' => [
        'title' => '[보고] 2024년 1분기 사업 보고서 발간',
        'category' => '일반',
        'author' => '관리자',
        'date' => '2024-03-28',
        'views' => '89',
        'content' => '
            <div class="notice-content">
                <div class="notice-header">
                    <p>글로벌헬스파트너스 2024년 1분기 사업 보고서가 발간되었습니다.</p>
                    <p>본 보고서는 2024년 1월부터 3월까지 진행된 사업의 주요 성과와 현황을 담고 있습니다.</p>
                </div>

                <div class="notice-section">
                    <h4>주요 사업 성과</h4>
                    <div class="achievement-grid">
                        <div class="achievement-item">
                            <h5>해외 의료 지원</h5>
                            <ul>
                                <li>캄보디아 의료진 교육 프로그램 운영</li>
                                <li>라오스 보건소 의료장비 지원</li>
                                <li>베트남 소아과 의료진 교류 프로그램</li>
                            </ul>
                        </div>
                        <div class="achievement-item">
                            <h5>국내 봉사활동</h5>
                            <ul>
                                <li>전국 12개 지역 의료봉사 실시</li>
                                <li>의료 취약계층 지원 프로그램 운영</li>
                                <li>청소년 건강교육 캠페인 진행</li>
                            </ul>
                        </div>
                        <div class="achievement-item">
                            <h5>교육 및 훈련</h5>
                            <ul>
                                <li>글로벌 헬스케어 전문가 양성과정 운영</li>
                                <li>해외봉사자 사전교육 실시</li>
                                <li>의료진 역량강화 워크샵 개최</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>재정 현황</h4>
                    <div class="finance-summary">
                        <p>1분기 총 기부금 수입: 2억 5천만원</p>
                        <p>사업 운영비: 1억 8천만원</p>
                        <p>기부금 사용률: 72%</p>
                    </div>
                </div>

                <div class="notice-footer">
                    <p>자세한 내용은 첨부된 보고서를 참고해 주시기 바랍니다.</p>
                    <p>문의: report@globalhealth.org</p>
                </div>
            </div>'
    ],
    '1691' => [
        'title' => '[채용] 2024년 신입직원 채용 공고',
        'category' => '채용',
        'author' => '인사팀',
        'date' => '2024-03-27',
        'views' => '256',
        'content' => '
            <div class="notice-content">
                <div class="notice-header">
                    <h3>글로벌헬스파트너스 2024년 신입직원 채용</h3>
                    <p>글로벌 헬스케어의 미래를 함께 만들어갈 열정적인 인재를 모집합니다.</p>
                </div>

                <div class="notice-section">
                    <h4>채용 분야 및 인원</h4>
                    <div class="recruitment-grid">
                        <div class="recruitment-item">
                            <h5>해외사업 담당자 (2명)</h5>
                            <ul>
                                <li>해외 의료 지원 사업 기획 및 운영</li>
                                <li>국제기구 및 해외 파트너 협력</li>
                                <li>해외 현지 의료진 교육 프로그램 운영</li>
                            </ul>
                        </div>
                        <div class="recruitment-item">
                            <h5>국내사업 담당자 (1명)</h5>
                            <ul>
                                <li>국내 의료 봉사활동 기획 및 운영</li>
                                <li>지역사회 보건 프로그램 개발</li>
                                <li>의료 취약계층 지원 사업 운영</li>
                            </ul>
                        </div>
                        <div class="recruitment-item">
                            <h5>홍보/마케팅 담당자 (1명)</h5>
                            <ul>
                                <li>기부금 모금 캠페인 기획</li>
                                <li>소셜미디어 운영 및 콘텐츠 제작</li>
                                <li>기부자 관리 및 커뮤니케이션</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>지원 자격</h4>
                    <div class="qualification-list">
                        <div class="qualification-item">
                            <h5>공통 자격</h5>
                            <ul>
                                <li>학력: 대학 졸업 이상</li>
                                <li>어학: TOEIC 800점 이상 또는 해당 언어권 현지어 능통</li>
                                <li>경력: 신입 또는 3년 이하</li>
                            </ul>
                        </div>
                        <div class="qualification-item">
                            <h5>우대사항</h5>
                            <ul>
                                <li>의료/보건 관련 전공자</li>
                                <li>해외봉사 경험자</li>
                                <li>NGO 경험자</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>지원 방법</h4>
                    <div class="application-info">
                        <p>1. 이메일 접수: hr@globalhealth.org</p>
                        <p>2. 접수 기간: 2024년 3월 27일 ~ 4월 10일</p>
                        <p>3. 제출 서류: 이력서, 자기소개서, 포트폴리오</p>
                    </div>
                </div>

                <div class="notice-footer">
                    <p>자세한 내용은 첨부된 채용공고문을 참고해 주시기 바랍니다.</p>
                    <p>문의: hr@globalhealth.org</p>
                </div>
            </div>'
    ],
    '1690' => [
        'title' => '[모집] 2024년 상반기 의료 봉사활동 참여자 모집',
        'category' => '일반',
        'author' => '봉사팀',
        'date' => '2024-03-26',
        'views' => '145',
        'content' => '
            <div class="notice-content">
                <div class="notice-header">
                    <h3>2024년 상반기 의료 봉사활동 참여자 모집</h3>
                    <p>글로벌헬스파트너스와 함께 전 세계 의료 취약계층을 돕는 의료 봉사활동에 참여해주세요.</p>
                </div>

                <div class="notice-section">
                    <h4>모집 대상</h4>
                    <div class="volunteer-grid">
                        <div class="volunteer-item">
                            <h5>의료진</h5>
                            <ul>
                                <li>의사</li>
                                <li>간호사</li>
                                <li>약사</li>
                                <li>치과의사</li>
                            </ul>
                        </div>
                        <div class="volunteer-item">
                            <h5>의료 관련 대학생</h5>
                            <ul>
                                <li>의학과</li>
                                <li>간호학과</li>
                                <li>약학과</li>
                                <li>치의학과</li>
                            </ul>
                        </div>
                        <div class="volunteer-item">
                            <h5>일반 봉사자</h5>
                            <ul>
                                <li>통역 지원</li>
                                <li>행정 지원</li>
                                <li>물류 지원</li>
                                <li>기타 지원</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>활동 정보</h4>
                    <div class="activity-info">
                        <div class="info-item">
                            <h5>활동 기간</h5>
                            <p>2024년 4월 ~ 6월 (선택 가능)</p>
                        </div>
                        <div class="info-item">
                            <h5>활동 지역</h5>
                            <ul>
                                <li>국내: 전국 각지</li>
                                <li>해외: 아시아, 아프리카 지역</li>
                            </ul>
                        </div>
                        <div class="info-item">
                            <h5>지원 사항</h5>
                            <ul>
                                <li>항공권 지원</li>
                                <li>숙박 지원</li>
                                <li>보험 가입</li>
                                <li>현지 활동비 지원</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>지원 방법</h4>
                    <div class="application-info">
                        <p>1. 이메일 접수: volunteer@globalhealth.org</p>
                        <p>2. 접수 기간: 2024년 3월 26일 ~ 4월 15일</p>
                        <p>3. 제출 서류: 지원서, 이력서, 자기소개서</p>
                    </div>
                </div>

                <div class="notice-footer">
                    <p>많은 관심과 참여 부탁드립니다.</p>
                    <p>문의: volunteer@globalhealth.org</p>
                </div>
            </div>'
    ],
    '1689' => [
        'title' => '[안내] 2024년 기부금 구입 안내',
        'category' => '일반',
        'author' => '기부팀',
        'date' => '2024-03-25',
        'views' => '78',
        'content' => '
            <div class="notice-content">
                <div class="notice-header">
                    <h3>2024년 기부금 구입 안내</h3>
                    <p>글로벌헬스파트너스와 함께 전 세계 의료 취약계층을 돕는 기부에 참여해주세요.</p>
                </div>

                <div class="notice-section">
                    <h4>기부금 종류</h4>
                    <div class="donation-grid">
                        <div class="donation-item">
                            <h5>정기 기부금</h5>
                            <ul>
                                <li>매월 자동 이체</li>
                                <li>월 1만원부터 가능</li>
                                <li>언제든지 해지 가능</li>
                            </ul>
                        </div>
                        <div class="donation-item">
                            <h5>일시 기부금</h5>
                            <ul>
                                <li>원하는 금액 기부</li>
                                <li>신용카드/계좌이체</li>
                                <li>기업 매칭 기부</li>
                            </ul>
                        </div>
                        <div class="donation-item">
                            <h5>기업 기부금</h5>
                            <ul>
                                <li>법인 기부금</li>
                                <li>기업 매칭 기부</li>
                                <li>기업 CSR 프로그램</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>기부금 사용 계획</h4>
                    <div class="usage-grid">
                        <div class="usage-item">
                            <h5>해외 의료 지원</h5>
                            <ul>
                                <li>의료장비 구매 및 지원</li>
                                <li>의료진 교육 프로그램</li>
                                <li>보건소 시설 개선</li>
                            </ul>
                        </div>
                        <div class="usage-item">
                            <h5>국내 의료 봉사</h5>
                            <ul>
                                <li>의료 취약계층 지원</li>
                                <li>지역사회 보건 프로그램</li>
                                <li>의료진 파견 활동</li>
                            </ul>
                        </div>
                        <div class="usage-item">
                            <h5>교육 및 훈련</h5>
                            <ul>
                                <li>의료진 역량강화</li>
                                <li>보건교육 프로그램</li>
                                <li>글로벌 헬스케어 전문가 양성</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>기부 방법</h4>
                    <div class="donation-methods">
                        <div class="method-item">
                            <h5>온라인 기부</h5>
                            <p>www.globalhealth.org/donate</p>
                        </div>
                        <div class="method-item">
                            <h5>계좌이체</h5>
                            <p>국민은행 123-45-6789012</p>
                        </div>
                        <div class="method-item">
                            <h5>기업 기부</h5>
                            <p>기업 기부 전용 계좌: 123-45-6789013</p>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>기부금 영수증</h4>
                    <div class="receipt-info">
                        <p>1. 발급 시기: 매월 말일</p>
                        <p>2. 발급 방법: 이메일 발송</p>
                        <p>3. 세액공제: 연말정산 시 적용</p>
                    </div>
                </div>

                <div class="notice-footer">
                    <p>많은 관심과 참여 부탁드립니다.</p>
                    <p>문의: donate@globalhealth.org</p>
                </div>
            </div>'
    ],
    '1688' => [
        'title' => '[안내] 2024년 정기총회 개최 안내',
        'category' => '일반',
        'author' => '총무팀',
        'date' => '2024-03-24',
        'views' => '92',
        'content' => '
            <div class="notice-content">
                <div class="notice-header">
                    <h3>2024년 정기총회 개최 안내</h3>
                    <p>글로벌헬스파트너스 2024년 정기총회를 다음과 같이 개최합니다.</p>
                </div>

                <div class="notice-section">
                    <h4>회의 개요</h4>
                    <div class="meeting-info">
                        <div class="info-item">
                            <h5>일시</h5>
                            <p>2024년 4월 15일(월) 14:00 ~ 16:00</p>
                        </div>
                        <div class="info-item">
                            <h5>장소</h5>
                            <p>글로벌헬스파트너스 본사 대회의실</p>
                        </div>
                        <div class="info-item">
                            <h5>참석 대상</h5>
                            <ul>
                                <li>이사진</li>
                                <li>감사</li>
                                <li>주요 기부자</li>
                                <li>직원 대표</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>주요 안건</h4>
                    <div class="agenda-grid">
                        <div class="agenda-item">
                            <h5>2023년 사업 보고</h5>
                            <ul>
                                <li>해외 의료 지원 사업</li>
                                <li>국내 의료 봉사 활동</li>
                                <li>교육 및 훈련 프로그램</li>
                                <li>기부금 모금 현황</li>
                            </ul>
                        </div>
                        <div class="agenda-item">
                            <h5>2024년 사업 계획</h5>
                            <ul>
                                <li>신규 사업 계획</li>
                                <li>기존 사업 확대</li>
                                <li>파트너십 계획</li>
                                <li>재정 계획</li>
                            </ul>
                        </div>
                        <div class="agenda-item">
                            <h5>재정 관련</h5>
                            <ul>
                                <li>2023년 결산 승인</li>
                                <li>2024년 예산 승인</li>
                                <li>기부금 사용 계획</li>
                                <li>투자 계획</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>참석 방법</h4>
                    <div class="attendance-info">
                        <div class="method-item">
                            <h5>현장 참석</h5>
                            <p>본사 대회의실에서 직접 참석</p>
                        </div>
                        <div class="method-item">
                            <h5>온라인 참석</h5>
                            <p>Zoom 회의실 접속</p>
                            <p>회의실 ID: 123-456-789</p>
                        </div>
                    </div>
                </div>

                <div class="notice-section">
                    <h4>참석 신청</h4>
                    <div class="registration-info">
                        <p>1. 신청 기간: 2024년 3월 24일 ~ 4월 10일</p>
                        <p>2. 신청 방법: 이메일 접수 (meeting@globalhealth.org)</p>
                        <p>3. 제출 서류: 참석 신청서</p>
                    </div>
                </div>

                <div class="notice-footer">
                    <p>많은 참석 부탁드립니다.</p>
                    <p>문의: meeting@globalhealth.org</p>
                </div>
            </div>'
    ]
];

// Get notice content or show error
$notice = isset($notices[$sno]) ? $notices[$sno] : null;
?>

<div id="news" class="wrap">
    <script>
    $(function(){
        var navPageTitle = $(".depth2 .active").text();
        $(".subTop #lnb > a").append(navPageTitle);
        $(document).on("click", "#lnb > a", function(e){
            e.preventDefault();
            $("#lnb > div").slideToggle(100);
        });
    });
    $(window).on("load resize", function() {
        var wid_w = $(window).width();
        if(wid_w > 1279){
            $("#lnb > div").removeAttr("style");
        }
    });
    </script>
    <div class="subTop">
        <div class="pageGroup">
            <h2>공지/뉴스</h2>
        </div>
        <div id="lnb">
            <a href="/web_basic/board/list.php?pagen=285">전체</a>
            <div class="depth2">
                <ul>
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=0" id="depthname">전체</a></li>
                    <!-- <li class="active"><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=12" id="depthname">일반</a></li>
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=13" id="depthname">채용</a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <section id="container" class="news group_num_217">
        <div class="contents page_286">
            <div class="contenstView">
                <div class="boardWrap">
                    <?php if ($notice): ?>
                    <div class="boardView">
                        <div class="viewTop">
                            <h3><?php echo $notice['title']; ?></h3>
                            <div class="viewInfo">
                                <dl>
                                    <dt>작성자</dt>
                                    <dd><?php echo $notice['author']; ?></dd>
                                    <dt>작성일</dt>
                                    <dd><?php echo $notice['date']; ?></dd>
                                    <dt>조회수</dt>
                                    <dd><?php echo $notice['views']; ?></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="viewContent">
                            <?php echo $notice['content']; ?>
                        </div>
                        <div class="viewBottom">
                            <div class="btnWrap">
                                <a href="/web_basic/board/list.php?pagen=285" class="btnList">목록</a>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="error-message">
                        <p>요청하신 게시물을 찾을 수 없습니다.</p>
                        <div class="btnWrap">
                            <a href="/web_basic/board/list.php?pagen=285" class="btnList">목록</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.notice-content {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.notice-header {
    text-align: center;
    margin-bottom: 40px;
}

.notice-header h3 {
    color: #333;
    margin-bottom: 15px;
}

.notice-section {
    margin-bottom: 40px;
}

.notice-section h4 {
    color: #2c5282;
    border-bottom: 2px solid #2c5282;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.feature-grid, .achievement-grid, .recruitment-grid, .volunteer-grid, 
.donation-grid, .usage-grid, .agenda-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.feature-item, .achievement-item, .recruitment-item, .volunteer-item,
.donation-item, .usage-item, .agenda-item {
    background: #f8fafc;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.feature-item h5, .achievement-item h5, .recruitment-item h5,
.volunteer-item h5, .donation-item h5, .usage-item h5, .agenda-item h5 {
    color: #2c5282;
    margin-bottom: 15px;
}

.feature-list, .qualification-list {
    background: #f8fafc;
    padding: 20px;
    border-radius: 8px;
}

.feature-list li, .qualification-list li {
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
}

.feature-list li:before, .qualification-list li:before {
    content: "•";
    color: #2c5282;
    position: absolute;
    left: 0;
}

.activity-info, .meeting-info, .application-info, .donation-methods,
.receipt-info, .registration-info {
    background: #f8fafc;
    padding: 20px;
    border-radius: 8px;
}

.info-item, .method-item {
    margin-bottom: 20px;
}

.info-item h5, .method-item h5 {
    color: #2c5282;
    margin-bottom: 10px;
}

.notice-footer {
    text-align: center;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #e2e8f0;
}

.error-message {
    text-align: center;
    padding: 40px;
    background: #f8fafc;
    border-radius: 8px;
}

.error-message p {
    color: #e53e3e;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .feature-grid, .achievement-grid, .recruitment-grid, .volunteer-grid,
    .donation-grid, .usage-grid, .agenda-grid {
        grid-template-columns: 1fr;
    }
}

/* New styles for viewTop section */
.viewTop {
    background: #f8fafc;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 40px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.viewTop h3 {
    font-size: 28px;
    color: #2c5282;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e2e8f0;
}

.viewInfo {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 30px;
    color: #718096;
    font-size: 14px;
}

.viewInfo dl {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
}

.viewInfo dt {
    color: #a0aec0;
    font-weight: 500;
}

.viewInfo dd {
    margin: 0;
    font-weight: 500;
}
</style>

<?php include "../include/footer.php"; ?> 