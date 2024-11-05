<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
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
// mới vào chạy 2 cái này
// php artisan migrate
// php artisan db:seed
// b c

// Route::get('/', function () {
//     return view('user.home');
// });

// Route::get('/book1', function () {
//     return view('user.book1');
// });

// Route::get('/book2', function () {
//     return view('user.book2');
// });

// Route::get('/book3', function () {
//     return view('user.book3-buy');
// });


Route::group(['prefix' => 'admin'], function(){
    Route::resource('category', CategoryController::class);
    Route::resource('movie', MovieController::class);
});
