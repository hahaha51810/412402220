<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>遠距教學影片管理系統 - 線上課程排行榜</title>
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="管理者.html">遠距教學影片管理系統</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 style="color: #ffffff;">&nbsp;&nbsp;線上課程影片管理</h4>
        <a href="預約紀錄查詢.html">上傳的課程</a>
        <a href="登入.html">最新課程</a>
        <a href="登入.html">全部課程</a>
        <a href="登入.html">線上課程排行榜</a>
        <a href="登入.html">觀看紀錄</a>
        <a href="管理者 我的收藏.html">我的收藏</a>
        <h4 style="color: #ffffff;">&nbsp;&nbsp;會員管理</h4>

        <a href="會員一覽.html">會員一覽</a>
        <a href="新增會員.html">新增會員</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <h1>線上課程排行榜</h1>

                
                <!-- Member Table -->
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
                                <tr>
                                    <td>1</td>
                                    <td>基礎程式設計</td>
                                    <td>廖建翔</td>
                                    <td>1023</td>
                                    <td>2023-05-15</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td> <!-- 插入圖片 -->
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>高等數學</td>
                                    <td>謝新達</td>
                                    <td>989</td>
                                    <td>2023-06-07</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>機械工程概論</td>
                                    <td>陳信宏</td>
                                    <td>876</td>
                                    <td>2023-07-23</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>經濟學基礎</td>
                                    <td>廖翔建</td>
                                    <td>845</td>
                                    <td>2023-08-01</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>線性代數</td>
                                    <td>廖建翔</td>
                                    <td>764</td>
                                    <td>2023-09-05</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>心理學概論</td>
                                    <td>謝新達</td>
                                    <td>699</td>
                                    <td>2023-10-18</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>物理入門</td>
                                    <td>陳信宏</td>
                                    <td>652</td>
                                    <td>2023-11-02</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>數據分析</td>
                                    <td>廖翔建</td>
                                    <td>591</td>
                                    <td>2023-11-15</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>統計學基礎</td>
                                    <td>廖建翔</td>
                                    <td>556</td>
                                    <td>2023-11-20</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>計算機科學概論</td>
                                    <td>謝新達</td>
                                    <td>523</td>
                                    <td>2023-11-25</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>財務管理</td>
                                    <td>陳信宏</td>
                                    <td>485</td>
                                    <td>2023-12-01</td>
                                    <td><a href="#"><img src="play.png" alt="播放" width="24" height="24"></a></td>
                                </tr>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>
    
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
