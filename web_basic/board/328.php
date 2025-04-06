<?php include "../include/header.php"; ?>

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
                    <li class="active"><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=0" id="depthname">전체</a></li>
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=12" id="depthname">일반</a></li>
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=13" id="depthname">채용</a></li>
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=14" id="depthname">행사</a></li>
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=15" id="depthname">언론보도</a></li>
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=16" id="depthname">지구촌 SNS</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section id="container" class="news group_num_313">
        <div class="contents page_328">
            <div class="contenstView">
                <div class="boardWrap">
                    <div class="boardGalleryType2 mt_50">
                        <ul>
                            <li>
                                <p class="imgBox">
                                    <a href="javascript:;">
                                        <img src="/web_basic/program/report/imageview.php?pagen=330&amp;ftype=10&amp;fchecksum=9e809dc900fceb57f60597f9a0877d7fcd58656ae2c8ad38c663d34db097f314" alt="이미지">
                                    </a>
                                </p>
                                <p class="titleBox">2023 글로벌헬스파트너스 연차보고서</p>
                                <p class="btnBox">
                                    <a href="/file/11/3343fc9699dcc66cfbd6dc0c13a70e05d3c9d88b295f781472fe769f2f2919ce" target="_blank">
                                        자세히 보기
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="imgBox">
                                    <a href="javascript:;">
                                        <img src="/web_basic/program/report/imageview.php?pagen=330&amp;ftype=10&amp;fchecksum=a02d07ed1f193985f7d8c0b985c8cf9036e6b1c5206c5c0b38d660889d914ce9" alt="이미지">
                                    </a>
                                </p>
                                <p class="titleBox">2022 글로벌헬스파트너스 연차보고서</p>
                                <p class="btnBox">
                                    <a href="/file/11/19c78293d2ec4824594ee280a0bfd4f805c45b6f95340189a8d7828c1e038b60" target="_blank">
                                        자세히 보기
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="imgBox">
                                    <a href="javascript:;">
                                        <img src="/web_basic/program/report/imageview.php?pagen=330&amp;ftype=10&amp;fchecksum=75c0229f63c36d4d3b6fa06bc33538c827ae0da0483ac0a4f29c4f5385064d78" alt="이미지">
                                    </a>
                                </p>
                                <p class="titleBox">2021 글로벌헬스파트너스 연차보고서</p>
                                <p class="btnBox">
                                    <a href="/file/11/9ff8b7d7be7a7b6877e8586f156e79657655f468f8ed6d0a19f877f36bacd594" target="_blank">
                                        자세히 보기
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="imgBox">
                                    <a href="javascript:;">
                                        <img src="/web_basic/program/report/imageview.php?pagen=330&amp;ftype=10&amp;fchecksum=c2ac0c159e0e0ad49cd9790073b946e66cb99d48ba810a0fc8a33900679f802e" alt="이미지">
                                    </a>
                                </p>
                                <p class="titleBox">2020 글로벌헬스파트너스 연차보고서</p>
                                <p class="btnBox">
                                    <a href="/file/11/4d9e442ab97f310ee2bebb241e3bb33d1123e272348f79e875cfba56fd5082f9" target="_blank">
                                        자세히 보기
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="imgBox">
                                    <a href="javascript:;">
                                        <img src="/web_basic/program/report/imageview.php?pagen=330&amp;ftype=10&amp;fchecksum=01832eef647d14d95707f702259f5453c4737ee964315b4483477ecd8ac63d8c" alt="이미지">
                                    </a>
                                </p>
                                <p class="titleBox">2019 글로벌헬스파트너스 연차보고서</p>
                                <p class="btnBox">
                                    <a href="/file/11/669455a88568eb95d713ec5e0ab86f6c635e320c2bcb46e57d736eca14c6fa48" target="_blank">
                                        자세히 보기
                                    </a>
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="pageNumWrap">
                        <div class="pageNum">
                            <ol>
                                <li class="active"><a href="javascript:;">1</a></li>
                                <li><a href="javascript:PostPaging(2);">2</a></li>
                                <li><a href="javascript:PostPaging(3);">3</a></li>
                                <li class="nextArrow"><a href="javascript:PostPaging(2);"><img src="/web_basic/img/board/page_arrow_next.png" alt="다음"></a></li>
                            </ol>
                            <form name="PostPagingForm" id="PostPagingForm" action="" method="POST">
                                <input type="hidden" name="paging" value="1">
                                <input type="hidden" name="pagen" value="328">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(function(){
    $(".imgBox").click(function(){
        var imgSrc = $(this).find("img").attr("src");
        var textTItle = $(this).siblings(".titleBox").text();
        var fileLink = $(this).siblings(".btnBox").children().attr("href");
        $(".bigImg img").attr("src", imgSrc);
        $(".detailInfo dl dt").text(textTItle);
        $(".detailInfo dl dd a").text(textTItle + " 자세히 보기").attr("href", fileLink);
    });
});

function PostPaging(pagenum) {
    var f = document.PostPagingForm;
    f.paging.value = pagenum;
    f.submit();
}

function PostPageGoView(seqno, actionURL) {
    var f = document.PostViewForm;
    f.seqno.value = seqno;
    f.action = actionURL;
    f.submit();
}

function PostPageGoModify(seqno, actionURL) {
    var f = document.PostViewForm;
    f.seqno.value = seqno;
    f.action = actionURL;
    f.submit();
}

function PostPageGoList(actionURL) {
    var f = document.PostListForm;
    f.action = actionURL;
    f.submit();
}

function PostPageGoExcelDown(actionURL) {
    var f = document.PostListForm;
    f.action = actionURL;
    f.method = "POST";
    f.submit();
}

function PostGoSelectExcelDown(formname, checkboxName, actionURL) {
    var chk = document.getElementsByName(checkboxName);
    var cnt = 0;

    for(var i=0; i < chk.length ; i++) {
        if(chk[i].checked == true) {
            cnt = cnt + 1;
        }
    }

    if(cnt == 0) {
        alert('선택된 항목이 없습니다.');
        return false;
    }

    console.log(actionURL);
    $("form[name=" + formname + "]")[0].action = actionURL;
    $("form[name=" + formname + "]")[0].method = "POST";
    $("form[name=" + formname + "]")[0].submit();
}

function removeChar(event) {
    event = event && window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( keyID == 8 && keyID == 46 && keyID == 37 && keyID == 39 )
        return;
    else
        event.target.value = event.target.value.replace(/[^0-9]/g, "");
}
</script>

<form name="PostViewForm" id="PostViewForm" action="" method="POST">
    <input type="hidden" name="seqno">
    <input type="hidden" name="returnpagen" value="328">
    <input type="hidden" name="pagen" value="328">
</form>

<form name="PostListForm" id="PostListForm" action="" method="POST">
    <input type="hidden" name="pagen" value="328">
</form>

<?php include "../include/footer.php"; ?> 