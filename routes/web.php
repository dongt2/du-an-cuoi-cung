<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ScreenController;

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

Route::get('/', function () {
    return view('user.home');
});

Route::get('/book1', function () {
    return view('user.book1');
});

Route::get('/book2', function () {
    return view('user.book2');
});

Route::get('/book3', function () {
    return view('user.book3-buy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/screens', [ScreenController::class, 'index'])->name('screen.index');
    Route::get('/screen/create', [ScreenController::class, 'create'])->name('screen.create');
    Route::post('/screen/create', [ScreenController::class, 'store'])->name('screen.store');
    Route::get('/screen/edit/{post}', [ScreenController::class, 'edit'])->name('screen.edit');
    Route::put('/screen/edit/{post}', [ScreenController::class, 'update'])->name('screen.update');
    Route::delete('screen/delete/{post}', [ScreenController::class, 'destroy'])->name('screen.destroy');

    
});