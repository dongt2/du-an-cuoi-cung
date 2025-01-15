<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Director;
use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Movie::with('categories', 'actors', 'directors')->get();

        return view('admin.movie.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();

        $actor = Actor::all();

        $director = Director::all();

        return view('admin.movie.create', compact('data', 'actor', 'director'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $path = null;

        if ($request->hasFile('cover_image')) {

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
            'description' => $request->description,
            'trailer_url' => $request->trailer_url,
            'release_date' => $request->release_date,
        ];

        $movie = Movie::create($data);

        $movie->categories()->sync($request->categories);

        $movie->actors()->sync($request->actors);

        $movie->directors()->sync($request->directors);

        return redirect()->route('admin.movie.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Movie::with(['categories', 'actors', 'directors'])->findOrFail($id);

        $category = Category::all();

        $actor = Actor::all();

        $director = Director::all();

        return view('admin.movie.show', compact('data', 'category', 'actor', 'director'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Movie::with(['categories', 'actors', 'directors'])->findOrFail($id);

        $category = Category::all();

        $actor = Actor::all();

        $director = Director::all();

        return view('admin.movie.edit', compact('data', 'category', 'actor', 'director'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, string $id)
    {

        $movie = Movie::findOrFail($id);

        $path = $movie->cover_image;

        if ($request->hasFile('cover_image')) {
            // Xóa ảnh cũ
            Storage::disk('public')->delete($path);

            // Lưu ảnh mới
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

        $movie->categories()->sync($request->categories);

        $movie->actors()->sync($request->actors);

        $movie->directors()->sync($request->directors);

        return redirect()->route('admin.movie.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mov = Movie::findOrFail($id);
        if($mov){
            $mov->delete();
            toastr()->success('Thao tác thành công');
        }else{
            toastr()->error('Thao tác không thành công');
        }

        return back();

    }

    public function trashed(){

        $data = Movie::with('categories', 'actors', 'directors')->onlyTrashed()->get();

        return view('admin.movie.trashed', compact('data'));
    }

    public function restore(string $id)
    {
        $movie = Movie::with(['categories', 'actors', 'directors'])->withTrashed()->findOrFail($id);

        $movie->restore();

        if($movie){
            toastr()->success('Khôi phục dữ liệu thành công');
        }
        return redirect()->route('admin.movie.index');

    }

    public function forceDelete(string $id)
    {
        $movie = Movie::with(['categories', 'actors', 'directors'])->withTrashed()->findOrFail($id);

        $movie->forceDelete();

        return redirect()->route('admin.movie.index')->with('success', 'Xóa dữ liệu thành công');

    }

}
