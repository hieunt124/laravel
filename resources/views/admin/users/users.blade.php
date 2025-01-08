@extends('admin.master')
@section('title')
{{"Users"}}
@endsection
@section('content')
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Danh sách người dùng</title>--}}
{{--    <style>--}}
{{--        table {--}}
{{--            width: 100%;--}}
{{--            border-collapse: collapse;--}}
{{--            margin-top: 20px;--}}
{{--        }--}}
{{--        table, th, td {--}}
{{--            border: 1px solid black;--}}
{{--        }--}}
{{--        th, td {--}}
{{--            padding: 8px;--}}
{{--            text-align: left;--}}
{{--        }--}}
{{--    </style>--}}
{{--    <script>--}}
{{--        // Chọn tất cả checkbox--}}
{{--        function toggleAll(source) {--}}
{{--            checkboxes = document.querySelectorAll('.user-checkbox');--}}
{{--            checkboxes.forEach(checkbox => checkbox.checked = source.checked);--}}
{{--        }--}}
{{--    </script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Danh sách người dùng</h1>--}}

{{--@if (session('success'))--}}
{{--    <p style="color: green;">{{ session('success') }}</p>--}}
{{--@endif--}}
{{--@if (session('error'))--}}
{{--    <p style="color: red;">{{ session('error') }}</p>--}}
{{--@endif--}}

{{--<form action="{{ route('users.action') }}" method="POST">--}}
{{--    @csrf--}}
{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th><input type="checkbox" onclick="toggleAll(this)"></th>--}}
{{--            <th>ID</th>--}}
{{--            <th>Tên</th>--}}
{{--            <th>Email</th>--}}
{{--            <th>Ngày Tạo</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @forelse ($users as $user)--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <input type="checkbox" class="user-checkbox" name="user_ids[]" value="{{ $user->id }}">--}}
{{--                </td>--}}
{{--                <td>{{ $user->id }}</td>--}}
{{--                <td>{{ $user->username }}</td>--}}
{{--                <td>{{ $user->email }}</td>--}}
{{--                <td>{{ date('d-m-Y H:i', strtotime($user->created_at)) }}</td>--}}
{{--            </tr>--}}
{{--        @empty--}}
{{--            <tr>--}}
{{--                <td colspan="5" style="text-align: center;">Không có người dùng nào.</td>--}}
{{--            </tr>--}}
{{--        @endforelse--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    <div style="margin-top: 20px;">--}}
{{--        <button type="submit" name="action" value="edit" style="padding: 5px 10px;">Sửa</button>--}}
{{--        <button type="submit" name="action" value="delete" style="padding: 5px 10px; background-color: red; color: white;">Xóa</button>--}}
{{--    </div>--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}
{{--@endsection--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- jsGrid -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/jsgrid/jsgrid.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/jsgrid/jsgrid-theme.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/adminlte.min.css')}}">
    <style>
        /* Thiết lập body */
        /*body {*/
        /*    font-family: Arial, sans-serif;*/
        /*    line-height: 1.6;*/
        /*    background-color: #f4f4f9;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: center;*/
        /*    height: 100vh;*/
        /*}*/

        /* Container cho bảng */
        .pagination .active {
            color: red;
            font-weight: bold;
        }
        /*.pagination .page-item .page-link {*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*}*/

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            padding: 10px;
            border-radius: 5px;
        }
        .pagination .page-link svg {
            vertical-align: middle;
            width: 16px;
            height: 16px;
        }
        .table-container {
            width: 80%;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Thiết kế bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 5px;
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        tr {
            border-bottom: 1px solid #dddddd;
        }

        tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }

        /* Nút hành động */
        .btn {
            padding: 5px 10px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<form action="{{ route('users.action') }}" method="POST">
    @csrf
    <table>
        <thead>
        <tr>
            <th><input type="checkbox" onclick="toggleAll(this)"></th>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>
                    <input type="checkbox" class="user-checkbox" name="user_ids[]" value="{{ $user->id }}">
                </td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('d-m-Y H:i', strtotime($user->created_at)) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center;">Không có người dùng nào.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        <button type="submit" name="action" value="edit" style="padding: 5px 10px;">Sửa</button>
        <button type="submit" name="action" value="delete" style="padding: 5px 10px; background-color: red; color: white;">Xóa</button>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing records
                {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}
            </div>
        </div>
        @include('admin.pages')
    </div>
</form>

<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
</body>
</html>
@endsection
