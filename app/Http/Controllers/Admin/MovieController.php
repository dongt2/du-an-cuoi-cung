<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'required|integer|min:1|max:1000',
            'country' => 'required|string|max:100',
            'year' => 'required|integer|min:1500|max:' . date('Y'),
            'director' => 'required|string|max:255',
            'actors' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,category_id',
            'description' => 'required|string|max:1500',
            'trailer_url' => 'nullable|url',
            'release_date' => 'required|date|before_or_equal:today',
        ]);
        
        $path = null;
        if($request->hasFile('cover_image')){
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
        Movie::create($data);
        return redirect()->route('admin.movie.index');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'required|integer|min:1|max:1000',
            'country' => 'required|string|max:100',
            'year' => 'required|integer|min:1500|max:' . date('Y'),
            'director' => 'required|string|max:255',
            'actors' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,category_id',
            'description' => 'required|string|max:1500',
            'trailer_url' => 'nullable|url',
            'release_date' => 'required|date|before_or_equal:today',
        ]);
        
        $movie = Movie::where('movie_id', $id)->first();
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
        return redirect()->route('admin.movie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Movie::where('movie_id', $id)->delete();
        return redirect()->route('admin.movie.index');
    }
}
