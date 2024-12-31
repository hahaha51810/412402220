<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>遠距教學影片管理系統 - 我的線上課程排行榜</title>
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
            padding-top: 60px;
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
        /* 隱藏表單 */
        #editForm {
            display: none;
        }
    </style>
</head>

<body>
<?php

session_start();

$member_name = $_SESSION["member_name"] ?? "N/A";


?>
    <!-- Navbar -->
    <!-- Top navigation -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="老師.php">遠距教學影片管理系統</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <a class="nav-link" ><?php echo $member_name; ?>老師，您好</a>
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
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <h1>我的線上課程排行榜(前10名)</h1>&nbsp;<br>&nbsp;<br>
        <div class="table-responsive">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">名次</th>
                        <th scope="col">課程名稱</th>
                        <th scope="col">上傳者</th>
                        <th scope="col">觀看次數</th>
                        <th scope="col">上傳日期</th>
                        <th scope="col">播放課程</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>基礎程式設計</td><td>廖建翔</td><td>1203</td><td>2023-05-15</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>2</td><td>高等數學</td><td>廖建翔</td><td>1020</td><td>2023-06-18</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>3</td><td>經濟學基礎</td><td>廖建翔</td><td>985</td><td>2023-07-23</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>4</td><td>線性代數</td><td>廖建翔</td><td>876</td><td>2023-09-05</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>5</td><td>心理學概論</td><td>廖建翔</td><td>765</td><td>2023-10-12</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>6</td><td>物理入門</td><td>廖建翔</td><td>654</td><td>2023-11-01</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>7</td><td>數據分析</td><td>廖建翔</td><td>600</td><td>2023-11-10</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>8</td><td>統計學基礎</td><td>廖建翔</td><td>580</td><td>2023-11-15</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>9</td><td>計算機科學概論</td><td>廖建翔</td><td>523</td><td>2023-11-20</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    <tr><td>10</td><td>財務管理</td><td>廖建翔</td><td>485</td><td>2023-11-25</td><td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td></tr>
                    
                </tbody>
            </table>
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
    
    
    <!-- CRUD Script -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true,
                "searching": true,
                "language": {
                    "lengthMenu": "顯示 _MENU_ 項結果",
                    "zeroRecords": "找不到符合的項目",
                    "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "search": "搜尋:",
                    "paginate": {
                        "first": "第一頁",
                        "last": "最後一頁",
                        "next": "下一頁",
                        "previous": "上一頁"
                    }
                }
            });
        });
        
        
    </script>
</body>
</html>
