<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>遠距教學影片管理系統</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="video.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* 設置 body 的最小高度為視窗高度，以確保 footer 可以固定在底部 */
            margin: 0;
            padding: 0;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 56px; /* 調整以符合 navbar 的高度 */
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
            background-color: #575d63;
        }
        .content {
            flex: 1; /* 讓 content 區域填滿剩餘的空間 */
            display: flex;
            flex-direction: column;
            margin-left: 250px; /* 調整以符合 sidebar 的寬度 */
            padding: 20px;
        }
        .navbar {
            margin-bottom: 0;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
    </style>
</head>
<body>
<?php

session_start();

$member_name = $_SESSION["member_name"] ?? "N/A";


?>
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
    
    <!-- Page Content -->
    <div class="content">
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="./img/fju.jpg" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">輔仁大學熱烈招生中!!</h1><br>
                    <p>天主教輔仁大學創學精神輔仁大學是天主教會在我國設立之第一所大學，創校迄今近九十年，向本敬天愛人之精神...</p>
                    <a class="btn btn-primary" href="https://www.fju.edu.tw/index.jsp">了解更多</a>
                </div>
            </div>
            <!-- Call to Action-->
            
            <!-- Content Row-->
            <h2 class="mb-4">全部課程</h2>
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            
                            <iframe width="343" height="320"
                            src="https://www.youtube.com/embed/CNMX-Oqgp1U?si=XWUM9lv_5q7IlHQQ">
                            </iframe>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="./DS3000毛細管DNA電泳定序儀.html">加入收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;觀看次數：87次</div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <iframe width="343" height="320"
                            src="https://www.youtube.com/embed/CNMX-Oqgp1U?si=XWUM9lv_5q7IlHQQ">
                            </iframe>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="./TissueFAXS分析軟體.html">加入收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;觀看次數：80次</div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <iframe width="343" height="320"
                            src="https://www.youtube.com/embed/CNMX-Oqgp1U?si=XWUM9lv_5q7IlHQQ">
                            </iframe>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="類流式影像自動擷取定量系統TissueFAXS.html">加入收藏</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;觀看次數：85次</div>
                    </div>
                </div>
                
                
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
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
