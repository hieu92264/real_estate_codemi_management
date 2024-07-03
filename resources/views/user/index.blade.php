@extends('home')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Auth::user()->hasPermission('them tai khoan'))
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2">
            Thêm tài khoản</a>
    @endif
    <div class="row">
        <div class="col-3">
            <form action="{{ route('search') }} " method="GET" class="form-inline float-right">
                <div class="form-group mb-2">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm">
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-2">Tìm kiếm</button>
            </form>
        </div>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                {{-- <th scope="col">Id</th> --}}
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
                    {{-- <td>{{ $user->id }}</td> --}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles()->pluck('name') as $rolename)
                            <label for="" class="badge bg-primary mx-1">{{ $rolename }}</label>
                        @endforeach
                    </td>
                    <td class="d-flex justify-content-center align-items-center ">
                        @if (Auth::user()->hasPermission('Sửa tài khoản'))
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm  ">Sửa</a>
                        @endif
                        @if (Auth::user()->hasPermission('Xóa tài khoản') && $user->id !== Auth::user()->id)
                            <form style="margin-left: 5px" action="{{ route('users.destroy', $user->id) }}" method="POST"
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
    <div>
        {{ $dataUser->links('pagination::bootstrap-4') }}
    </div>
@endsection
