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
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Reset Password</h2>
                    <form method="POST" action="{{ route('doReset') }}">
                        @csrf
                        <!-- Trường email ẩn -->
                        <input type="hidden" name="email" value="{{ request()->query('email') }}">
                        <!-- Trường token ẩn -->
                        <input type="hidden" name="token" value="{{ request()->query('token') }}">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="New Password" required>
                            @error('password')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm New Password" required>
                            @error('password_confirmation')
                                <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="color: black">Reset Password</button>
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
