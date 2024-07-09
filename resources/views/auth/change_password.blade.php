@extends('home')
@section('content')
    <div class="container rounded h-100 p-4" style="margin: 5pt;">
        <h4 class="mb-4">Đổi mật khẩu</h4>
        <form action="{{ route('change.password') }}" method="POST">
            @csrf
            @csrf
            <div class="mb-3 row">
                <label for="oldPassword" class="col-sm-2 col-form-label">Mật khẩu cũ:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="oldPassword" name="old_password"
                        placeholder="Nhập mật khẩu cũ..." required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Mật khẩu mới:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Nhập mật khẩu mới..." required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="confirmPassword" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation"
                        placeholder="Nhập lại mật khẩu mới..." required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
            </div>
            <p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </p>
        </form>
        <hr class="my-5">
    </div>
@endsection
