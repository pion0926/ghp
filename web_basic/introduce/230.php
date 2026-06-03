<?php
include "../include/admin_check.php";
include "../include/db_connect.php";

$isAdmin = isAdmin(); 


// **진단: 현재 isAdmin() 값 출력**
error_log("isAdmin value: " . var_export($isAdmin, true));  // 서버 에러로그에서 확인 가능
// 또는 임시로 화면에 출력
echo "<!-- isAdmin value: " . htmlspecialchars(var_export($isAdmin, true)) . " -->";

// 기본 이미지 경로
$imagePath = "/web_basic/img/introduce/history_new.png";

// 예외 발생 대비
try {
    $sql = "SELECT image_path FROM history ORDER BY created_at DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['image_path'])) {
            $imagePath = $row['image_path'];
        }
    }
} catch (Exception $e) {
    error_log("History image load error: " . $e->getMessage());
    // 그냥 기본 이미지 유지
}
?>

<section id="container" class="introduce group_num_230">
    <div class="contents page_230">
        <div class="contenstView">
            <div style="text-align: center; margin: 20px auto; padding: 20px; width: 100%; box-sizing: border-box;">
                <div style="max-width: 1200px; margin: 0 auto;">
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="연혁" style="width: 100%; height: auto; display: block; margin: 0;">
                </div>

                <?php if ($isAdmin): ?>
                    <form action="upload_history.php" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
                        <input type="file" name="history_image" accept="image/*" required>
                        <button type="submit">upload_new_image</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
