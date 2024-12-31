<?php
require_once 'db.php';

// 從資料庫中選取圖片資料
$sql = "SELECT id, name, image FROM images"; // SQL 查詢語句，選取圖片ID、名稱及圖片資料
$result = mysqli_query($conn, $sql); // 執行查詢並將結果存入變數 $result

// 檢查是否有資料返回
if (mysqli_num_rows($result) > 0) {
    // 如果有圖片資料，逐一顯示
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h3>" . $row['name'] . "</h3>"; // 顯示圖片名稱
        // 顯示圖片，將圖片資料轉換為 base64 編碼顯示
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
        echo "</div>";
    }
} else {
    // 如果沒有圖片資料，顯示提示訊息
    echo "沒有圖片。";
}

mysqli_close($conn);
?>