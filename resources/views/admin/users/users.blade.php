@extends('admin.master')
@section('title')
{{"Users"}}
@endsection
@section('content')
@include('admin.components.alert')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Users</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </div>
</div>
<form action="{{ route('users.index') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" style=" max-width: 500px" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button class="fas fa-search" style="color: white; background: mediumspringgreen"  type="submit" id="button-addon2"> Tìm kiếm</button>
        <a href="{{ route('register') }}" class="btn btn-primary" style="color: white; background: blue; margin-left: 1500px" type="button" id="button-addon2">
            <i class="fas fa-address-book"></i>
            {{__(' Tạo mới')}}
        </a>
    </div>

</form>
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
                        <button type="submit" name="action" value="delete" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this item?')"><i class="fas fa-trash-alt"></i>  Xóa
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
@endsection
