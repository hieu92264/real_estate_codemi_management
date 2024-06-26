@extends('home')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Thêm mới người dùng</h6>
                        <div class="form-group mb-3">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="roles">Chức vụ</label>
                            <select class="form-control" id="roles" name="roles[]" multiple>
                                <option value="">Chọn vai trò</option>
                                @foreach ($role as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
