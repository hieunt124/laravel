<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
</head>
<body>
<h1>Sửa thông tin người dùng</h1>

<form action="{{ route('users.update') }}" method="POST">
    @csrf
    @method('POST')

    @foreach ($users as $user)
        <div style="margin-bottom: 20px; border: 1px solid #ddd; padding: 10px;">
            <p><b>ID:</b> {{ $user->id }}</p>
            <label for="user-name-{{ $user->id }}">Tên:</label>
            <input type="text" id="user-name-{{ $user->id }}" name="users[{{ $user->id }}][name]" value="{{ $user->username }}">
            <br>
            <label for="user-email-{{ $user->id }}">Email:</label>
            <input type="email" id="user-email-{{ $user->id }}" name="users[{{ $user->id }}][email]" value="{{ $user->email }}">
        </div>
    @endforeach

    <button type="submit" style="padding: 10px 15px;">Lưu thay đổi</button>
</form>
</body>
</html>
