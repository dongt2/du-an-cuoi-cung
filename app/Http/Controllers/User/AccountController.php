<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Ticket;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function showAccountInfo()
    {
        $user = Auth::user();
        return view('user.accounts.account', compact('user'));
    }

    public function updateAccountInfo()
    {
        $user = Auth::user();
        return view('user.accounts.update', compact('user'));
    }

    public function updateAccountInfoStore()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->username = request('name');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->address = request('address');

        if (request('old_password') && !\Hash::check(request('old_password'), $user->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu cũ không chính xác'])->withInput();
        } else if (request('new_password')) {
            $user->password = \Hash::make(request('new_password'));
        } else {
            $user->password = $user->password;
        }

        $user->save();
        return redirect()->route('account.info')->with('success', 'Cập nhật thông tin tài khoản thành công');
    }


    public function showBookingHistory()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->user_id)->get()->sortByDesc('created_at');
        return view('user.accounts.booking-history', compact('bookings'));
    }

    public function showBookingDetail($id)
    {
        $booking = Ticket::where('booking_id', $id)->get();
        dd($booking);
        return view('user.accounts.booking-detail', compact('booking'));
    }

}
