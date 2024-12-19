<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/alertify/alertify.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/material.css') }}" />
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/toastr/toatr.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/report.css') }}" />
<link rel="stylesheet" href="{{ asset('css/cropper.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/custom-sidebar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/custom.style.css') }}" />



<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
	<div class=" mb-3 header d-flex position-relative"></div>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row my-2">
					<div class="col-sm-6">
						<h2>Quản lý <b>Đồ án</b></h2>
					</div>
					
					<div class="col-sm-6 d-flex justify-content-end">
						<a href="{{ route('create') }}" class="btn btn-primary d-flex align-items-center"><i class="material-icons">&#xE147;</i> <span>Thêm đồ án mới</span></a>				
					</div>
				</div>
			</div>
			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Mã vấn đề</th>
                        <th>Tên máy tính</th>
                        <th>Tên phiên bản</th>
                        <th>Báo cáo sự cố</th>
                        <th>Thời gian báo cáo</th>
                        <th>Mức độ sự cố</th>
                        <th>Trạng thái hiện tại</th>
                        <th>Hành động</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->computer->computer_name }}</td>
                            <td>{{ $issue->computer->model}}</td>
                            <td>{{ $issue->report_by }}</td>
                            <td>{{ $issue->report_date }}</td>
                            <td>{{ $issue->urgency }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>
                                <a href="{{ route('edit', $issue->id) }}" class="btn btn-primary text-white">Sửa</a>
        
                                <!-- Nút xóa kèm modal xác nhận -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $issue->id }}">
                                    Xóa
                                </button>
        
                                <!-- Modal xác nhận xóa -->
                                <div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa đồ án này không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="{{ route('destroy', $issue->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
			</table>
			{{-- Phân trang nếu cần --}}
			<div class="d-flex justify-content-center">
				{{ $issues->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>        
</div>
</body>

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.fixedColumns.js') }}"></script>
<script src="{{ asset('js/fixedColumns.dataTables.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.js') }}"></script>
<script src="{{ asset('plugins/alertify/alertify.min.js') }}"></script>
<script src="{{ asset('js/layout.js') }}"></script>
<script src="{{ asset('js/const.js') }}"></script>
<script src="{{ asset('js/toast.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/report.js') }}"></script>
<script src="{{ asset('js/notification.js') }}"></script>
<script src="{{ asset('js/date-util.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/moment-vi.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/datetime-moment.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/uc-helpers.js') }}"></script>
<script src="{{ asset('js/ucform-helpers.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/cropper.js') }}"></script>
<script src="{{ asset('js/uuid.js') }}"></script>
<script src="{{ asset('js/JsBarcode.all.min.js') }}"></script>
<script src="{{ asset('js/lodash.min.js') }}"></script>
</html>