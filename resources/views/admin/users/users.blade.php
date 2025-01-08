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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- jsGrid -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/jsgrid/jsgrid.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/jsgrid/jsgrid-theme.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<form method="POST">
    @csrf
    <table>
        <thead>
        <tr>
            <th><input type="checkbox" onclick="toggleAll(this)"></th>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
            <th>Hành động</th>
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
                <td>
                    <a href="{{route('users.edit', ['id' => $user->id])}}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        {{__('Sửa')}}
                    </a>
                    <form action="{{ route('users.delete', $user->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="action" value="delete"
                                onclick="return confirm('Are you sure you want to delete this item?')"
                                style="padding: 5px 10px; background-color: red; color: white;">Xóa
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center;">Không có người dùng nào.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing records
                {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}
            </div>
        </div>
    </div>
</form>
{{$users->links('admin.components.paginate')}}
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
