<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::paginate(5);

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => [
                'required',
                'string',
                'min:1',
                'max:25',
                'regex:/^[\pL\s]+$/u', // Chỉ cho phép chữ cái và khoảng trắng
                'unique:categories,category_name', // Kiểm tra trùng tên trong bảng `categories`
            ],
        ],
            [
                'category_name.required' => 'Trường tên không được bỏ trống',
                'category_name.string' => 'Trường tên phải là chuỗi ký tự.',
                'category_name.min' => 'Trường tên phải có ít nhất 3 ký tự.',
                'category_name.max' => 'Trường tên không được vượt quá 25 ký tự.',
                'category_name.regex' => 'Trường tên không được chứa ký tự đặc biệt.',
                'category_name.unique' => 'Tên danh mục đã tồn tại.', // Thông báo lỗi khi bị trùng
            ]);
        $data = $request->all();

        Category::create($data);

        // dd($data);
        return redirect()->route('admin.category.index')->with('success', 'Thêm sản phẩm thành công. ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => [
                'required',
                'string',
                'min:1',
                'max:25',
                'regex:/^[\pL\s]+$/u', // Chỉ cho phép chữ cái và khoảng trắng
                'unique:categories,category_name', // Kiểm tra trùng tên trong bảng `categories`
            ],
        ],
            [
                'category_name.required' => 'Trường tên không được bỏ trống',
                'category_name.string' => 'Trường tên phải là chuỗi ký tự.',
                'category_name.min' => 'Trường tên phải có ít nhất 3 ký tự.',
                'category_name.max' => 'Trường tên không được vượt quá 25 ký tự.',
                'category_name.regex' => 'Trường tên không được chứa ký tự đặc biệt.',
                'category_name.unique' => 'Tên danh mục đã tồn tại.', // Thông báo lỗi khi bị trùng
            ]);
        $data = $request->all();

        $category->update($data);

        return redirect()->route('admin.category.index')->with('success', 'Sửa thể loại thành công. ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if($category->movies()->count() == 0){
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Xóa thể loại thành công. ');
        }
        return redirect()->route('admin.category.index')->with('errors', 'Không thể xóa. ');
    }
}
