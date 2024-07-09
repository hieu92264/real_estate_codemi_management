<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login Test</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Login Form Template" name="keywords">
    <meta content="Login Form Template" name="description">

    <link href="{{ asset('auth/img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="wrapper login-3">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2><img src="{{ asset('auth/img/logo_codemi.png') }}" alt="Logo"></h2>
                    {{-- <p>
                        Lấy lại mật khẩu
                    </p> --}}
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Quên mật khẩu</h2>
                    <form method="POST" action="{{ route('doForget') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Input field" required>
                            @error('email')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <input class="btn btn-custom" type="submit" value="Gửi Email xác nhận" />
                    </form>
                    <p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('failed'))
                            <div class="alert alert-success">
                                {{ session('failed') }}
                            </div>
                        @endif
                    </p>

                    <p>
                        <a href="{{ route('showFormLogin') }}">Back to Login</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
