@extends('home')
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="current_password">Mật khẩu của bạn</label>
                                <input id="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" required autocomplete="current-password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password">Mật khẩu mới</label>
                                <input id="new_password" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                    required autocomplete="new-password">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Nhập lại mật khẩu mới</label>
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" name="password_confirmation"
                                    required autocomplete="password_confirmation">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

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
