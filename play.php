<?php
session_start();
$member_name = $_SESSION["member_name"] ?? "N/A";

// 資料庫連線
$link = mysqli_connect('localhost', 'root', '', 'webtest');
if (!$link) {
    die("資料庫連線失敗：" . mysqli_connect_error());
}

// 檢查是否有傳遞影片 ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // 確保 id 是整數

    // 更新觀看次數
    $updateViewsSql = "UPDATE courses SET views = views + 1 WHERE id = ?";
    $updateStmt = $link->prepare($updateViewsSql);
    $updateStmt->bind_param("i", $id);
    $updateStmt->execute();
    $updateStmt->close();

    // 查詢影片資訊
    $sql = "SELECT * FROM courses WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $courseName = htmlspecialchars($row['course_name']);
        $videoPath = htmlspecialchars($row['video_path']);
        $views = intval($row['views']);
    } else {
        die("找不到指定的影片。");
    }

    $stmt->close();
} else {
    die("未提供影片 ID。");
}

$link->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>播放課程 - <?php echo $courseName; ?></title>
    <link rel="icon" type="image/x-icon" href="video.png" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
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
            margin-top: 100px;
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            padding-top: 30px;
        }
        .video-container {
            margin-top: 1000px;
            background-color: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 1000px; /* 最大寬度 */
    margin: 0 auto;
        }
        .video-container video {
            border-radius: 8px;
            max-width: 100%;
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
                    <a class="nav-link"><?php echo $_SESSION['member_name'] ?? 'N/A'; ?>老師，您好</a>
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
        <div class="video-container">
            <h1>課程名稱：<?php echo $courseName; ?></h1>
            <video controls>
                <source src="<?php echo $videoPath; ?>" type="video/mp4">
                您的瀏覽器不支援播放此影片。
            </video>
            <div class="mt-3">
            <a href="#" class="btn btn-primary" onclick="goBack()">返回</a>
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
    <script >
        
let watchTime = 0; // 初始化觀看時長

// 每秒更新一次觀看時長
const timer = setInterval(() => {
    watchTime++;
}, 1000);

// 在頁面卸載或返回時記錄觀看時長
function recordWatchTime() {
    const data = JSON.stringify({
        student_name: "<?php echo $member_name; ?>",
        course_id: <?php echo $id; ?>,
        watch_time: watchTime
    });

    // 發送觀看時長到後端
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "record_watch_time.php", false); // 設定同步請求
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data);
}

// 在頁面卸載時記錄觀看時長
window.addEventListener('beforeunload', recordWatchTime);

// 返回按鈕的 onclick 記錄
function goBack() {
    recordWatchTime();
    window.location.href = "上傳的課程.php";
}




    </script>
</body>
</html>
