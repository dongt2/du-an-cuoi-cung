<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ScreenController;
use App\Http\Controllers\admin\SeatController;
use App\Http\Controllers\Admin\ShowtimeController;
use App\Http\Controllers\Users\DetailMovieController;
use App\Http\Controllers\Users\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('movies')
    ->as('movies.')
    ->group(function () {
    Route::get('listMovie', [MovieController::class , 'index'])->name('list');
    Route::get('show/{id}', [DetailMovieController::class , 'index'])->name('show');
});




// route admin
Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('category', CategoryController::class);
        Route::resource('movie', MovieController::class);

        Route::resource('seat', SeatController::class);
        Route::put('/seat/update/{place}', [SeatController::class, 'updateSeat']);

//        Route Screen
        Route::resource('screen', ScreenController::class);

        // Route Showtime
        Route::resource('showtime', ShowtimeController::class)
        ->middleware('clean.expired.showtimes');

    });


