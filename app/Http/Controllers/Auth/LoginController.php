<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->type == '1'){
                return redirect()->intended('admin/home');
            }

            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không chính xác!',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        \request()->session()->invalidate();

        return redirect('/');
    }
}
