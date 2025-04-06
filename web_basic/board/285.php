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
                    <li><a href="/web_basic/board/list.php?pagen=285&amp;CATENUM=0" id="depthname">전체</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section id="container" class="news group_num_217">
        <div class="contents page_285">
            <div class="boardWrap">
                <div class="boardList">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">번호</th>
                                <th scope="col">제목</th>
                                <th scope="col">작성자</th>
                                <th scope="col">작성일</th>
                                <th scope="col">조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($notices as $sno => $notice):
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td class="title">
                                    <a href="/web_basic/board/view.php?sno=<?php echo $sno; ?>">
                                        <?php echo $notice['title']; ?>
                                    </a>
                                </td>
                                <td><?php echo $notice['author']; ?></td>
                                <td><?php echo $notice['date']; ?></td>
                                <td><?php echo $notice['views']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">7</a>
                    <a href="#">8</a>
                    <a href="#">9</a>
                    <a href="#">10</a>
                    <a href="#" class="next">다음</a>
                </div>
                <fieldset class="searchArea">
                    <form action="/web_basic/board/list.php?pagen=285" name="searchform" method="GET">
                        <input type="hidden" name="pagen" value="285">
                        <input type="hidden" name="CATENUM" value="0">
                        <div class="boardSearch">
                            <label class="lhide" for="search">검색할 조건을 선택해주세요</label>
                            <select class="select" name="search_option" id="search" title="검색할 조건을 선택해주세요">
                                <option value="제목" <?php echo $search_option === '제목' ? 'selected' : ''; ?>>제목</option>
                                <option value="내용" <?php echo $search_option === '내용' ? 'selected' : ''; ?>>내용</option>
                            </select>
                            <div class="searchBox">
                                <label class="lhide" for="searchtext">검색어를 입력하세요.</label>
                                <input type="text" class="text" placeholder="제목 또는 내용을 입력해주세요." title="제목 또는 내용을 입력해주세요." name="search_info" value="<?php echo htmlspecialchars($search_info); ?>" id="searchtext">
                                <input type="submit" value="검색">
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
</div>

<style>
.boardList table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

.boardList th,
.boardList td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #e2e8f0;
}

.boardList th {
    background: #f8fafc;
    font-weight: 600;
    color: #2c5282;
}

.boardList td.title {
    text-align: left;
}

.boardList td.title a {
    color: #2d3748;
    text-decoration: none;
    transition: color 0.2s;
}

.boardList td.title a:hover {
    color: #2c5282;
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 5px;
    margin-bottom: 30px;
}

.pagination a {
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    color: #4a5568;
    text-decoration: none;
    transition: all 0.2s;
}

.pagination a:hover,
.pagination a.active {
    background: #2c5282;
    color: white;
    border-color: #2c5282;
}

.searchArea {
    border: none;
    margin-top: 20px;
}

.boardSearch {
    display: flex;
    justify-content: center;
    gap: 10px;
    align-items: center;
}

.boardSearch .select {
    padding: 8px;
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    min-width: 100px;
}

.searchBox {
    display: flex;
    gap: 10px;
}

.searchBox .text {
    padding: 8px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    min-width: 300px;
}

.searchBox input[type="submit"] {
    padding: 8px 16px;
    background: #2c5282;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.2s;
}

.searchBox input[type="submit"]:hover {
    background: #2b6cb0;
}

.lhide {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}
</style>

<?php include "../include/footer.php"; ?> 