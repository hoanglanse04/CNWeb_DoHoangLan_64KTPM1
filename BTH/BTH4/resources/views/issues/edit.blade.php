<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Posts</title>
</head>

<body>


    <h1 style="margin: 50px 50px">Thêm Đồ án mới</h1>
    <form action="{{ route('update', $issue->id) }}" method="POST" style="margin: 50px 50px">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label for="computer_id" class="form-label">Máy tính</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                        {{ $computer->computer_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <input type="hidden" name="model" value="{{ $issue->model }}">
        </div>

        <div class="mb-3">
            <label for="report_by" class="form-label">Báo cáo sự cố</label>
            <input type="text" class="form-control" id="report_by" name="report_by" value="{{ $issue->report_by }}"
                required>
        </div>

        <div class="mb-3">
            <label for="report_date" class="form-label">Thời gian báo cáo</label>
            <input type="datetime-local" class="form-control" id="report_date" name="report_date"
                value="{{ $issue->report_date}}" required>
        </div>

        <div class="mb-3">
            <label for="urgency" class="form-label">Mức độ sự cố</label>
            <select class="form-control" id="urgency" name="urgency" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái hiện tại</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="Inprogress" {{ $issue->status == 'Inprogress' ? 'selected' : '' }}>Inprogress</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>


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