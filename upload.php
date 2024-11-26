<?php
// Thư mục đích để lưu tệp tải lên
$target_dir = "uploads/";

// Xử lý tệp tải lên
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["fileToUpload"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên thành công.";
    } else {
        echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
    }
}

 ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên và Xem hình ảnh</title>
</head>
<body>
  
    
    <h2>Hình ảnh đã tải lên</h2>
    <?php

    ?>
</body>
</html>
