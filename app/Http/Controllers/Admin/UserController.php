<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' =>[
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\pL\s]+$/u',
                'unique:users,username'
            ],
            'password' => [
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email',
            ],
            'phone' => [
                'required',
                'regex:/^(\+84|0)([3|5|7|8|9])([0-9]{8})$/',
                'unique:users,phone',
            ],
            'address' => [
                'required',
            ],
            'role' => [
                'required',
            ],
            'is_active' => [
                'required',
            ],
            'is_vip' => [
                'required',
            ],
            'imgavata' => [
                'required',
            ]
        ], [
                'username.required' => 'Không được bỏ trống*',
                'username.string' => 'Trường tên phải là chuỗi ký tự.',
                'username.min' => 'Trường tên phải có ít nhất 3 ký tự.',
                'username.max' => 'Trường tên không được vượt quá 255 ký tự.',
                'username.regex' => 'Trường tên không được chứa ký tự đặc biệt.',
                'username.unique' => 'Tên đã có trong cơ sở dữ liệu',

                'password.required' => 'Không được bỏ trống*',


                'email.required' => 'Không được bỏ trống*',
                'email.unique' => 'Email đã có trong csdl',

                'phone.required' => 'Không được bỏ trống*',
                'phone.regex' => 'Số điện thoại không hợp lệ',
                'phone.unique' => 'Email đã có trong csdl',

                'address.required' => 'Không được bỏ trống*',

                'role.required' => 'Không được bỏ trống*',

                'is_active.required' => 'Không được bỏ trống*',


                'imgavata.required' => 'Không được bỏ trống*',

        ]);

        $linkImage = '';
        if ($request->hasFile('imgavata')) {
            $image = $request->file('imgavata');
            $name = time().'.'.$image->getClientOriginalExtension();  // đổi tên trống trùng
            $destinationPath = 'imageUsers/';  // kho lưu trữ
            $image->move(public_path($destinationPath), $name);
            $linkImage = $destinationPath.$name;

        }

        $data = $request->all() + ['avata' => $linkImage];
        //dd($data);
        User::query()->create($data);
        return redirect()->route('admin.users.index')->with('success', 'Thao tác thành công, ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.update', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' =>[
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\pL\s]+$/u',

            ],
            'password' => [
                'required',
                'string',
            ],
            'email' => [
                'required',

            ],
            'phone' => [
                'required',
                'regex:/^(\+84|0)([3|5|7|8|9])([0-9]{8})$/',

            ],
            'address' => [
                'required',
            ],
            'role' => [
                'required',
            ],
            'is_active' => [
                'required',
            ],
            'is_vip' => [
                'required',
            ],
            'imgavata' => [
                'image',
            ]
        ], [
                'username.required' => 'Không được bỏ trống*',
                'username.string' => 'Trường tên phải là chuỗi ký tự.',
                'username.min' => 'Trường tên phải có ít nhất 3 ký tự.',
                'username.max' => 'Trường tên không được vượt quá 255 ký tự.',
                'username.regex' => 'Trường tên không được chứa ký tự đặc biệt.',


                'password.required' => 'Không được bỏ trống*',
                'password.string'  => 'Chuỗi ký tự',


                'email.required' => 'Không được bỏ trống*',

                'phone.required' => 'Không được bỏ trống*',
                'phone.regex' => 'Số điện thoại không hợp lệ',


                'address.required' => 'Không được bỏ trống*',

                'role.required' => 'Không được bỏ trống*',

                'is_active.required' => 'Không được bỏ trống*',


                'imgavata.image' => 'Ảnh đại diện phải là một file ảnh.',

        ]);

        $linkImage = $user->avata;
        if ($request->hasFile('imgavata')) {
            $image = $request->file('imgavata');
            $name = time().'.'.$image->getClientOriginalExtension();  // đổi tên trống trùng
            $destinationPath = 'imageUsers/';  // kho lưu trữ
            $image->move(public_path($destinationPath), $name);
            $linkImage = $destinationPath.$name;

        }
        if ($request->hasFile('image')) {
            if ($user->avata) {

            }
        }
        $data = $request->all() + ['avata' => $linkImage];
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'Thao tác thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->avata) {
            $filePath = public_path($user->avata);
            if (file_exists($filePath)) {
                unlink($filePath); // Xóa ảnh trực tiếp từ thư mục public
            }
        }
        $user->delete();
        return back()->with('success', 'Thao tác thành công');
    }
}
