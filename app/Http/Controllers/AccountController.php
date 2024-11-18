<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)->get();

        return view('account.index', compact('user', 'transactions'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ]);
           // Cập nhật thông tin người dùng
    $user->name = $request->name;
    $user->email = $request->email;
    
    // Lưu các thay đổi
    // $user->save();

        return redirect()->route('account.index')->with('success', 'Cập nhật thành công');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        // $user->save();

        return redirect()->route('account.index')->with('success', 'Password updated successfully.');
    }
}