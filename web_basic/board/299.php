<?php
include_once('../include/header.php');
?>

<div class="container">
    <section class="contents">
        <div class="boardWrap">
            <div class="boardList">
                <div class="listWrap">
                    <ul>
                        <li>
                            <p class="imgBox"><img src="https://img2.stibee.com/187_2539245_1733129114501046037.png" style="display: inline; vertical-align: bottom; text-align: center; max-width: 100%; height: auto; border: 0px;" width="630" class="stb-center"></p>
                            <dl>
                                <dt>[2024.11] 11월, 첫 눈처럼 풍성한 소식들⛄</dt>
                                <dd>안녕하세요, $%name%$님!벌써 2024년의 끝자락을 바라보고 있네요.얼마 전에 내린 첫눈은 다들 어떠셨나요? 정말 많이 내렸죠.⛄추운 날씨에 감기 조심하시고, 항상 안전한 출퇴근길이 되시길 바랍니다.글로벌헬스파트너스에도 첫눈처럼 설레고 풍성한 소식들이 준비되어 있어요.오늘 하루도 미소 짓는 시간 되시길 바라며🌝11월 소식 시작합니다! *사진을 클릭하시면 관련 페이지로 넘어갑니다.</dd>
                                <dd class="stateTag"><a href="/web_basic/board/view.php?pagen=300&amp;sno=1730&amp;search_option=&amp;search_info=&amp;paging=1&amp;iPage=1&amp;ipage_size=10">자세히 보기 <img src="/web_basic/img/board/btn_gallery_arrow.gif" alt="Icon"></a></dd>
                            </dl>
                        </li>
                        <!-- Additional list items will be added here -->
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
                        <li><a href="javascript:PostPaging(9);">9</a></li>
                        <li><a href="javascript:PostPaging(10);">10</a></li>
                        <li class="nextArrow"><a href="javascript:PostPaging(2);"><img src="/web_basic/img/board/page_arrow_next.png" alt="다음"></a></li>
                        <li class="arrowImg"><a href="javascript:PostPaging(18);"><img src="/web_basic/img/board/page_arrow_end.png" alt="맨 끝"></a></li>
                    </ol>
                </div>

                <fieldset class="searchArea">
                    <form action="/web_basic/board/list.php?pagen=299" name="searchform" method="GET">
                        <input type="hidden" name="pagen" value="299">
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
    </section>
</div>

<script>
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
</script>

<form name="PostPagingForm" id="PostPagingForm" action="" method="POST">
    <input type="hidden" name="paging" value="1">
    <input type="hidden" name="pagen" value="299">
</form>

<form name="PostViewForm" id="PostViewForm" action="" method="POST">
    <input type="hidden" name="seqno">
    <input type="hidden" name="returnpagen" value="299">
    <input type="hidden" name="pagen" value="299">
</form>

<form name="PostListForm" id="PostListForm" action="" method="POST">
    <input type="hidden" name="pagen" value="299">
</form>

<?php
include_once('../include/footer.php');
?> 