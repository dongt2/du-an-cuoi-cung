<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
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
        $data = Movie::all();

        return view('admin.movie.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();

        return view('admin.movie.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $path = null;

        if($request->hasFile('cover_image')){

            $image = $request->file('cover_image');

            $newName = time().'.'.$image->getClientOriginalExtension();

            $path = $image->storeAs('images/movie', $newName, 'public');
        }

        $data = [
            'title' => $request->title,
            'cover_image' => $path,
            'duration' => $request->duration,
            'country' => $request->country,
            'year' => $request->year,
            'director' => $request->director,
            'actors' => $request->actors,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'trailer_url' => $request->trailer_url,
            'release_date' => $request->release_date,
        ];

        Movie::create($data);

        return redirect()->route('admin.movie.index')->with('success', 'Thao tác thành công');
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
        $data = Movie::where('movie_id', $id)->first();
        $category = Category::all();
        return view('admin.movie.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, string $id)
    {

        $movie = Movie::findOrFail($id);

        $path = $movie->cover_image;

        if($request->hasFile('cover_image')){
            // Xóa ảnh cũ
            Storage::disk('public')->delete($path);

            //Lưu ảnh mới
            $image = $request->file('cover_image');
            $newName = time().'.'.$image->getClientOriginalName();

            $path = $image->storeAs('images/movie', $newName, 'public');
        }

        $data = [
            'title' => $request->title,
            'cover_image' => $path,
            'duration' => $request->duration,
            'country' => $request->country,
            'year' => $request->year,
            'director' => $request->director,
            'actors' => $request->actors,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'trailer_url' => $request->trailer_url,
            'release_date' => $request->release_date,
        ];
        $movie->update($data);

        return redirect()->route('admin.movie.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mov = Movie::findOrFail($id);

        $mov->delete();

        return redirect()->route('admin.movie.index')->with('success', 'Thao tác thành công');
    }
}
