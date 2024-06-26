@extends('home')
@section('content')
    <div class="container mt-5">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Sửa tài khoản</h6>
                        <div class="form-group mb-3">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="roles">Chức vụ</label>
                            <select class="form-control" id="roles" name="roles[]" multiple>
                                <option value="">Chọn vai trò</option>
                                @foreach ($role as $roles)
                                    <option value="{{ $roles->id }}"
                                        {{ in_array($roles->id, $user_roles) ? 'selected' : '' }}>
                                        {{ $roles->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
