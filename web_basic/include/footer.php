<footer id="footer">
    <div class="contents">
        <div class="addrWrap">
            <ul class="addrNavList">
                <li><a href="/web_basic/etc/etc.php?pagen=376">사이트맵</a></li>
                <li><a href="/web_basic/etc/etc.php?pagen=377">이용약관</a></li>
                <li><a href="/web_basic/etc/etc.php?pagen=378">개인정보처리방침</a></li>
                <li>
                    <a href="https://www.instagram.com/gbhealthpartners/" target="_blank" style="display:inline-flex; align-items:center;">
                        <img src="/web_basic/img/common/Instagram_logo_2016.svg.png" alt="Instagram" style="width:30px; height:30px; margin-left:8px;">
                    </a>
                </li>
            </ul>

            <div class="addrCont">
                <p class="addrBasicText">글로벌헬스파트너스는 지구촌 누구도 소외되지 않는 건강한 삶을 지원하는 비영리 조직입니다.</p>
                <p>후원계좌: 기업은행 695-031670-04-016(예금주: 글로벌헬스파트너스)</p>
                <p>단체명: 글로벌헬스파트너스 l 고유번호증: 621-82-93641 l 대표자: 정애숙</p>
                <p class="addrDetail">(우)28114 충북 청주시 흥덕구 옥산면 덕촌삼성골길 14 l 대표전화: (070)8019-3087</p>
                <p class="addrDetail">팩스:(0504)369-9380 l 이메일: gbhealthpartners@gmail.com</p>
            </div>

            <div class="partnerList">
                <p class="partnerText">글로벌헬스파트너스의 소중한 협력 기관</p>
                <div class="logo-carousel-wrapper">
                    <div class="logo-carousel">
                        <?php
                        $logos = [
                            "국세청.png" => "https://www.nts.go.kr/",
                            "보건복지부.png" => "https://www.mohw.go.kr",
                            "koica.png" => "https://www.koica.go.kr/",
                            "kofi.png" => "https://www.kofih.org/",
                            "충청북도.png" => "https://www.chungbuk.go.kr/",
                            "충북시민사회지원센터.png" => "http://www.cbngo.org/main.php",
                            "충북대학교.png" => "https://www.chungbuk.ac.kr/",
                            "청주시자원봉사센터2.png" => "https://cj1365.or.kr/",
                        ];
                        // Duplicate logos for seamless carousel
                        for ($i = 0; $i < 2; $i++) {
                            foreach ($logos as $file => $link) {
                                echo "<a href=\"$link\" target=\"_blank\"><img src=\"/web_basic/img/common/$file\" alt=\"$file\"></a>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="footerBottom">
                <p class="copy">Copyright © 글로벌헬스파트너스 All Rights Reserved.</p>
                <p class="footerLogo"><img src="/web_basic/img/common/footer_GHP_영문로고.png" alt="글로벌헬스파트너스 로고"></p>
            </div>

        </div>
    </div>
</footer>

<!-- Naver Analytics -->
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
<script>
    if (!wcs_add) var wcs_add = {};
    wcs_add["wa"] = "220562289d0c68";
    if (window.wcs) wcs_do();

    const logos = document.querySelectorAll('.logo-carousel a');
    const totalLogos = logos.length;
    const visibleLogos = 6;
    let currentIndex = 0;

    function updateLogos() {
        currentIndex = (currentIndex + 1) % totalLogos;
        const offset = -currentIndex * (100 / visibleLogos);
        document.querySelector('.logo-carousel').style.transform = `translateX(${offset}%)`;
    }

    setInterval(updateLogos, 3000);
</script>
