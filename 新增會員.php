<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>遠距教學影片管理系統 - 新增會員</title>
    <link rel="icon" type="image/x-icon" href="video.png" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        /* 保持和「會員一覽」一致的樣式 */
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
            padding-top: 150px;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
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
<?php

session_start();

$member_name = $_SESSION["member_name"] ?? "N/A";


?>
    <!-- Navbar -->
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
        <h1>新增會員</h1>
        <div class="card mb-3">
            <div class="card-body" >
                <form id="memberForm" action="insert.php" method="post">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="memberCode" class="form-label">會員代號</label>
                            <input type="text" class="form-control" name="member_id" placeholder="請輸入會員代號" required>
                        </div>
                        <div class="col-md-6">
                            <label for="account" class="form-label">帳號(email)</label>
                            <input type="email" class="form-control" name="account" placeholder="請輸入帳號(email)" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="role" class="form-label">角色</label>
                            <select class="form-select" name="role" required>
                                <option>管理者</option>
                                <option>老師</option>
                                <option>學生</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">性別</label>
                            <select class="form-select" name="gender" required>
                                <option>男</option>
                                <option>女</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="memberName" class="form-label">會員名稱</label>
                        <input type="text" class="form-control" name="member_name" placeholder="請輸入會員名稱" required>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary save-btn">儲存</button>
                    
                    <button type="button" class="btn btn-secondary cancel-btn">取消</button>
                </form>
            </div>
        </div>
    </div></div></div></body>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="m-0">版權所有 &copy; 輔仁大學 2024</p>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        

        document.querySelector('.cancel-btn').addEventListener('click', function () {
            document.getElementById('memberForm').reset();
        });
        
        
        
        
        

        
        
    </script>
</body>
</html>
