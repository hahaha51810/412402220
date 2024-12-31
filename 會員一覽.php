<?php

session_start();

$member_name = $_SESSION["member_name"] ?? "N/A";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>遠距教學影片管理系統 - 會員一覽</title>
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
                <h1>會員一覽</h1>

                <!-- 修改表單 (初始隱藏) -->
                <div class="card mb-3" id="editForm">
                    <div class="card-body">
                        <form action="dblink.php" method="post">
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
                            <button type="submit" class="btn btn-info">更新</button>
                            <button type="button" class="btn btn-secondary cancel-btn">取消</button>
                        </form>
                    </div>
                </div>
                

                <!-- Member Table -->
                <div class="table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                
                                <th scope="col">會員代號</th>
                                
                                <th scope="col">會員名稱</th>
                                <th scope="col">角色</th>
                                <th scope="col">性別</th>
                                <th scope="col">加入日期</th>
                                <th scope="col">帳號</th>
                                <th scope="col">編輯</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                //Step 1
                                $link = mysqli_connect('localhost', 'root');
                                mysqli_select_db($link,"webtest");
                                //Step 3
	                            $sql = "select * from member";
	                            $result = mysqli_query($link, $sql);
	                                // Step 4
	                            while($row = mysqli_fetch_assoc($result))
	                            {
                                        echo "<tr><td align=left>" . $row['member_id'] . "</td><td align=left>" . $row['member_name'] . "</td><td align=left>" . $row['role'] . "</td><td align=left>" . $row['gender'] . "</td><td align=left>" . $row['join_date'] . "</td><td align=left>" . $row['account'] . "</td><td align=left><button class='btn btn-success btn-sm edit-btn'>修改</button>
                                        <button class='btn btn-danger btn-sm delete-btn'>刪除</button></td></tr>";

	                            }
                        ?>
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
            var table = $('#myTable').DataTable({
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
        
            // 點擊修改按鈕顯示或隱藏表單
            $('#myTable tbody').on('click', '.edit-btn', function() {
            var row = $(this).closest('tr');
            var rowData = table.row(row).data();
            var formVisible = $('#editForm').is(':visible');

            if (formVisible && $('#editForm input[name="member_id"]').val() === rowData[0]) {
                $('#editForm').hide();
            } else {
                $('#editForm input[name="member_id"]').val(rowData[0]);
                $('#editForm input[name="member_name"]').val(rowData[1]);
                $('#editForm select[name="role"]').val(rowData[2]);
                $('#editForm select[name="gender"]').val(rowData[3]);
                $('#editForm input[name="account"]').val(rowData[5]);
                $('#editForm').show();
            }
        });

        // 取消按鈕隱藏表單
        $(document).on('click', '.cancel-btn', function() {
    var formElement = $('#editForm form');
    if (formElement.length > 0) { // 確保表單存在
        formElement[0].reset(); // 清空表單
    }
    $('#editForm').hide(); // 隱藏表單
});


            // 刪除會員
            
            $('#myTable tbody').on('click', '.delete-btn', function() {
    var row = $(this).closest('tr'); // 找到當前行
    var memberId = row.find('td').eq(0).text(); // 從第一列獲取會員代號

    if (confirm('確定要刪除此會員嗎？')) {
        // 將刪除請求提交到後端
        window.location.href = `dblink.php?method=delete&member_id=${memberId}`;
    }
});


        });
        
    </script>
</body>
</html>
