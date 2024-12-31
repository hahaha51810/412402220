

<head>
<meta http-equiv="refresh" content = "2.5; url = 上傳課程.php">
</head>

<?php
session_start();
$member_name = $_SESSION["member_name"] ?? "N/A";
?>



<?php
// 資料庫連線設定
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtest";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("資料庫連線失敗: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseName = $_POST['course_name'];
    $courseDescription = $_POST['course_description'];
    $uploadDir = 'uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $videoFile = $_FILES['course_video'];
    $videoPath = $uploadDir . basename($videoFile['name']);

    if (move_uploaded_file($videoFile['tmp_name'], $videoPath)) {
        $stmt = $conn->prepare("INSERT INTO courses (course_name, course_description, video_path,member_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $courseName, $courseDescription, $videoPath,$member_name);

        if ($stmt->execute()) {
            echo "課程上傳成功！";
        } else {
            echo "資料儲存失敗：" . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "影片上傳失敗，請重試。";
    }
}

$conn->close();
?>
