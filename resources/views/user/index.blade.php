@extends('home')
@section('content')
    @if (Auth::user()->hasPermission('them tai khoan'))
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2">
            Thêm tài khoản</a>
    @endif
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Id</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataUser as $index => $user)
                <tr>

                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles()->pluck('name') as $rolename)
                            <label for="" class="badge bg-primary mx-1">{{ $rolename }}</label>
                        @endforeach
                    </td>
                    <td class="d-flex justify-content-center align-items-center ">
                        @if (Auth::user()->hasPermission('sua tai khoan') || $user->id === Auth::user()->id)
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm  ">Sửa</a>
                        @endif
                        @if (Auth::user()->hasPermission('xoa tai khoan') && $user->id !== Auth::user()->id)
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
