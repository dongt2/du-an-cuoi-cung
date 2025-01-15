<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::all();

        return view('admin.review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        if($review){
            toastr()->success('Thao tác thành công');
        }

        return redirect()->route('admin.review.index');
    }

    public function trashed()
    {
        $review = Review::onlyTrashed()->get();

        return view('admin.review.trashed', compact('review'));
    }

    public function restore(string $id)
    {
        $review = Review::withTrashed()->findOrFail($id);

        $review->restore();

        return redirect()->route('admin.review.index')->with('success', 'Khôi phục dữ liệu thành công');
    }

    public function forceDelete(string $id)
    {
        $review = Review::withTrashed()->findOrFail($id);

        $review->forceDelete();

        return redirect()->route('admin.review.index')->with('success', 'Đã xóa thành công');
    }
}
