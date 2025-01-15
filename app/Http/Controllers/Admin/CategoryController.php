<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();

        return view('admin.category.list', data: compact('data'));
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
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        Category::create($data);

        return redirect()->route('admin.category.index')->with('success', 'Thao tác thành công');
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
        $data = Category::findOrFail($id);

        return view('admin.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $cat = Category::findOrFail($id);

        $data = $request->all();

        $cat->update($data);

        return redirect()->route('admin.category.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category::findOrFail($id);

        $movieCount = $cat->movies()->count();


        $cat->delete();

        toastr()->success('Thao tác thành công');


        return redirect()->route('admin.category.index');
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->get();

        return view('admin.category.trashed', compact('categories'));
    }

    public function restore(string $id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        $category->restore();

        return redirect()->route('admin.category.index')->with('success', 'Khôi phục dữ liệu thành công');
    }

    public function forceDelete(string $id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        $category->forceDelete();

        return redirect()->route('admin.category.index')->with('success', 'Đã xóa thành công');
    }
}
