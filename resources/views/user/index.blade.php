@extends('home')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Auth::user()->hasPermission('them tai khoan'))
        <div class="d-flex justify-content-end my-2 mr-3">
            <a href="{{ route('users.create') }}" class="btn btn-success mb-3" style="margin-right:20px; margin-top:20px">
                Thêm tài khoản</a>
        </div>
    @endif

    <div class="row mb-3 justify-content-center">
        <div class="col-12 col-md-6">
            <form action="{{ route('search') }}" method="GET" class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm">
                <button type="submit" class="btn btn-success">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center custom-table">
            <thead class="custom-header">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Chức vụ</th>
                    @if (Auth::user()->hasPermission('Sửa tài khoản') || Auth::user()->hasPermission('Xóa tài khoản'))
                        <th scope="col">Hành động</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($dataUser as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles()->pluck('name') as $rolename)
                                <label class="badge bg-success mx-1">{{ $rolename }}</label>
                            @endforeach
                        </td>
                        <td class="action-buttons">
                            @if (Auth::user()->hasPermission('Sửa tài khoản'))
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            @endif
                            @if (Auth::user()->hasPermission('Xóa tài khoản') && $user->id !== Auth::user()->id)
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có muốn xóa chức vụ này không');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $dataUser->links('pagination::bootstrap-4') }}
    </div>
@endsection
