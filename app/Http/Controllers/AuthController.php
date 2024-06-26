<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showFormLogin() {
        return view("auth.login");
    }

    public function doLogin(Request $request) {
        $vadidate = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'min:6|max:255',
        ], [
            'email.email' => 'Email không đúng định dạng',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không được quá 255 ký tự',
        ]);
        if (auth()->attempt($vadidate)) {
            request()->session()->regenerate();
            return redirect()->route("home");
        }
        return redirect()->route('showFormLogin')->withErrors([
            'error' => 'Tài khoản hoặc mật khẩu không đúng!'
        ]);
    }

    public function showFormForget() {
        return view('auth.forgot');
    }

    public function doForget(Request $request) {
        $validate = $request->validate([
            'email' => 'required|email'
        ]);
        $user = DB::select("SELECT * FROM users WHERE email = ?", [$request->email]);
        if (count($user) > 0) {
            $user = $user[0];
            $token = Str::random(60);
            DB::insert("INSERT INTO password_reset_tokens (email, token) VALUES (?, ?)", [$user->email, $token]);
            $url = url('/reset-mat-khau?email=' . $user->email . '&token=' . $token);
            $messageBody = "<p>Để lấy lại mật khẩu ấn vào link:</p><a href=\"$url\">$url</a>";

            Mail::html($messageBody, function ($message) use ($user) {
                $message->to($user->email, $user->name)->subject('Reset Password');
            });

            return redirect()->back()->with('success', 'Email has been sent');
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function showFormReset(Request $request) {
        $email = $request->query('email');
        $token = $request->query('token');
        $reset = DB::select("SELECT * FROM password_reset_tokens WHERE email = ? AND token = ?", [$email, $token]);
        if (count($reset) > 0) {
            return view('auth.reset', ['email' => $email, 'token' => $token]);
        } else {
            return redirect()->back()->with('error', 'Invalid reset link');
        }
    }

    public function doReset(Request $request) {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        $user = DB::select("SELECT * FROM users WHERE email = ?", [$request->email]);
        if (count($user) > 0) {
            $user = $user[0];
            DB::update("UPDATE users SET password = ? WHERE email = ?", [bcrypt($request->password), $request->email]);
            DB::delete("DELETE FROM password_reset_tokens WHERE email = ?", [$request->email]);
            return redirect()->route('showFormLogin')->with('success', 'Password has been reset');
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }
}
