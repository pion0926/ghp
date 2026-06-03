<?php 
session_start();
include "../include/header.php"; 
include "../include/db_connect.php";
include "../include/admin_check.php"; // 관리자 확인 (필요에 따라 주석 해제 또는 사용)

// --- 1. 페이지네이션 변수 설정 ---
$items_per_page = 9; // 한 페이지에 보여줄 뉴스 개수
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) $current_page = 1;
$offset = ($current_page - 1) * $items_per_page;

// --- 2. 전체 뉴스 개수 파악 ---
$sql_count = "SELECT COUNT(*) AS total FROM news WHERE is_visible = 1";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_items = $row_count['total'];
$total_pages = ceil($total_items / $items_per_page);
?>

<style>
.news-section {
    max-width: 1200px;
    margin: 60px auto;
    padding: 0 20px;
}

.news-title {
    font-size: 32px;
    font-weight: 700;
    color: #1d2b59;
    margin-bottom: 20px;
}

.news-subtitle {
    font-size: 16px;
    color: #444;
    margin-bottom: 40px;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
}

.news-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    overflow: hidden;
    transition: transform 0.2s;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.news-card:hover {
    transform: translateY(-5px);
}

.news-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.news-card h3 {
    font-size: 18px;
    margin: 16px 16px 8px;
    color: #1d2b59;
}

.news-card p {
    font-size: 14px;
    color: #555;
    margin: 0 16px 16px;
    line-height: 1.5;
}

@media (max-width: 480px) {
    .news-title {
        font-size: 24px;
    }
}

/* 글쓰기 버튼 */
.boardManage {
    margin-bottom: 20px;
    text-align: right;
}

.btnWrite {
    display: inline-block;
    padding: 10px 20px;
    background: #2c5282;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.2s;
    font-size: 14px;
}

.btnWrite:hover {
    background: #2b6cb0;
}

/* 페이지네이션 스타일 */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 40px;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a, .pagination span {
    display: block;
    padding: 8px 16px;
    text-decoration: none;
    color: #2c5282;
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.pagination a:hover {
    background-color: #f8fafc;
}

.pagination .current {
    background-color: #2c5282;
    color: white;
    border-color: #2c5282;
    font-weight: bold;
}
</style>

<div id="news" class="wrap">
    <div class="subTop">
        <div class="pageGroup">
            <h2>뉴스</h2>
        </div>
        <div id="lnb">
             <a href="/web_basic/board/list.php?pagen=299">전체</a> 
            <div class="depth2">
                <ul>
                    <li class="<?php echo empty($_GET['CATENUM']) ? 'active' : ''; ?>"><a href="/web_basic/board/list.php?pagen=299" id="depthname">전체</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section id="container" class="news group_num_217">
        <div class="news-section">
            <h2 class="news-title">글로벌헬스파트너스의 최근 뉴스
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1): ?>
                    <div class="boardManage">
                        <a href="/web_basic/board/write_news.php" class="btnWrite">글 작성</a>
                    </div>
                <?php endif; ?>
            </h2>
            <p class="news-subtitle">글로벌헬스파트너스는 국내외 보건의료 봉사, 국제협력, 연구조사 활동을 통해 지구촌 누구도 소외되지 않는 건강한 세상을 만들어가고 있습니다.</p>

            <div class="news-grid">
                <?php
                // --- 3. 페이지네이션을 적용한 SQL 쿼리 ---
                $sql = "SELECT * FROM news WHERE is_visible = 1 ORDER BY published_at DESC LIMIT $items_per_page OFFSET $offset";
                $result = mysqli_query($conn, $sql);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = (int)$row['id'];
                        $thumb = htmlspecialchars($row['thumbnail_path']);
                        $title = htmlspecialchars($row['title']);
                        $summary = htmlspecialchars(mb_strimwidth(strip_tags($row['summary']), 0, 100, "..."));

                        echo "
                        <div class=\"news-card\">
                            <a href=\"news_view.php?id={$id}\" style=\"text-decoration: none; color: inherit;\">
                                <img src=\"{$thumb}\" alt=\"썸네일\">
                                <h3>{$title}</h3>
                                <p>{$summary}</p>
                            </a>
                        </div>
                        ";
                    }
                } else {
                    echo "<p>등록된 뉴스가 없습니다.</p>";
                }
                ?>
            </div>
            
            <?php if ($total_pages > 1): ?>
                <ul class="pagination">
                    <?php if ($current_page > 1): ?>
                        <li><a href="?pagen=299&page=<?= $current_page - 1 ?>">이전</a></li>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="<?= ($i == $current_page) ? 'active' : '' ?>">
                            <a href="?pagen=299&page=<?= $i ?>" class="<?= ($i == $current_page) ? 'current' : '' ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <?php if ($current_page < $total_pages): ?>
                        <li><a href="?pagen=299&page=<?= $current_page + 1 ?>">다음</a></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include "../include/footer.php"; ?>