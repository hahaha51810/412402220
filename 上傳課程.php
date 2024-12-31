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
            margin-top: 100px; /* 調整表單位置 */
            margin-left: auto;
            margin-right: auto;
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
        }
    </style>
</head>

<body>
    <!-- Top navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="老師.php">遠距教學影片管理系統</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <a class="nav-link"><?php echo $member_name; ?>老師，您好</a>
                    <a class="nav-link" href="變更密碼.php">變更密碼</a>
                    <a class="nav-link" href="logout.php">登出</a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Side navigation -->
    <div class="sidebar">
        <a href="上傳的課程.php">上傳的課程</a>
        <a href="上傳課程.php">上傳課程</a>
        <a href="老師 最新課程.php">最新課程</a>
        <a href="老師 全部課程.php">全部課程</a>
        <a href="老師 線上課程排行榜.php">所有線上課程排行榜</a>
        <a href="我的線上課程排行榜.php">我的線上課程排行榜</a>
        <a href="老師 觀看紀錄.php">觀看紀錄</a>
        <a href="老師 我的收藏.php">我的收藏</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container1">
            <h2>上傳您的課程</h2>
            <form action="lessonupload.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="courseName" >課程名稱</label>
                    <input type="text" id="courseName" name="course_name" class="form-control" placeholder="輸入課程名稱" required>
                </div>
                <div class="form-group">
                    <label for="courseDescription">課程簡介</label>
                    <textarea id="courseDescription" name="course_description" class="form-control" rows="4" placeholder="輸入課程簡介" required></textarea>
                </div>
                <div class="form-group">
                    <label for="videoInput">上傳影片</label>
                    <input type="file" id="videoInput" name="course_video" class="form-control" accept="video/*" required>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3">上傳課程</button>
            </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="m-0">版權所有 &copy; 輔仁大學 2024</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
