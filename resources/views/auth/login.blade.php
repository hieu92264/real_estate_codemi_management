<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Login Form" name="keywords">
    <meta content="Login Form" name="description">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self';">

    <!-- Favicon -->
    <link href="{{ asset('auth/img/favicon.ico') }}" rel="icon">

    <!-- Stylesheet -->
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper login-3">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2><img src="{{ asset('auth/img/logo_codemi.png') }}" alt="Logo"></h2>
                    <p>
                        Công ty bất động sản Codemi
                    </p>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form method="POST" action="{{ route('doLogin') }}">
                        @csrf
                        <p>
                            <input type="text" name="email" placeholder="Email">
                        </p>
                        <p>
                            <input type="text" name="password" placeholder="Password">
                        </p>
                        <p>
                            <input class="btn btn-custom" type="submit" value="Sign In" />
                        </p>
                        <p>
                            Quên mật khẩu? <a href="{{ route('showFormForget') }}">CLICK HERE</a>
                        </p>
                        <p>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <p class="error-message">{{ session('error') }}</p>
                            @endif
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
