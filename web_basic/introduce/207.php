<?php include '../include/header.php'; ?>
<style>
    .greetingCont {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
        padding: 40px 20px;
        position: relative;
    }
    .greetingCont .imgBox {
        max-width: 280px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        overflow: hidden;
    }
    .greetingCont .imgBox img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        display: block;
        position: relative;
    }
    .greetingCont .imgBox::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: inherit;
        filter: blur(10px);
        z-index: -1;
        transform: scale(1.1);
    }
    .greetingText {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        font-family: 'Roboto', sans-serif;
    }
    .greetingTop {
        text-align: center;
        margin-bottom: 30px;
    }
    .greetingTop dt {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }
    .greetingTop dd {
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
        text-align: justify;
    }
    .greetingWriting {
        background: #f8f8f8;
        padding: 30px;
        border-radius: 8px;
    }
    .greetingWriting ul li {
        margin-bottom: 20px;
    }
    .greetingWriting ul li dt {
        font-weight: bold;
        color: #00afb1;
        margin-bottom: 10px;
    }
    .greetingWriting ul li dd {
        color: #666;
        line-height: 1.6;
        text-align: justify;
    }
    .basicText {
        margin: 30px 0;
        text-align: center;
        color: #333;
        line-height: 1.8;
    }
    .greetingWriter {
        text-align: right;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }
    .greetingWriter img {
        margin-left: 10px;
        vertical-align: middle;
        width: 100px;
        height: auto;
    }
    /* Unified point color class */
    .point-color {
        color: #00afb1;
        font-weight: bold;  /* or 700 */
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<section id="container" class="introduce group_num_207">
    <div class="contents page_207">
        <div class="contenstView">
            <div class="greetingCont">
                <p class="imgBox"><img src="/web_basic/img/introduce/greeting.jpg" alt="글로벌헬스파트너스 이사장 정애숙"></p>
                <div class="greetingText">
                    <dl class="greetingTop"> 
                        <dt style="text-align: center;">안녕하세요. 글로벌헬스파트너스 이사장 정애숙입니다.</dt>

                        <dd>글로벌헬스파트너스를 찾아주시고, 관심 가져주신 모든 분들께 진심으로 감사드립니다. <br>여러분 한 분 한 분의 따뜻한 마음이 저희의 여정에 큰 힘이 됩니다.</dd>
                        <dd style="line-height: 1.8;">저희는 <span class="point-color">"더 나은 건강(Better Health), 더 나은 내일(Better Tomorrow)"</span>이라는 비전을 품고, <br>지구촌 어느 누구도 건강으로부터 소외되지 않는 세상을 만들기 위해 오늘도 묵묵히 걸어가고 있습니다.</dd>
                        <dd style="line-height: 1.8;">건강은 모두가 동등하게 누려야 할 인간의 기본권이며, 이를 함께 나눌 때 변화는 더욱 깊고 넓게 퍼져간다고 믿습니다.</dd>
                        <dd style="line-height: 1.8;">글로벌헬스파트너스는 국내외 보건 문제 해결을 위한 실천적 연구, 전문 인재 양성, 그리고 의료 취약 지역을 위한 국제협력 활동을 통해 보다 <span class="point-color">지속가능하고 건강한 미래</span>를 만들어가고자 합니다.</dd>
                        <dd style="line-height: 1.8;">우리는 정부, NGO, 국제기구, 지역사회 등 뜻을 함께하는 다양한 파트너들과 협력하여, 교육과 캠페인, 봉사와 프로젝트를 통해 건강의 가치를 전 세계로 확산시키고자 합니다. </dd>
                        <dd style="line-height: 1.8;">이 길은 혼자서는 결코 걸어갈 수 없는 여정입니다. <br>여러분의 따뜻한 관심과 연대, 그리고 실천이 모일 때, <br>우리는 더 많은 이들에게 희망과 회복, 그리고 건강한 삶을 선물할 수 있습니다.</dd>
                        <dd style="line-height: 1.8;">글로벌헬스파트너스는 인간에 대한 존중과 지구 공동체에 대한 책임을 바탕으로 <br>더 나은 내일을 향한 걸음을 멈추지 않겠습니다.</dd>
                        <dd style="line-height: 1.8;">건강이 특별한 누군가의 특권이 아니라 <span class="point-color">모두의 당연한 권리</span>가 되는 그날까지, <br>여러분과 함께 걷겠습니다.<br>감사합니다.</dd>


                        <dd class="greetingWriter" style="text-align: right; margin-top: 20px; display: flex; align-items: center; justify-content: flex-end;">
                            글로벌헬스파트너스 이사장
                            <img 
                                src="/web_basic/img/introduce/greeting_writer.jpg" 
                                alt="정애숙"
                                style="margin-left: 8px; height: 60px; width: auto; display: block;"
                            >
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
