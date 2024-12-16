<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class DetailMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($movie_id)
    {
        $detail = Movie::query()
            ->join('categories', 'movies.category_id', '=', 'categories.category_id')
            ->select('movies.*', 'categories.category_name as category_name')
            ->where('movie_id', $movie_id)
            ->first();
        return view('user.detailmovie.detailMovie', compact('detail'));
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
        //
    }
}
