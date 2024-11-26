<?php
session_start();

// Nếu chưa có dữ liệu, khởi tạo danh sách
if (!isset($_SESSION['records'])) {
    $_SESSION['records'] = array(
        ['id' => 1, 'name' => 'Điện thoại', 'price' => '12000'],
        ['id' => 2, 'name' => 'Máy tính', 'price' => '15000'],
        ['id' => 3, 'name' => 'Phụ kiện', 'price' => '21000'],
        ['id' => 4, 'name' => 'Móc treo', 'price' => '19000'],
        ['id' => 5, 'name' => 'Cường lực', 'price' => '17000'],
    );
}

$records = &$_SESSION['records'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    // Kiểm tra action hợp lệ
    if (!$action) {
        header("Location: index.php?error=Invalid action");
        exit();
    }

    // Xử lý thêm sản phẩm
    if ($action === 'add') {
        $name = htmlspecialchars(trim($_POST['name']));
        $price = (float) $_POST['price'];

        if ($name && $price > 0) {
            $id = end($records)['id'] + 1; // Tạo ID mới
            $records[] = ['id' => $id, 'name' => $name, 'price' => $price];
            header("Location: index.php?success=Product added");
        } else {
            header("Location: index.php?error=Invalid input");
        }
        exit();
    }

    // Xử lý chỉnh sửa sản phẩm
    if ($action === 'edit') {
        $id = (int) $_POST['id'];
        $name = htmlspecialchars(trim($_POST['name']));
        $price = (float) $_POST['price'];

        foreach ($records as &$record) {
            if ($record['id'] == $id) {
                $record['name'] = $name;
                $record['price'] = $price;
                header("Location: index.php?success=Product updated");
                exit();
            }
        }
        header("Location: index.php?error=Product not found");
        exit();
    }

    // Xử lý xóa sản phẩm
    if ($action === 'delete') {
        $id = (int) $_POST['id'];

        $records = array_values(array_filter($records, fn($record) => $record['id'] != $id));
        header("Location: index.php?success=Product deleted");
        exit();
    }

    // Nếu action không hợp lệ
    header("Location: index.php?error=Invalid action");
    exit();
}
?>
