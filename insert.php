<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content = "2.5; url = 會員一覽.php">
</head>
<body>
<p align = center>
    <?php
        $member_id = $_POST['member_id'];
        $account = $_POST['account'];
        $member_name = $_POST['member_name'];
        $role = $_POST['role'];
        $gender = $_POST['gender'];
        $join_date = date('Y-m-d');
        $link = mysqli_connect('localhost', 'root');
        mysqli_select_db($link,"webtest");
    
        $sql = "insert into member (member_id, account, password, member_name, gender, role, join_date) values ('$member_id', '$account', '123', '$member_name', '$gender' , '$role', '$join_date')";

        if(mysqli_query($link,$sql))
            {
                echo"新增完成";

            }

        else
          {
            echo"新增失敗";
          }  
    ?>
</body>
</html>


