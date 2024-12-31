<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="refresh" content = "2.5; url = 會員一覽.php">
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
        elseif($_GET['method']=="delete")
        {
            $member_id=$_GET['member_id'];
            $link = mysqli_connect('localhost', 'root');
            mysqli_select_db($link,"webtest");
      
	        $sql = "delete from member where member_id='$member_id'";
            if(mysqli_query($link,$sql))
                {
                    echo"刪除完成";
                }else
                {
                    echo"刪除失敗";
                }
        }

    ?>
</body>
</html>