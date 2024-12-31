<?php
// 資料庫連線
$link = mysqli_connect('localhost', 'root', '', 'webtest');
if (!$link) {
    die("資料庫連線失敗：" . mysqli_connect_error());
}

// 接收 POST 資料
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $student_name = mysqli_real_escape_string($link, $data['student_name']);
    $course_id = intval($data['course_id']);
    $watch_time = intval($data['watch_time']);

    // 插入或更新觀看時長
    $sql = "
        INSERT INTO watch_records (student_name, course_id, watch_time)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE watch_time = watch_time + VALUES(watch_time)
    ";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("sii", $student_name, $course_id, $watch_time);

    if ($stmt->execute()) {
        echo "觀看紀錄更新成功";
    } else {
        echo "紀錄更新失敗：" . $stmt->error;
    }

    $stmt->close();
}

$link->close();
?>
