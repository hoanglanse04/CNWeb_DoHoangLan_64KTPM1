
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?= time(); ?>">
    <title>Quản lý nhân viên</title>
</head>

    <header class="header-content">
        <h1>Administration</h1>
        <?php 
        $current_page = basename($_SERVER['PHP_SELF'])
        ?>
        <nav>
            <ul class="menu">
                <li><a href="/KTPM1-HL/index.php" class="active">Trang chủ</a></li>
                <li><a href="/KTPM1-HL/about.php">Trang ngoài</a></li>
                <li><a href="#">Thể loại</a></li>
                <li><a href="#">Tác giả</a></li>
                <li><a href="/contact.php">Bài viết</a></li>
            </ul>
        </nav>
    </header>