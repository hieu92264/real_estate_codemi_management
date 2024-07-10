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
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
                    <h2 class="centered-title">Login</h2>
                    <form method="POST" action="{{ route('doLogin') }}">
                        @csrf
                        <p>
                            {{-- <input type="text" name="email" placeholder="Email"> --}}
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required autofocus>
                        </p>
                        <p>
                            <input type="password" name="password" placeholder="Password">
                        </p>
                        <p>
                            <input class="btn btn-custom" type="submit" value="Đăng nhập" />
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
                </div>
            </div>
        </div>
    </div>
</body>

</html>
