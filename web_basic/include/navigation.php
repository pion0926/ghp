<?php
$current_page = basename($_SERVER['PHP_SELF']);
$current_section = isset($_GET['section']) ? $_GET['section'] : '';
?>

<li class="<?php echo ($current_section == 'introduce') ? 'active' : ''; ?>">
    <span><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=206">단체소개</a></span>
    <div class="depth">
        <ul>
            <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=206">비전과 가치</a></li>
            <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=207">인사말</a></li>
            <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=230">연혁</a></li>
            <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=448">재정보고</a></li>
            <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=246">조직도</a></li>
            <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=211">임원소개</a></li>
            <!-- <li><a href="/web_basic/introduce/introduce.php?section=introduce&pagen=212">찾아오시는길</a></li> -->
            <!-- <li><a href="/web_basic/introduce/write.php?section=introduce&pagen=363">문의하기</a></li> -->
        </ul>
    </div>
</li>

<li class="<?php echo ($current_section == 'business') ? 'active' : ''; ?>">
    <span><a href="/web_basic/business/business.php?section=business&pagen=356">사업안내</a></span>
    <div class="depth">
        <ul>
            <li><a href="/web_basic/business/business.php?section=business&pagen=356">국제협력</a></li>
            <li><a href="/web_basic/business/business.php?section=business&pagen=449">봉사활동</a></li>
            <li><a href="/web_basic/business/business.php?section=business&pagen=250">인재양성</a></li>
            <li><a href="/web_basic/business/business.php?section=business&pagen=251">연구조사</a></li>
            <li><a href="/web_basic/business/business.php?section=business&pagen=252">의료지원</a></li>
        </ul>
    </div>
</li>

<li class="<?php echo ($current_section == 'news') ? 'active' : ''; ?>">
    <span><a href="/web_basic/board/list.php?section=news&pagen=285">소식</a></span>
    <div class="depth">
        <ul>
            <li><a href="/web_basic/board/list.php?section=news&pagen=285">공지/뉴스</a></li>
            <!-- <li><a href="/web_basic/board/list.php?section=news&pagen=299">뉴스레터</a></li>
            <li><a href="/web_basic/news/list.php?section=news&pagen=337">소식지</a></li> -->
            <!-- <li><a href="/web_basic/report/list.php?section=news&pagen=328">연차보고</a></li> -->
            <!-- <li><a href="/web_basic/board_custom/books/list.php?section=news&pagen=348">책자</a></li> -->
            <!-- <li><a href="/web_basic/board/list.php?section=news&pagen=314">사진/영상</a></li> -->
        </ul>
    </div>
</li> 