<?php
require_once 'db.php'; // 引入資料庫連線

// 檢查是否有觸發上傳動作
if (isset($_POST['upload'])) {
    
    // 獲取圖片的檔案名稱、暫存檔案名稱及圖片數據
    $imageName = $_FILES['image']['name']; // 圖片名稱
    $imageTmpName = $_FILES['image']['tmp_name']; // 圖片的暫存檔案名稱
    $imageData = file_get_contents($imageTmpName); // 讀取圖片的數據

    // SQL 插入語句，將圖片名稱和圖片數據存入資料庫
    $sql = "INSERT INTO images (name, image) VALUES (?, ?)";
    
    // 初始化準備語句
    $stmt = mysqli_stmt_init($conn);
    
    // 檢查 SQL 語句是否準備成功
    if (mysqli_stmt_prepare($stmt, $sql)) {
        // 綁定參數："s" 表示字串（圖片名稱），"b" 表示 blob（圖片數據）
        mysqli_stmt_bind_param($stmt, "sb", $imageName, $imageData);
        
        // 發送大資料（如圖片）到 MySQL
        mysqli_stmt_send_long_data($stmt, 1, $imageData); 
        
        // 執行 SQL 語句
        if (mysqli_stmt_execute($stmt)) {
            // 如果成功，顯示上傳成功訊息並重定向到顯示頁面
            // echo "圖片上傳成功！";
            header("Location: display.php"); // 上傳成功後重定向到顯示頁面
        } else {
            // 如果執行失敗，顯示錯誤訊息
            echo "圖片上傳失敗: " . mysqli_error($conn);
        }
    
        // 關閉語句
        mysqli_stmt_close($stmt);
    } else {
        // 如果 SQL 語句準備失敗，顯示錯誤訊息
        echo "錯誤訊息: " . mysqli_error($conn);
    }
    
    // 關閉資料庫連線
    mysqli_close($conn);
}

?>
