<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Mail\NewUserNotification;
//use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'username.required' => 'Bắt buộc phải có tên',
            'username.string' => 'Tên phải là chuỗi',
            'username.max' => 'Tên không được vượt quá 255 ký tự',
            'email.required' => 'Bắt buộc phải có email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được vượt quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bắt buộc phải có mật khẩu',
            'password.string' => 'Mật khẩu phải là chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ]);

//        dd($data);
        $user = User::query()->create($data);

//        Mail::to($user->email)->send(new NewUserNotification($user));

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

}
