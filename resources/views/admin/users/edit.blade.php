@extends('admin.master')
@section('content')
<h1>Sửa thông tin người dùng</h1>
@include('admin.components.alert')
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
