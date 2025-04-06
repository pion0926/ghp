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
        <div class="contents page_348">
            <div class="contenstView">
                <div class="boardWrap">
                    <div class="explanationList">
                        <div class="slick-slider">
                            <div class="slick-track">
                                <div class="slick-slide">
                                    <div>
                                        <div style="width: 100%; display: inline-block;">
                                            <a href="javascript:BooksInfo(3211);">
                                                <dl>
                                                    <dt><img src="/web_basic/program/books/imageview.php?pagen=350&amp;ftype=15&amp;fchecksum=fde2daeb53a635c47eecccd8e5f92aff03b50750b26c8736eb0ac19d3c17e5a7" alt="찾아가는 세계시민학교 진행자용 도서"></dt>
                                                    <dd>찾아가는 세계시민학교 진행자용 도서</dd>
                                                </dl>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Additional slides will be added here -->
                            </div>
                        </div>
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
                                <input type="hidden" name="pagen" value="348">
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
    $(".explanationList").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
});

function BooksInfo(id) {
    var f = document.PostViewForm;
    f.seqno.value = id;
    f.action = "/web_basic/board/view.php?pagen=348";
    f.submit();
}

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
    <input type="hidden" name="returnpagen" value="348">
    <input type="hidden" name="pagen" value="348">
</form>

<form name="PostListForm" id="PostListForm" action="" method="POST">
    <input type="hidden" name="pagen" value="348">
</form>

<?php include "../include/footer.php"; ?> 