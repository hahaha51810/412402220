<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content = "3;url=登入.html">
</head>
<body>
    <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $_SESSION['account']=" ";
    $_SESSION['password']=" ";
    session_destroy();
    echo "登出成功"
?>
    </body>
</html>