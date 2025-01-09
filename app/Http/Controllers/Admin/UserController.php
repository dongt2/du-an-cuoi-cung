<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.user.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:50',
            'avata' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|digits_between:10,15',
            'address' => 'required|string|max:255',
            'role' => 'required|in:Admin,Khach Hang,Nguoi Dung',
            'is_active' => 'required|boolean',
            'is_vip' => 'required|boolean',
        ]);


        $path = null;
        if ($request->hasFile('avata')) {
            $image = $request->file('avata');
            $newName = time() . '.' . $image->getClientOriginalName();

            $path = $image->storeAs('images/user', $newName, 'public');
        }

        $data = [
            'username' => $request->username,
            'avata' => $path,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'is_active' => $request->is_active,
            'is_vip' => $request->is_vip,
        ];
        User::create($data);
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('user_id', $id)->first();
        return view('admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::where('user_id', $id)->first();
        $request->validate([
            'username' => 'required|string|min:3|max:50',
            'avata' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($data->user_id, 'user_id'),
            ],
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|digits_between:10,15',
            'address' => 'required|string|max:255',
            'role' => 'required|in:Admin,Khach Hang,Nguoi Dung',
            'is_active' => 'required|boolean',
            'is_vip' => 'required|boolean',
        ]);

        $user = User::where('user_id', $id)->first();
        $path = $user->avata;

        if ($request->hasFile('avata')) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            //Lưu ảnh mới
            $image = $request->file('avata');
            $newName = time() . '.' . $image->getClientOriginalName();

            $path = $image->storeAs('images/user', $newName, 'public');
        }

        $data = [
            'username' => $request->username,
            'avata' => $path,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'is_active' => $request->is_active,
            'is_vip' => $request->is_vip,
        ];
        $user->update($data);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('user_id', $id)->delete();
        return redirect()->route('admin.user.index');
    }
}
