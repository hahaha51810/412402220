<?php

session_start();

$member_name = $_SESSION["member_name"] ?? "N/A";


?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>遠距教學影片管理系統 - 上傳課程</title>
    <link rel="icon" type="image/x-icon" href="video.png" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css" />

    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 56px;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-left: 250px;
            padding: 20px;
            padding-top: 30px;
        }
        .table {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        .container1 {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-top: 13%;
            margin-left: 22%;
            position: relative;
        }
        .container1 h2 {
            text-align: center;
        }
        .form-group {
            width: 100%;
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            resize: none;
        }
        .upload-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        .upload-controls {
            display: flex;
            align-items: center;
        }
        /* 美化自訂的按鈕樣式 */
        .custom-file-upload {
            padding: 8px 16px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-right: 15px;
        }
        .custom-file-upload:hover {
            background-color: #0056b3;
        }
        .custom-file-upload:active {
            transform: scale(0.95);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        /* 檔案名稱樣式 */
        #fileName {
            font-size: 14px;
            color: #333;
            margin-right: 18px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .upload-controls button {
            padding: 8px 16px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .upload-controls button:hover {
            background-color: #0056b3;
        }
        .upload-controls button:active {
            transform: scale(0.95);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        /* 隱藏原始的 file input */
        #videoInput {
            display: none;
        }
        #statusMessage {
            text-align: center;
            font-size: 16px;
        }
    </style>
    
</head>

<body>

    <!-- Top navigation -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="管理者.php">遠距教學影片管理系統</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <a class="nav-link" ><?php echo $member_name; ?>管理者，您好</a>
                    <a class="nav-link" href="變更密碼.php">變更密碼</a>
                    <a class="nav-link" href="logout.php">登出</a>
                    <li class="nav-item">
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    <!-- Side navigation -->
    <div class="sidebar">
        <h4 style="color: #ffffff;">&nbsp;&nbsp;線上課程影片管理
        </h4>
        <a href="管理者 上傳的課程.php">上傳的課程</a>
        <a href="管理者 上傳課程.php">上傳課程</a>
        <a href="管理者 最新課程.php">最新課程</a>
        <a href="管理者 全部課程.php">全部課程</a>
        
        <a href="管理者 線上課程排行榜.php">線上課程排行榜</a>
        
        <a href="管理者 線上課程排行榜.php">觀看紀錄</a>
        <a href="管理者 我的收藏.php">我的收藏</a>
        <h4 style="color: #ffffff;">&nbsp;&nbsp;會員管理
        </h4>
        <a href="會員一覽.php">會員一覽</a>
        <a href="新增會員.php">新增會員</a>
        
    </div>
    <!-- Main Content -->
    <div class="content">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                
                <div class="container1">
                    <h2>上傳您的課程</h2>
                    <!-- 課程名稱與簡介欄位 -->
                    <div class="form-group">
                        <label for="courseName">課程名稱</label>
                        <input type="text" id="courseName" placeholder="輸入課程名稱">
                    </div>
                    <div class="form-group">
                        <label for="courseDescription">課程簡介</label>
                        <textarea id="courseDescription" rows="4" placeholder="輸入課程簡介"></textarea>
                    </div>
                    <!-- 上傳影片部分 -->
                    <div class="upload-wrapper">
                        <div class="upload-controls">
                            <label class="custom-file-upload">
                                <input type="file" id="videoInput" accept="video/*" onchange="showFileName()">
                                選擇檔案
                            </label>
                            <span id="fileName">未選擇檔案</span> <!-- 顯示檔案名稱 -->
                            <button onclick="uploadVideo()">上傳課程</button>
                        </div>
                        <div id="statusMessage"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="m-0">版權所有 &copy; 輔仁大學 2024</p>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>
    
    <!-- JavaScript for displaying selected file name -->
    <script>
        function showFileName() {
            const videoInput = document.getElementById('videoInput');
            const fileNameDisplay = document.getElementById('fileName');
            if (videoInput.files.length > 0) {
                fileNameDisplay.textContent = videoInput.files[0].name;
            } else {
                fileNameDisplay.textContent = '未選擇檔案';
            }
        }
    
        function uploadVideo() {
            const videoInput = document.getElementById('videoInput');
            const courseNameInput = document.getElementById('courseName');
            const courseDescriptionInput = document.getElementById('courseDescription');
            const statusMessage = document.getElementById('statusMessage');
            const fileNameDisplay = document.getElementById('fileName');
    
            // 確認是否有選擇影片檔案
            if (videoInput.files.length === 0) {
                statusMessage.innerHTML = '<p style="color: red;">請選擇一個影片檔案。</p>';
                return;
            }
    
            // 模擬上傳過程並顯示成功訊息
            statusMessage.innerHTML = '<p>上傳中...</p>';
            setTimeout(() => {
                statusMessage.innerHTML = '<p style="color: green;">課程上傳成功！</p>';
    
                // 清空表單欄位
                courseNameInput.value = '';
                courseDescriptionInput.value = '';
                videoInput.value = ''; // 重置檔案選擇器
                fileNameDisplay.textContent = '未選擇檔案'; // 重置檔案名稱顯示
            }, 1000);
        }
    </script>
</body>
</html>
