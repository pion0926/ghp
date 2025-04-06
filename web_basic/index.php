<?php include "include/header.php"; ?>

<section id="container" class="main">
    <div class="contents">
        <div class="contentsView">
            <!-- Main Banner Section -->
            <div class="mainBanner">
                <div class="contents">
                    <div class="mainBannerBox">
                        <div class="mainBannerCont">
                            <img src="/web_basic/program/file/bg.jpg" alt="Main banner background" />
                        </div>
                    </div>
                    <div class="banner-controls">
                        <button class="slick-arrow slick-prev" aria-label="Previous" type="button">
                            <img src="/web_basic/img/main/visual_banner_prev.png" alt="Previous" />
                        </button>
                        <button class="slick-arrow slick-next" aria-label="Next" type="button">
                            <img src="/web_basic/img/main/visual_banner_next.png" alt="Next" />
                        </button>
                    </div>
                </div>
            </div>

            <!-- Report Section -->
            <div class="reportCont">
                <div class="contents">
                    <div class="report-wrapper">
                        <div class="textCont">
                            <div class="report-header">
                                <h2 class="report-title">투명한 재정 관리</h2>
                                <p class="report-subtitle">여러분의 소중한 후원금은 투명하게 관리됩니다.</p>
                            </div>
                            <div class="report-description">
                                <p>글로벌헬스파트너스는 건강한 단체입니다.</p>
                                <p>모든 수입과 지출을 투명하게 관리하며,<br/>활동 목적에 따라 꼭 필요한 곳에 효율적으로 재정을 사용하고 있습니다.</p>
                            </div>
                            <div class="report-links">
                                <a href="/web_basic/introduce/introduce.php?pagen=448" class="report-link">
                                    <span class="link-text">재정보고</span>
                                    <span class="link-icon">
                                        <img src="/web_basic/img/main/report_view.gif" alt="바로가기" />
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="graphCont">
                            <div class="graph-wrapper">
                                <div class="imgBox">
                                    <img src="/web_basic/img/main/이미지준비중.gif" alt="83% (2020사업수행비)" />
                                </div>
                                <div class="graph-text">
                                    <p class="highlight">글로벌헬스파트너스는</p>
                                    <p class="emphasis">후원금의 80% 이상을 사업비로 사용합니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include "include/footer.php"; ?>

<script>
    $(document).ready(function() {
        $("#emailSelect").change(function() {
            if ($("#emailSelect").val() === "") {
                $("#email_domain").focus();
                if ($("#email_domain").val() !== "") {
                    $("#email_domain").val("");
                }
            } else {
                $("#email_domain").val($("#emailSelect").val());
            }
        });
    });

    function newsApplywrite() {
        var f = document.newsApply;    
        f.mode.value = "insert";

        if (f.P_name.value === "") {
            alert("이름을 입력해 주시기 바랍니다.");
            f.P_name.focus();
            return false;
        }

        if (f.P_email.value === "") {
            alert("이메일주소를 입력해 주시기 바랍니다.");
            f.P_email.focus();
            return false;
        }

        if (f.P_email_domain.value === "") {
            alert("이메일주소를 입력해 주시기 바랍니다.");
            f.P_email_domain.focus();
            return false;
        }

        if (!$("#agree").is(":checked")) {
            alert("개인정보 수집 및 이용에 동의해 주시기 바랍니다.");
            $("#agree").focus();
            return false;
        }

        if (!confirm("뉴스레터를 신청 하시겠습니까?")) {
            return false;
        }
    }
</script> 