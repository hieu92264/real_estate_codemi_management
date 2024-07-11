@extends('home')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('users.store') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-8 col-xl-6">
                    <div class="bg-light rounded h-100 p-4"
                        style="border: 1px solid #db5151; box-shadow: 0 4px 8px rgba(200, 0, 0, 0.5);">
                        <h4 class="mb-4 text-center">Thêm mới tài khoản</h4>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập họ và tên.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập địa chỉ email hợp lệ.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập mật khẩu.
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="roles" class="form-label">Chức vụ</label>
                            <select class="form-control" id="roles" name="roles[]" multiple required>
                                <option value="">Chọn vai trò</option>
                                @foreach ($role as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn ít nhất một vai trò.
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
