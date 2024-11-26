<!-- about.php -->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<?php include('header.php'); ?>

<body>
    <div class="container">
    <h1>Xử lý ảnh</h1>
    <div class="row">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Chọn ảnh để tải lên:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Tải lên Ảnh" name="submit">
        </form>
    </div>
    </div>
</body>


<?php include('footer.php'); ?>