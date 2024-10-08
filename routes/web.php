<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    return view('layouts.master');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/404', function () {
    return view('404-NotFound');
=======
    return view('welcome');
>>>>>>> 6446e89b95d6dc1a537fe57dc89a6505eff040ef
=======
    return view('welcome');
>>>>>>> 6446e89b95d6dc1a537fe57dc89a6505eff040ef
});
