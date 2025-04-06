<?php include '../include/header.php'; ?>

<section id="container" class="introduce group_num_212">
    <div class="contents page_212">
        <div class="contenstView">
            <div class="location_cont">
                <div id="daumRoughmapContainer1643164635956" class="root_daum_roughmap root_daum_roughmap_landing" style="width:100%;">
                    <div class="wrap_map" style="height: 500px;">
                        <div class="map" style="overflow: hidden; background: url('https://t1.daumcdn.net/mapjsapi/images/2x/bg_tile.png');">
                            <!-- Kakao Map content will be loaded here -->
                        </div>
                    </div>
                </div>
                
                <!-- Kakao Map Scripts -->
                <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
                <script charset="UTF-8" src="https://t1.daumcdn.net/kakaomapweb/place/jscss/roughmap/07708ab0/roughmapLander.js"></script>
                <script charset="UTF-8">
                    new daum.roughmap.Lander({
                        "timestamp" : "1643164635956",
                        "key" : "28xcv",
                        "mapHeight" : "500"
                    }).render();
                </script>
            </div>
            
            <div class="locationInfo transportationBox">
                <h4 class="basicTitle">교통편 안내</h4>
                <ul class="transportationList">
                    <li>
                        <dl>
                            <dt><img src="/web_basic/img/introduce/subway_icon.png" alt="지하철"> 지하철 3호선</dt>
                            <dd>안국역 하차 4번 출구로 나온 뒤 뒤돌아서 창덕궁 방향으로 직진</dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt><img src="/web_basic/img/introduce/bus_icon.png" alt="버스"> 버스</dt>
                            <dd>109, 151, 162, 171, 172, 272, 601, 7025 창덕궁 버스정류소 하차(현대빌딩 계동사옥 맞은편)</dd>
                        </dl>
                    </li>
                </ul>
            </div>
            
            <div class="locationInfo contactBox">
                <h4 class="basicTitle">연락처</h4>
                <ul class="contactList">
                    <li><img src="/web_basic/img/introduce/pin_icon.png" alt="주소">주소 : <span>서울시 종로구 율곡로 84(운니동) 가든타워 803호 [03131]</span></li>
                    <li><img src="/web_basic/img/introduce/tel_icon.png" alt="전화">전화 : <span>02-747-7044</span></li>
                    <li><img src="/web_basic/img/introduce/pax_icon.png" alt="팩스">팩스 : <span>02-747-7046</span></li>
                    <li><img src="/web_basic/img/introduce/mail_icon.png" alt="이메일">이메일 : <span><a href="mailto:gbhealthpartners@gmail.com">gbhealthpartners@gmail.com</a></span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include '../include/footer.php'; ?>