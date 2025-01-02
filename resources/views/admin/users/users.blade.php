<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
    <script>
        // Chọn tất cả checkbox
        function toggleAll(source) {
            checkboxes = document.querySelectorAll('.user-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = source.checked);
        }
    </script>
</head>
<body>
<h1>Danh sách người dùng</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
@if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

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
</form>
</body>
</html>
