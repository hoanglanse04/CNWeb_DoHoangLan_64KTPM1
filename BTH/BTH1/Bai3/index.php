<!DOCTYPE html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#ffffff" />
	<title>Câu hỏi Ôn tập</title>
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
		<h1 class="text-center">Thông Tin Sinh Viên</h1>

		<?php

		$filename = "./sinhvien.csv";


		$sinhvien = [];
//Lưu ý khi đọc dữ liệu,dữ liệu sẽ có  BOM (Byte Order Mark) vậy phải bỏ kí tự đó để username không bị sai
		// Kiểm tra nếu tệp CSV có thể mở được
		if (file_exists($filename) && ($handle = fopen($filename, "r")) !== FALSE) {
			// Đọc một số byte đầu tiên để kiểm tra BOM (nếu có)
			$bom = fread($handle, 3);
			if ($bom == "\xEF\xBB\xBF") {
				// Nếu có BOM, bỏ qua 3 byte BOM
				$headers = fgetcsv($handle, 1000, ",");
			} else {
				// Nếu không có BOM, quay lại và đọc dòng tiêu đề bình thường
				rewind($handle); // Đưa con trỏ về đầu tệp
				$headers = fgetcsv($handle, 1000, ",");
			}

			// Kiểm tra nếu có dữ liệu tiêu đề
			if ($headers !== FALSE) {
				// Đọc từng dòng dữ liệu và thêm vào mảng
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

					// Nếu dữ liệu không đầy đủ, bỏ qua dòng đó
					if (count($data) === count($headers)) {
						$sinhvien[] = array_combine($headers, $data);
					}
				}
			}

			fclose($handle); 
		} else {
			echo "<div class='alert alert-danger' role='alert'>Không thể mở tệp CSV hoặc tệp không tồn tại.</div>";
		}

		?>

		<table class="table table-bordered table-striped">
			<thead class="table">
				<tr>
					<th>Username</th>
					<th>Password</th>
					<th>Họ</th>
					<th>Tên</th>
					<th>Thành phố</th>
					<th>Email</th>
					<th>Khóa học</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Hiển thị dữ liệu sinh viên từ mảng
				if (!empty($sinhvien)) {
					foreach ($sinhvien as $sv) {
						// Kiểm tra tồn tại của các trường trước khi hiển thị
						$username = isset($sv['username']) ? $sv['username'] : 'N/A';
						$password = isset($sv['password']) ? $sv['password'] : 'N/A';
						$lastname = isset($sv['lastname']) ? $sv['lastname'] : 'N/A';
						$firstname = isset($sv['firstname']) ? $sv['firstname'] : 'N/A';
						$city = isset($sv['city']) ? $sv['city'] : 'N/A';
						$email = isset($sv['email']) ? $sv['email'] : 'N/A';
						$course1 = isset($sv['course1']) ? $sv['course1'] : 'N/A';

						echo "<tr>";
						echo "<td>{$username}</td>";
						echo "<td>{$password}</td>";
						echo "<td>{$lastname}</td>";
						echo "<td>{$firstname}</td>";
						echo "<td>{$city}</td>";
						echo "<td>{$email}</td>";
						echo "<td>{$course1}</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='7' class='text-center'>Không có dữ liệu để hiển thị</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>




</body>
<?php
include 'footer.php';
?>
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