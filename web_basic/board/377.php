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
        <div class="contents page_377">
            <div class="contenstView">
                <div class="boardWrap">
                    <div class="newsList">
                        <ul>
                            <li>
                                <p class="imgBox">
                                    <a href="javascript:;">
                                        <img src="/web_basic/program/news/imageview.php?pagen=339&amp;ftype=12&amp;fchecksum=cf942ee4ac0fde6742ea0bb5670be84c0461eb4b946a71978771e3369c3b3725" alt="이미지">
                                    </a>
                                </p>
                                <p class="titleBox">GCS 소식지 85호</p>
                                <p class="btnBox">
                                    <a href="/file/13/0c6472186877d3aa82b0c2e63a3f41af26e0af5e0ace653f01c0c72fa7f15a2a" target="_blank">
                                        자세히 보기
                                    </a>
                                </p>
                            </li>
                            <!-- Additional newsletter items will be added here -->
                        </ul>
                    </div>

                    <div class="pageNumWrap">
                        <div class="pageNum">
                            <ol>
                                <li class="active"><a href="javascript:;">1</a></li>
                                <li><a href="javascript:PostPaging(2);">2</a></li>
                                <li><a href="javascript:PostPaging(3);">3</a></li>
                                <li><a href="javascript:PostPaging(4);">4</a></li>
                                <li><a href="javascript:PostPaging(5);">5</a></li>
                                <li><a href="javascript:PostPaging(6);">6</a></li>
                                <li><a href="javascript:PostPaging(7);">7</a></li>
                                <li class="nextArrow"><a href="javascript:PostPaging(2);"><img src="/web_basic/img/board/page_arrow_next.png" alt="다음"></a></li>
                                <form name="PostPagingForm" id="PostPagingForm" action="" method="POST">
                                    <input type="hidden" name="paging" value="1">
                                    <input type="hidden" name="pagen" value="377">
                                </form>
                            </ol>
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
    <input type="hidden" name="returnpagen" value="377">
    <input type="hidden" name="pagen" value="377">
</form>

<form name="PostListForm" id="PostListForm" action="" method="POST">
    <input type="hidden" name="pagen" value="377">
</form>

<?php include "../include/footer.php"; ?> 