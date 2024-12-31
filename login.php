<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content = "3;url=index.php">
</head>
<body>
<?php
if (!isset($_SESSION)) { 
    session_start(); 
}

// Step 1: 接收使用者輸入
$account = $_POST['account'] ?? '';
$password = $_POST['password'] ?? '';

// Step 2: 連接資料庫
$link = mysqli_connect('localhost', 'root', '', 'webtest');

// 檢查連接是否成功
if (!$link) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Step 3: 使用預處理語句查詢
$sql = "SELECT * FROM member WHERE account = ? AND password = ?";
$stmt = mysqli_prepare($link, $sql);

if ($stmt) {
    // 綁定參數
    mysqli_stmt_bind_param($stmt, "ss", $account, $password);
    mysqli_stmt_execute($stmt);

    // 取得結果
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // 登入成功，設置 Session
        $_SESSION['account'] = $row['account'];
        $_SESSION['member_name'] = $row['member_name'];
        $_SESSION['member_id'] = $row['member_id'];
        $_SESSION['role'] = $row['role']; // 取得角色資訊

        // 根據身份導向不同頁面
        if ($row['role'] === '學生') {
            header("Location: 學生.php");
            exit();
        } elseif ($row['role'] === '老師') {
            header("Location: 老師.php");
            exit();
        } elseif ($row['role'] === '管理者') {
            header("Location: 管理者.php");
            exit();
        } else {
            echo "<center><h1>無效的角色，請聯繫管理員！</h1></center>";
        }
    } else {
        echo "<center><h1>登入失敗，請確認帳號密碼!</h1></center>";
    }

    // 關閉語句
    mysqli_stmt_close($stmt);
} else {
    echo "SQL Error: " . mysqli_error($link);
}

// 關閉資料庫連接
mysqli_close($link);
?>

</body>
</html>