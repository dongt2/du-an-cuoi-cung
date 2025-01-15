<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use App\Models\Director;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Director::all();

        return view('admin.director.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.director.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDirectorRequest $request)
    {
        $data = $request->all();

        $dire = Director::create($data);

        if ($dire) {
            toastr()->success('Thao tác thành công');
        } else {
            toastr()->error('Thao tác không thành công. Vui lòng thử lại');
        }

        return redirect()->route('admin.director.index');
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
        $data = Director::findOrFail($id);

        return view('admin.director.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectorRequest $request, string $id)
    {
        $dire = Director::findOrFail($id);

        $data = $request->all();

        $dire->update($data);

        if ($dire) {
            toastr()->success('Thao tác thành công');
        } else {
            toastr()->error('Thao tác không thành công. Vui lòng thử lại');
        }

        return redirect()->route('admin.director.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dire = Director::findOrFail($id);

        $dire->delete();

        if ($dire) {
            toastr()->success('Thao tác thành công');
        } else {
            toastr()->error('Vui lòng thử lại sau');
        }

        return redirect()->route('admin.director.index');
    }

    public function trashed() {
        $data = Director::onlyTrashed()->get();

        return view('admin.director.trashed', compact('data'));
    }

    public function restore(string $id) {
        $director = Director::withTrashed()->findOrFail($id);

        $director->restore();

        if($director){
            toastr()->success('Khôi phục dữ liệu thành công');
        }else{
            toastr()->error('Vui lòng thử lại');
        }

        return redirect()->route('admin.director.index');
    }

    public function forceDelete(string $id) {

        $director = Director::withTrashed()->findOrFail($id);

        $director->forceDelete();

        if($director){
            toastr()->success('Xóa dữ liệu thành công');
        }else{
            toastr()->error('Vui lòng thử lại');
        }

        return redirect()->route('admin.director.trashed');
    }
}
