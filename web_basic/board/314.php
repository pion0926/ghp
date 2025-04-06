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
        <div class="contents page_314">
            <div class="contenstView">
                <div class="boardWrap">
                    <div class="boardGalleryType2 mt_50">
                        <ul>
                            <li>
                                <p class="imgBox"><img src="/web_basic/program/board/imageview.php?pagen=320&amp;ftype=4&amp;fchecksum=06705bffdeb19dd0f14e5b502317b5e6a14a8a19bfb9f2f2378b37e12ad60149" alt="이미지"></p>
                                <dl>
                                    <dt>메콩 3개국 코로나19 지원사업</dt>
                                    <dd></dd>
                                    <dd class="stateTag"><a href="/web_basic/board/view.php?pagen=315&amp;sno=947&amp;search_option=&amp;search_info=&amp;paging=1&amp;iPage=1&amp;ipage_size=10">자세히 보기 <img src="/web_basic/img/board/btn_gallery_arrow.gif" alt="Icon"></a></dd>
                                </dl>
                            </li>
                            <!-- Additional gallery items will be added here -->
                        </ul>
                    </div>

                    <div class="pageNum">
                        <ol>
                            <li class="active"><a href="javascript:;">1</a></li>
                            <li><a href="javascript:PostPaging(2);">2</a></li>
                            <li><a href="javascript:PostPaging(3);">3</a></li>
                            <li><a href="javascript:PostPaging(4);">4</a></li>
                            <li><a href="javascript:PostPaging(5);">5</a></li>
                            <li><a href="javascript:PostPaging(6);">6</a></li>
                            <li><a href="javascript:PostPaging(7);">7</a></li>
                            <li><a href="javascript:PostPaging(8);">8</a></li>
                            <li class="nextArrow"><a href="javascript:PostPaging(2);"><img src="/web_basic/img/board/page_arrow_next.png" alt="다음"></a></li>
                        </ol>
                        <form name="PostPagingForm" id="PostPagingForm" action="" method="POST">
                            <input type="hidden" name="paging" value="1">
                            <input type="hidden" name="pagen" value="314">
                        </form>
                    </div>

                    <fieldset class="searchArea">
                        <form action="/web_basic/board/list.php?pagen=314" name="searchform" method="GET">
                            <input type="hidden" name="pagen" value="314">
                            <input type="hidden" name="CATENUM" value="0">
                            <div class="boardSearch">
                                <label class="lhide" for="search">검색할 조건을 선택해주세요</label>
                                <select class="select" name="search_option" id="search" title="검색할 조건을 선택해주세요">
                                    <option value="제목">제목</option>
                                    <option value="내용">내용</option>
                                </select>
                                <div class="searchBox">
                                    <label class="lhide" for="searchtext">검색어를 입력하세요.</label>
                                    <input type="text" class="text" placeholder="제목 또는 내용을 입력해주세요." title="제목 또는 내용을 입력해주세요." name="search_info" value="" id="searchtext">
                                    <input type="submit" value="검색">
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function PostPaging(pagenum) {
    var f = document.PostPagingForm;
    f.paging.value = pagenum;
    f.submit();
}

function search_submit() {
    var f = document.searchform;
    if (f.search_info.value == "") {
        alert("검색어를 입력해주세요");
        return false;
    }
}
</script>

<?php include "../include/footer.php"; ?> 