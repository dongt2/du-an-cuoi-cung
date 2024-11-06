<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $listMovies = Movie::all();
        return view('user.home' , ['listMovies' => $listMovies]);
    }
}
