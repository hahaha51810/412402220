<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content = "2.5; url = 上傳的課程.php">
</head>
<body>
    <p align = center>
    <?php
        

        if(empty($_GET['method']))
        {
            //修改
            $member_id = $_POST['member_id'];
            $account = $_POST['account'];
            $member_name = $_POST['member_name'];
            $role = $_POST['role'];
            $gender = $_POST['gender'];
            

            //Step 1
            $link = mysqli_connect('localhost', 'root','','webtest');
            //Step 3
            $sql = "update member set member_id='$member_id', account='$account',member_name='$member_name',gender='$gender' ,role='$role' where member_id = '$member_id'";
            
            if(mysqli_query($link,$sql))
                {
                    echo"修改完成";
                }else
                {
                    echo"修改失敗";
                }
        }
        elseif ($_GET['method'] == "delete") {
            $id = intval($_GET['id']); // 確保 ID 是整數
            $link = mysqli_connect('localhost', 'root', '', 'webtest');
        
            if (!$link) {
                die("資料庫連線失敗：" . mysqli_connect_error());
            }
        
            // 開啟交易
            mysqli_begin_transaction($link);
        
            try {
                // 刪除 `watch_records` 中的相關資料
                $deleteWatchRecordsSql = "DELETE FROM watch_records WHERE course_id = ?";
                $stmt = $link->prepare($deleteWatchRecordsSql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
        
                // 刪除 `courses` 中的課程資料
                $deleteCourseSql = "DELETE FROM courses WHERE id = ?";
                $stmt = $link->prepare($deleteCourseSql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
        
                // 提交交易
                mysqli_commit($link);
                echo "刪除完成";
            } catch (Exception $e) {
                // 發生錯誤，回滾交易
                mysqli_rollback($link);
                echo "刪除失敗：" . $e->getMessage();
            }
        
            mysqli_close($link);
        }
        
        

    ?>
</body>
</html>