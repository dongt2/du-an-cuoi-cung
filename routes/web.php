<?php

use App\Http\Controllers\Users\DetailMovieController;
use App\Http\Controllers\Users\MovieController;
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

// Route::get('/', function () {
//     return view('layouts.master');
// });

Route::get('/home', function () {
    return view('Users.index');
});

Route::get('/404', function () {
    return view('Users.404-NotFound');
});
Route::get('/movies', function () {
    return view('Users.movie-list-full');
});
Route::get('/booking1', function () {
    return view('Users.booking.detailMovie');
});

Route::prefix('/')->group(function () {

    Route::get('/', function () {
        return view('Users.index');
    })->name('home');

    Route::prefix('/movies')->group(function () {
        Route::get('/listMovie', MovieController::class . '@index')->name('listMovie');
        Route::get('/listMovie/{id}', DetailMovieController::class . '@index')->name('detailMovie');
    });
});
