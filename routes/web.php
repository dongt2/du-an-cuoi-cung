<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/',[HomeController::class,'index'])->name('index');
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

// Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
// Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
// Route::post('/movies/{id}/book', [MovieController::class, 'bookTicket'])->name('movies.book');

// Route::post('/book', [BookingController::class, 'book'])->name('bookings.store');

Route::group(['prefix'=>'backend','as'=>'admin.','middleware'=>['guest']], function(){
     Route::get('/',[AdminController::class, 'index'])->name('home');
});

// Route::get('/account', [AccountController::class, 'index'])->name('account');
// Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware('auth');
// Route::put('/account', [AccountController::class, 'update'])->name('account.update');

//route fe
// Route::get('/',[HomeController::class,'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');
    Route::post('/account/change-password', [AccountController::class, 'changePassword'])->name('account.changePassword');
});       


Route::get('/login',[UserController::class,'login'])->name('login');
// Route cho đăng nhập
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Route cho đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Route cho quên mật khẩu
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route cho trang thành viên
// Route::middleware(['auth'])->group(function () {
//     Route::get('/member', [MemberController::class, 'index'])->name('member.index');
// });


