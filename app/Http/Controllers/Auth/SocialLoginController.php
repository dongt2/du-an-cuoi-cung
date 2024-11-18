<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mail\MailBase;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function loginUsingSocial($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callbackFromSocial($provider): \Illuminate\Http\RedirectResponse
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        Auth::guard( 'web' )->loginUsingId($user->id);
        return redirect()->route('fe.home');
    }

    function createUser($getInfo, $provider)
    {
        $user = Customer::where(['email' => $getInfo->email])->first();
        if (!$user) {
            $user = new Customer();
            $user->name = $getInfo->name;
            $user->email = $getInfo->email;
            $user->avatar_fb = $getInfo->getAvatar();
            $user->provider = $provider;
            $user->provider_id = $getInfo->id;
            $user->password = bcrypt(\Illuminate\Support\Str::slug($getInfo->name) . '@1234');
            $user->status = 1;
            $user->created_at = time();
            $user->save();
                #gửi mail đăng nhập nhành công
            /*$tpl = [
                'subject' => 'Đăng nhập thành công trên English-books-kids',
                'template' => 'mails.mail_sucess_login',
                'account' => $user->email,
                'link' => 'https://englishbookskids.com/',
                'password' => \Illuminate\Support\Str::slug($getInfo->name) . '@book',
                'user' => $user->name . ' : ' . $user->email,
            ];
            Mail::to($user->email)->cc(['thanhadhp2000@gmail.com'])->send(new MailBase($tpl));*/
        }
        return $user;
    }
}
