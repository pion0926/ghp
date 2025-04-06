<section id="container" class="business group_num_213">
    <div class="contents page_250">
        <div class="contenstView">
            <div class="humanResource">
                <h3 class="shotLine">인재양성 (Human Resources Development)</h3>
                <div class="basicText mainDesc">
                    글로벌 헬스 분야의 미래를 이끌어갈 인재를 발굴하고 양성합니다. 교육훈련, 워크숍, 멘토링 프로그램을 통해 실무 중심의 전문 역량을 개발하며, 청년 및 전문가들이 국제 보건 현장에서 활약할 수 있도록 지원합니다.
                </div>

                <div class="programSection">
                    <div class="halfCont zigzagCont">
                        <div class="imgBox">
                            <img src="/web_basic/img/business/global_health_specialist.jpg" alt="국제보건전문가 과정 교육 현장">
                        </div>
                        <dl>
                            <dt class="contTitle">국제보건전문가 과정 (Global Health Specialist Program)</dt>
                            <dd class="basicText">
                                국제개발 및 보건의료 분야에 관심 있는 대학생, 대학원생, 실무자를 대상으로 국제보건의 이론과 실제를 아우르는 교육과정을 제공합니다. 감염병 대응, 보건 시스템, 국제보건정책 등 다양한 주제에 대한 강의와 실습, 케이스스터디가 포함됩니다.
                            </dd>
                        </dl>
                    </div>

                    <div class="halfCont zigzagCont">
                        <dl>
                            <dt class="contTitle">스포츠보건 전문가 과정 (Sports Health Specialist Program)</dt>
                            <dd class="basicText">
                                스포츠 활동 중 발생할 수 있는 부상 예방, 응급 대응, 전반적인 건강 증진을 위한 전문 인력 양성에 초점을 둔 교육과정입니다. 체육인, 트레이너, 보건의료 종사자 등을 대상으로 스포츠 현장의 안전관리, 건강교육, 스포츠를 통한 지역사회 건강 증진 전략 등을 실무 중심으로 교육합니다.
                                <p class="mt20">이 과정을 통해 스포츠와 보건의 융합적 접근이 가능한 전문 인력을 양성하여, 지역 및 국제개발 현장에서의 건강한 스포츠 환경 조성에 기여합니다.</p>
                            </dd>
                        </dl>
                        <div class="imgBox">
                            <img src="/web_basic/img/business/sports_health_specialist.jpg" alt="스포츠보건 전문가 과정 실습 현장">
                        </div>
                    </div>

                    <div class="halfCont zigzagCont">
                        <div class="imgBox">
                            <img src="/web_basic/img/business/next_gen_leaders.jpg" alt="차세대 글로벌 리더 양성 프로그램 활동">
                        </div>
                        <dl>
                            <dt class="contTitle">차세대 글로벌 리더 양성 (Next-Generation Global Health Leaders Program)</dt>
                            <dd class="basicText">
                                글로벌 보건에 관심 있는 청소년 및 청년들을 대상으로 리더십 훈련, 글로벌 이슈 탐구, 프로젝트 기획 등의 프로그램을 제공합니다. 국내외 멘토링, 팀 프로젝트, 해외 현장활동 참여 등을 통해 차세대 리더로서의 비전과 실천 역량을 키울 수 있도록 지원합니다.
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.humanResource {
    padding: 40px;
    background: #f8f9fa;
}

.humanResource h3 {
    font-size: 3.2rem;
    color: #00afb1;
    margin-bottom: 40px;
    text-align: center;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    padding-bottom: 20px;
}

.humanResource h3:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: #00afb1;
    border-radius: 2px;
}

.humanResource .mainDesc {
    font-size: 1.8rem;
    line-height: 1.8;
    color: #444;
    text-align: center;
    max-width: 1000px;
    margin: 0 auto 60px;
}

.programSection {
    margin-top: 50px;
}

.halfCont {
    margin-bottom: 80px;
    padding: 40px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.halfCont:nth-child(odd) {
    background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
}

.halfCont:nth-child(even) {
    background: linear-gradient(135deg, #ffffff 0%, #fff0f7 100%);
}

.halfCont .contTitle {
    font-size: 2.4rem;
    color: #00afb1;
    margin-bottom: 25px;
    font-weight: 600;
}

.halfCont .basicText {
    font-size: 1.7rem;
    line-height: 1.8;
    color: #444;
}

.halfCont .mt20 {
    margin-top: 20px;
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
    image-rendering: -webkit-optimize-contrast;  /* Chrome용 이미지 선명도 개선 */
    image-rendering: crisp-edges;  /* Firefox용 이미지 선명도 개선 */
    transform: translateZ(0);  /* GPU 가속 활성화 */
    backface-visibility: hidden;  /* 렌더링 성능 향상 */
    filter: brightness(1.02) contrast(1.02);  /* 약간의 밝기와 대비 증가 */
}

.zigzagCont .imgBox:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 15px;
    box-shadow: inset 0 0 2px rgba(255, 255, 255, 0.1);  /* 내부 테두리 효과 */
    z-index: 1;
    pointer-events: none;
}

.zigzagCont .imgBox img:hover {
    transform: scale(1.05);
    filter: brightness(1.05) contrast(1.05);
}

@media (max-width: 768px) {
    .humanResource {
        padding: 20px;
    }

    .humanResource h3 {
        font-size: 2.8rem;
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

    .halfCont .basicText {
        font-size: 1.6rem;
    }
}
</style>
