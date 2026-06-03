<?php include '../include/header.php'; ?>
<style>
    .ambassadorRow {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: center;
    gap: 40px;
    margin-bottom: 60px;
    }

    .ambassadorItem.photo {
    flex: 0 0 50%;
    text-align: center;
    max-width: 300px;
    }

    .ambassadorItem.photo img {
        width: 200px;
        height: auto;
        border-radius: 6px;
        display: block;
        margin: 0 auto;
    }
    .ambassadorItem.photo .imgBox {
    text-align: center;
    }

    .ambassadorItem.photo .imgBox img {
    display: inline-block;  /* or block + margin: auto */
    }
    .ambassadorItem.text {
    flex: 0 0 50%;
    max-width: 600px;
    min-width: 0;
    }

    .ambassadorItem.text dt {
    text-align: left;
    font-size: 1.9rem;
    font-weight: 400;
    line-height: 1.6;
    word-break: keep-all;
    }

    .ambassadorItem.photo dl,
    .ambassadorItem.text dl {
        margin: 0;
    }

    .ambassadorItem.photo dt {
        font-weight: bold;
        font-size: 2.4rem;
        margin-top: 10px;
    }

    .chairmanLink {
        margin-top: 10px;
    }

    .chairmanLink a {
        display: inline-block;
        padding: 6px 12px;
        background-color: #00afb1;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
        font-size: 20px;
    }

    .chairmanLink a:hover {
        background-color: #009092;
    }

    @media screen and (max-width: 767px) {
    .ambassadorRow {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .ambassadorItem.text dt {
        text-align: left;
    }

    .ambassadorItem.photo,
    .ambassadorItem.text {
        max-width: 100%;
        flex: 1 1 100%;
    }
    }
</style>

<section id="container" class="introduce group_num_211">
    <div class="contents page_211">
        <div class="contenstView">
            <div class="section ambassadorsTop">
                <h3 class="sectionTitle">
                    <br /> 
                    글로벌헬스파트너스를 이끄는 리더쉽 <strong class="c_00afb1">'임원진'</strong>을 소개합니다
                </h3>

                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/사본 -정애숙.png" alt="정애숙" />
                        </p>
                        <dl>
                        <dt>정애숙 이사장</dt>
                        <dt>
                            <div class="chairmanLink">
                            <a href="/web_basic/introduce/introduce.php?section=introduce&pagen=207">이사장 인사말 보기</a>
                            </div>
                        </dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                            충북대병원 연구교수, 충북대학교 국제개발연구소 부소장을 역임하였습니다.
                            국군간호사관학교에서 간호학을 전공한 후, 연세대학교에서 보건행정학 석·박사 학위를 취득하였으며,
                            스웨덴 Karolinska Institutet에서 Safety Promotion을 연구하였습니다. 국회 정책보좌관,
                            한국보건사회연구원 연구개발팀장, KOICA 프로젝트 현지책임자 등의 경험을 바탕으로 국제보건 및 개발협력
                            사업을 주도해 왔습니다. 특히, 응급의료체계 역량 강화, 모자보건 환경 개선, 보건의료 성과관리(M&E) 등
                            다수의 글로벌 프로젝트를 기획·운영하며, 국제 보건 분야에서 실질적인 변화를 이끌어왔습니다.
                            현재 국내외 보건의료 및 국제개발협력 사업을 총괄하며, 정책 자문과 교육을 통해 차세대 글로벌 헬스 리더를
                            양성하는 데 주력하고 있습니다.
                        </dt>
                        </dl>
                    </div>
                </div>

                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/박민규.png" alt="박민규" />
                        </p>
                        <dl>
                        <dt>박민규 이사</dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                            충북대학교 의과대학 교수로 국군의학연구소, 서울대학교 임상약리학과 연수의, 건국대학교병원 및 동아대학교 의과대학에서 임상약리학 교수로 활동하였으며, 충북대학교병원 임상시험센터 부센터장과 청주오송첨단임상시험센터 센터장을 역임하였습니다. 또한, 벤처기업 대표이사로서 혁신적인 의료 연구와 임상시험 분야에서 다양한 경험을 쌓아왔습니다.
                        </dt>
                        </dl>
                    </div>
                </div>
                
                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/송제민.png" alt="송제민" />
                        </p>
                        <dl>
                        <dt>송제민 이사</dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                            ICT 전문가로, ㈜터보소프트의 대표이사이자 ㈜코쿤의 기술이사로 활동하고 있습니다. 청주대학교에서 컴퓨터정보공학을 전공하고, 충북대학교에서 바이오인포매틱스 및 멀티미디어공학 박사 학위를 취득하였습니다. 현재 KOICA IBS 사업을 포함한 다양한 국제 개발협력 프로젝트에 참여하며, ICT 기반 헬스케어 솔루션 개발과 스마트 기술을 활용한 보건·의료 시스템 혁신을 주도하고 있습니다. R&D 총괄을 담당하며 기술 개발 및 글로벌 협력 사업을 추진하고 있습니다.                        </dt>
                        </dl>
                    </div>
                </div>
                
                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/은승표.png" alt="은승표" />
                        </p>
                        <dl>
                        <dt>은승표 이사</dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                            스포츠의학 전문의로 가톨릭의과대학 정형외과 교수와 미국 버몬트 주립대 스포츠의학과 연구교수를 역임하였으며, 대한정형외과 스포츠의학회 이사, 대한태권도협회 의무이사, 대한스키지도자연맹 의과학위원장 등 다양한 학회에서 활동하고 있습니다. 또한, 2018 평창동계올림픽 정선알파인센터 의무책임자를 맡아 스포츠 의학 분야에 기여하였습니다. 현재 코리아정형외과 원장으로서 무릎 및 스포츠 손상 치료와 재활에 주력하고 있습니다.                        
                        </dl>
                    </div>
                </div>

                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/이유정.png" alt="이유정" />
                        </p>
                        <dl>
                        <dt>이유정 이사</dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                        경희대학교 간호과학대학의 학술연구교수로 활동하였습니다. 국군간호사관학교에서 간호학을 전공하고, 연세대학교에서 간호학 석·박사 학위를 취득하였습니다. 국군통합병원과 국군간호사관학교에서 간호 실무 및 교육을 담당했으며, 한국금연운동협의회 기획실장, 대구보건대학교 부교수 등을 역임하며 국민 건강증진 및 금연 교육에 기여하였습니다. 국제개발협력 및 보건 교육 프로젝트를 수행하며 연구와 교육을 병행하고 있으며, 특히 금연정책, 보건교육 및 국제보건 분야에서 활발한 연구를 진행하고 있습니다.                        
                        </dl>
                    </div>
                </div>

                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/정유미.png" alt="정유미" />
                        </p>
                        <dl>
                        <dt>정유미 이사</dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                        국군간호사관학교를 졸업하고 서울대학교 간호대학원에서 간호학 석ㆍ박사학위를 취득하였습니다. 국군간호사관학교 교수로 재직하며 군건강정책연구소장, 교무처장, 임상간호학처장 등을 역임하였습니다. 2005년부터 지금까지 ‘구급간호교육(국군간호사관학교)’, ‘재난간호교육과정(국군간호사관학교’), ‘에볼라해외긴급구호팀 교육(보건복지부 등)’, ‘해외긴급구호팀 심화교육과정(한국국제보건의료재단)’ 등 재난교육 전문가로 활동하고 있습니다. 2020년부터 약 3년간 ‘XR 기반 중증외상처치훈련 프로그램’ 개발(과학기술정보통신부, 국방부)과 교육에 참여하였습니다. 한국재난간호사회 이사, 한국간호행정학회 이사를 역임하였고, 2025년 현재 한국통일평화간호학회 이사, 군디지털의료정책학회 이사 등으로 활동하고 있습니다. 
                        </dl>
                    </div>
                </div>

                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/공기서.jpg" alt="공기서" />
                        </p>
                        <dl>
                        <dt>공기서 감사</dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                        충북대학교에서 경제학 박사 학위를 취득한 경제학자로, 현재 충북대학교 강사이자 국제개발연구소 부소장으로 재직 중입니다. 과거 고려대학교 세종캠퍼스 강사와 미국 메릴랜드 대학교(College Park) 방문학자를 역임하였으며, 굿네이버스와 KOICA 등과 협력하여 키르기즈공화국, 베트남 등지에서 농촌개발 및 포용적 농촌개발 프로그램의 성과관리와 사업기획관리(PM) 업무를 수행하였습니다.                        
                        </dl>
                    </div>
                </div>

                <div class="ambassadorRow">
                    <div class="ambassadorItem photo">
                        <p class="imgBox">
                        <img src="/web_basic/img/introduce/김신표.png" alt="김신표" />
                        </p>
                        <dl>
                        <dt>김신표 감사</dt>
                        </dl>
                    </div>
                    <div class="ambassadorItem text">
                        <dl>
                        <dt>
                        ㈜한국경제예측연구소 대표이사이며, 계명대학교 경제학 박사와 국민대학교 e-비즈니스 경영정보학 박사 학위를 취득하였습니다. 홍익대학교 연구교수, 금오공과대학교 초빙교수를 역임하였으며, KOICA 등 국제개발협력 사업에서 네팔, 방글라데시, 탄자니아 등의 보건의료 프로젝트 경제성 분석을 담당하고 있습니다.                        </dl>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
