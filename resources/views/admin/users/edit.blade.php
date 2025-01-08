@extends('admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
</head>
<body>
<h1>Sửa thông tin người dùng</h1>

<form action="{{ route('users.update', $users->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $users->username }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ $users->email }}" required>

    <button type="submit">Update</button>
</form>
</body>
</html>
@endsection
