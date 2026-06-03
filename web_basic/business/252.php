<section id="container" class="business group_num_213">
    <div class="contents page_252">
        <div class="contenstView">
            <div class="research">
                <h3 class="shotLine">의료지원</h3>
                <div class="basicText mainDesc">
                    글로벌헬스파트너스는 지구촌 곳곳의 의료 취약 지역을 대상으로 한 긴급 및 지속적인 의료지원을 제공합니다. 의료비 지원, 의료장비 및 의약품 지원, 보건의료 인력 파견 등을 통해 생명을 구하고 실질적인 건강 증진 효과를 만들어냅니다.
                </div>

                <div class="halfCont zigzagCont">
                    <div class="imgBox">
                        <img src="/web_basic/img/business/medical_support.jpg" alt="의료지원 - 현장 의료 지원 활동">
                    </div>
                    <dl>
                        <dt class="contTitle">긴급의료지원 (Emergency Medical Support)</dt>
                        <dd class="basicText">
                            자연재해, 전쟁, 질병 대유행 등으로 인한 의료 취약 상황에서 즉각적인 의료지원을 제공합니다. 의료진 파견, 의료장비 및 의약품 지원, 응급의료 서비스 제공 등을 통해 생명을 구하고 건강을 보호합니다.
                        </dd>
                    </dl>
                </div>

                <div class="halfCont zigzagCont">
                    <dl>
                        <dt class="contTitle">지속가능한 의료지원 (Sustainable Medical Support)</dt>
                        <dd class="basicText">
                            지역의 의료 인프라 구축과 의료진 역량 강화를 통해 지속가능한 의료서비스 제공을 지원합니다. 현지 의료진 교육, 의료시설 개선, 의료장비 지원 등을 통해 지역의 의료 자립성을 높입니다.
                        </dd>
                    </dl>
                    <div class="imgBox">
                        <img src="/web_basic/img/business/sustainable_medical.jpg" alt="지속가능한 의료지원 - 의료진 교육 현장">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.research {
    padding: 40px;
    background: #f8f9fa;
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
    height: auto !important;
}

.research h3 {
    font-size: 3.2rem;
    color: #00afb1;
    margin-bottom: 40px;
    text-align: center;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    padding-bottom: 20px;
    display: block !important;
}

.research .mainDesc {
    font-size: 1.8rem;
    line-height: 1.8;
    color: #444;
    text-align: center;
    max-width: 1000px;
    margin: 0 auto 60px;
    display: block !important;
}

.researchSection {
    margin-top: 50px;
    display: block !important;
}

.section {
    padding: 40px;
    background: #f8f9fa;
}

.halfCont {
    margin-bottom: 80px;
    padding: 40px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.halfCont .contTitle {
    font-size: 2.4rem;
    color: #00afb1;
    margin-bottom: 25px;
    font-weight: 600;
}

.halfCont dd {
    font-size: 1.7rem;
    line-height: 1.8;
    color: #444;
}

.zigzagCont {
    display: flex;
    align-items: center;
    gap: 60px;
}

.zigzagCont .imgBox,
.zigzagCont dl {
    flex: 1;
}

.zigzagCont .imgBox {
    width: 560px;
    height: 315px;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background: #fff;
    position: relative;
}

.zigzagCont .imgBox img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
    transform: translateZ(0);
    backface-visibility: hidden;
    filter: brightness(1.02) contrast(1.02);
}

.zigzagCont .imgBox:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 15px;
    box-shadow: inset 0 0 2px rgba(255, 255, 255, 0.1);
    z-index: 1;
    pointer-events: none;
}

.zigzagCont .imgBox img:hover {
    transform: scale(1.05);
    filter: brightness(1.05) contrast(1.05);
}
.basicText {
  word-break: keep-all;        /* 한글 단어 단위 줄바꿈 */
  white-space: normal;         /* 기본 줄바꿈 허용 */
  overflow-wrap: break-word;   /* 긴 단어(영어, URL 등)는 줄바꿈 허용 */
  line-height: 1.7;            /* 줄 간격 약간 넉넉하게 */
}
@media (max-width: 768px) {
    .section {
        padding: 20px;
    }

    .zigzagCont {
        flex-direction: column;
        gap: 30px;
    }

    .zigzagCont .imgBox {
        width: 100%;
        height: 250px;
    }

    .halfCont .contTitle {
        font-size: 2rem;
    }

    .halfCont dd {
        font-size: 1.6rem;
    }
}
</style>