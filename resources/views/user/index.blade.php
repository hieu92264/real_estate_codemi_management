@extends('home')
@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2">Thêm chức vụ</a>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Id</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataUser as $index => $user)
                <tr>

                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $dataUser->links('pagination::bootstrap-4') }}
    </div>
@endsection
