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

	<div class="container mt-5">
		<h1 class="text-center">Bài tập trắc nghiệm</h1>
		<?php
		$filename = "./Quiz.txt";
		$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

		$current_question = [];
		$questions_data = [];
		foreach ($questions as $line) {
			if (strpos($line, "Câu") === 0) {
				if (!empty($current_question)) {
					// Lưu câu hỏi cũ
					$questions_data[] = $current_question;
				}
				$current_question = [$line];
			} elseif (strpos($line, "Đáp án:") !== false) {
				$current_question[] = $line;
			} else {
				$current_question[] = $line;
			}
		}
		if (!empty($current_question)) {
			$questions_data[] = $current_question;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Tính điểm khi nộp bài
			$answers = [];
			foreach ($questions as $line) {
				if (strpos($line, "Đáp án:") !== false) {
					$answers[] = trim(substr($line, strpos($line, ":") + 1));
				}
			}

			$score = 0;
			foreach ($_POST as $key => $userAnswer) {
				$questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
				if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
					$score++;
				}
			}

			echo "<div class='alert alert-success text-center'>";
			echo "Bạn trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.";
			echo "</div>";
			echo '<div class="text-end">';
			echo "<a href='index.php' class='btn btn-primary'>Làm lại</a>";
			echo '</div>';
			
			
		} else {
			// Hiển thị câu hỏi
			echo "<div class='container mt-5'>";
			echo "<form method='POST' action=''>";

			foreach ($questions_data as $index => $question) {
				echo "<div class='card mb-4'>";
				echo "<div class='card-header'><strong>{$question[0]}</strong></div>";
				echo "<div class='card-body'>";
				for ($i = 1; $i <= 4; $i++) {
					$answer = substr($question[$i], 0, 1); // A, B, C, D
					echo "<div class='form-check'>";
					echo "<input class='form-check-input' type='radio' name='question" . ($index + 1) . "' value='{$answer}' id='question" . ($index + 1) . "{$answer}'>";
					echo "<label class='form-check-label' for='question" . ($index + 1) . "{$answer}'>{$question[$i]}</label>";
					echo "</div>";
				}
				echo "</div>";
				echo "</div>";
			}

			echo '<div class="text-end"><button type="submit" class="btn btn-primary">Nộp bài</button></div>';
			echo "</form>";
			echo "</div>";
		}
		?>


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