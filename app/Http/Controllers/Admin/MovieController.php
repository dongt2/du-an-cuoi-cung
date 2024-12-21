<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = Movie::latest()->paginate(5);

        return view('admin.movies.index', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();

        return view('admin.movies.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $linkImage = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();  // đổi tên trống trùng
            $destinationPath = 'imageMovies/';  // kho lưu trữ
            $image->move(public_path($destinationPath), $name);
            $linkImage = $destinationPath.$name;

        }

        $data = $request->all() + ['cover_image' => $linkImage];
        Movie::create($data);
        //dd($data);

        return redirect()->route('admin.movie.index')->with('success', 'Thêm phim thành công, ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::get();
        $movie = Movie::findOrFail($id);
        return view('admin.movies.show', compact('category', 'movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::get();
        $movie = Movie::findOrFail($id);

        return view('admin.movies.update', compact('category', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::findOrFail($id);

        $linkImage = $movie->cover_image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();  // đổi tên trống trùng
            $destinationPath = 'imageMovies/';  // kho lưu trữ
            $image->move(public_path($destinationPath), $name);
            $linkImage = $destinationPath.$name;

        }

        $data = $request->all() + ['cover_image' => $linkImage];
        $movie->update($data);
        //dd($data);

        return redirect()->route('admin.movie.index')->with('success', 'Sửa phim thành công, ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        if($movie->cover_image){
            $filePath = public_path($movie->cover_image);
            if (file_exists($filePath)) {
                unlink($filePath); // Xóa ảnh trực tiếp từ thư mục public
            }
        }
        $movie->delete();
        return redirect()->route('admin.movie.index')->with('success', 'Xóa sản phẩm thành công. ');
    }
}
