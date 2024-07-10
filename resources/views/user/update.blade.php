@extends('home')
@section('content')
    <div class="container mt-5">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-sm-12 col-xl-8">
                    <div class="bg-light rounded h-100 p-5">
                        <h4 class="mb-5 text-center">Chỉnh Sửa Tài Khoản</h4>
                        <div class="form-group mb-4">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="roles" class="form-label">Chức vụ</label>
                            <select class="form-control" id="roles" name="roles[]" multiple required>
                                <option value="">Chọn vai trò</option>
                                @foreach ($role as $roles)
                                    <option value="{{ $roles->id }}"
                                        {{ in_array($roles->id, $user_roles) ? 'selected' : '' }}>
                                        {{ $roles->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Cập Nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
