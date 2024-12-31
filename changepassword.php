<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content = "2.5; url = 登入.html">
  <?php
session_start();
$member_id = $_SESSION["member_id"] ?? "N/A";
?>

</head>
<body>
    <p align = center>
    <?php
        

        if(empty($_GET['method']))
        {
            //修改
            $password = $_POST['password'];
            
            

            //Step 1
            $link = mysqli_connect('localhost', 'root','','webtest');
            //Step 3
            $sql = "update member set password='$password'where member_id = '$member_id'";
            
            if(mysqli_query($link,$sql))
                {
                    echo"變更密碼成功";
                }else
                {
                    echo"修改失敗";
                }
        }
        

    ?>
</body>
</html>