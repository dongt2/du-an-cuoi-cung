<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use App\Models\Director;
use Illuminate\Http\Request;

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

        if($dire){
            toastr()->success('Thao tác thành công');
        }else{
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

        if($dire){
            toastr()->success('Thao tác thành công');
        }else{
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

        $direactorCount = $dire->director()->count();

        if ($direactorCount == 0) {
            $dire->delete();

            toastr()->success('Thao tác thành công');
        }else{
            toastr()->error('Thao tác không thành công vì đạo diễn này vẫn còn liên kết');
        }

        return back();
    }
}
