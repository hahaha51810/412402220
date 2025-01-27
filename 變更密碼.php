<?php
session_start();
$member_name = $_SESSION["member_name"] ?? "N/A";
?>




<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>遠距教學影片管理系統</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* 水平置中 */
            align-items: center; /* 垂直置中 */
            height: 100vh; /* 使頁面高度填滿視窗 */
            background-color: #f5f5f5; /* 設定背景顏色 */
        }
        .container {
            display: flex;
            width: 80%;
            height: 40%;
             /* 容器寬度 */
            max-width: 900px; /* 限制最大寬度 */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* 增加陰影效果 */
            border-radius: 10px; /* 增加圓角 */
            overflow: hidden; /* 隱藏溢出部分 */
            background-color: white; /* 設定背景顏色 */
        }
        .image {
            flex: 0 0 50%; /* 調整圖片區域的寬度 */
            display: flex;
            justify-content: center; /* 圖片水平居中 */
            align-items: center; /* 圖片垂直居中 */
        }
        img {
            max-width: 90%; /* 確保圖片不會超過區域 */
            height: auto; /* 自動調整高度 */
        }
        .form-container {
            flex: 0 0 50%; /* 調整表單區域的寬度 */
            padding: 40px; /* 增加內邊距 */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* 使內容水平居中 */
        }
        h1 {
            font-size: 28px; /* 增加標題字體大小 */
            margin-top: 20px; /* 增加上邊距 */
            margin-left: 10px; /* 調整這裡以手動調整標題的左側位置 */
            margin-right: 120px;
            margin-bottom: 20px; /* 增加下邊距 */
            text-align: left; /* 標題左對齊 */
        }
        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 15px; /* 增加輸入框的內邊距，讓其更高 */
            margin: 10px 0; /* 上下間距 */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* 包含內邊距和邊框在內的寬度計算 */
        }
        input[type="submit"] {
            background-color: rgb(246, 139, 31);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px; /* 增加按鈕的內邊距，讓其更高 */
            cursor: pointer;
            width: 80%;
            font-size: 16px; /* 增加按鈕字體大小 */
            transition: background-color 0.3s; /* 增加過渡效果 */
        }
        input[type="submit"]:hover {
            background-color: rgb(246, 139, 31); /* 懸停時改變顏色 */
        }
        a {
            text-decoration: none; /* 移除連結的下劃線 */
            color: #007BFF; /* 設定連結顏色 */
            margin-top: 10px;
            margin-left: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image">
            <img src="你好.jpg" alt="圖片"> <!-- 使用 <img> 標籤顯示圖片 -->
        </div>
        <div class="form-container">
            <h1>變更密碼</h1>
            <form action="changepassword.php" method="POST">
                <input type="password" placeholder="請輸入新密碼" required>
                <input type="password" placeholder="請再次新密碼" name="password" required>
                <input type="submit" value="確定">
            </form>
            
        </div>
    </div>
</body>
</html>
