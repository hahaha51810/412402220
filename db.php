<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_upload";

// 檢查連接
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    echo "成功連線!";
  }
  catch(Exception $e) {
    echo '無法連線:$e->getMessage()';
  }