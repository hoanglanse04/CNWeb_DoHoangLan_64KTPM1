<!DOCTYPE html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#ffffff" />
	<title>Quản lý</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<link rel="stylesheet" href="./plugins/fontawesome/css/fontawesome.min.css" />
	<link rel="stylesheet" href="./plugins/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="./plugins/alertify/alertify.min.css" />
	<link rel="stylesheet" href="./css/line-awesome.min.css" />
	<link rel="stylesheet" href="./css/material.css" />
	<link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" href="./plugins/toastr/toatr.css" />
	<link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="./plugins/select2/css/select2.min.css" />
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/report.css" />
	<link rel="stylesheet" href="./css/cropper.min.css" />
	<link rel="stylesheet" href="./css/custom-sidebar.css" />
	<link rel="stylesheet" href="./css/custom.style.css" />
</head>

<body>

	<?php
	include 'header.php';
	?>
	<div class="container">
		<div class="card">
			<div class="card-header text-end pb-0">
				<h4 class="card-title mb-0"><button data-bs-toggle="modal" data-bs-target="#modaladd-catalog" id="btn-add-catalog" class=" btn btn-primary btn-sm"> <i class="fa-solid fa-plus"></i> Thêm sản phẩm</button></h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-nowrap mb-0">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Giá thành</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$products = array(
								['id' => 1, 'name' => 'Sản phẩm 1', 'price' => '10000'],
								['id' => 2, 'name' => 'Sản phẩm 2', 'price' => '20000'],
								['id' => 3, 'name' => 'Sản phẩm 3', 'price' => '30000'],
							);
							foreach ($products as $product): ?>
								<tr>
									<td><?= $product['name'] ?></td>
									<td><?= $product['price'] ?> VND</td>
									<td>
										<a href="#"><i class="fa-solid fa-pencil"></i></a>
									</td>
									<td>
										<a href="#"><i class="fa-solid fa-trash"></i></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php' ?>


</body>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/jquery.mask.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery.slimscroll.min.js"></script>
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/dataTables.bootstrap4.min.js"></script>
<script src="./js/dataTables.fixedColumns.js"></script>
<script src="./js/fixedColumns.dataTables.js"></script>
<script src="./plugins/toastr/toastr.min.js"></script>
<script src="./plugins/toastr/toastr.js"></script>
<script src="./plugins/alertify/alertify.min.js"></script>
<script src="./js/layout.js"></script>
<script src="./js/const.js"></script>
<script src="./js/toast.js"></script>
<script src="./js/config.js"></script>
<script src="./js/report.js"></script>
<script src="./js/notification.js"></script>
<script src="./js/date-util.js"></script>
<script src="./js/moment.min.js"></script>
<script src="./js/moment-vi.js"></script>
<script src="./js/bootstrap-datetimepicker.min.js"></script>
<script src="./js/datetime-moment.js"></script>
<script src="./plugins/select2/js/select2.min.js"></script>
<script src="./js/uc-helpers.js"></script>
<script src="./js/ucform-helpers.js"></script>
<script src="./js/custom.js"></script>
<script src="./js/cropper.js"></script>
<script src="./js/uuid.js"></script>
<script src="./js/JsBarcode.all.min.js"></script>
<script src="./js/lodash.min.js"></script>

</html>