<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ScreenController;
use App\Http\Controllers\Admin\SeatController;
use App\Http\Controllers\Admin\ShowtimeController;
use App\Http\Controllers\Admin\VoucherController;

use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;

use App\Http\Controllers\User\RealtimeController;

use App\Http\Controllers\PaymentController;
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
//     return view('admin.dashboard');
// });

Route::resource('/register', RegisterController::class);
Route::resource('/login', LoginController::class);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'listMovie'])->name('home');
Route::resource('/movie', HomeController::class);


Route::get('/vnpay', [PaymentController::class, 'paymentPage']);
Route::post('/vnpay', [PaymentController::class, 'createPayment']);
Route::get('/vnpay-return', [PaymentController::class, 'returnPayment']);


// Routes dành cho User
Route::prefix('user')->name('user.')->middleware('checkUser')->group(function () {
    Route::get('/bookingStore1/{id}', [BookingController::class, 'bookingStore1'])->name('bookingStore1');
    Route::get('/booking1', [BookingController::class, 'viewBooking1'])->name('booking1');

    // ajax
    Route::post('/get-screens', [BookingController::class, 'getScreens'])->name('get.screens');
    Route::post('/get-showtimes', [BookingController::class, 'getShowtimes'])->name('get.showtimes');

    Route::post('/bookingStore2', [BookingController::class, 'bookingStore2'])->name('bookingStore2');
    Route::get('/booking2', [BookingController::class, 'viewBooking2'])->name('booking2');

    Route::post('/bookingStore3', [BookingController::class, 'bookingStore3'])->name('bookingStore3');
    Route::get('/booking3', [BookingController::class, 'viewBooking3'])->name('booking3');

    Route::post('/get-price-combo', [BookingController::class, 'getPriceCombo'])->name('get.price-combo');
    Route::post('/get-price-voucher', [BookingController::class, 'getPriceVoucher'])->name('get.price-voucher');
});

// Routes dành cho Admin
Route::prefix('admin')->name('admin.')->middleware('checkAdmin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/user', UserController::class);
    Route::resource('/movie', MovieController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/screen', ScreenController::class);
    Route::resource('/showtime', ShowtimeController::class);
    Route::resource('/combo', ComboController::class);
    Route::resource('/voucher', VoucherController::class);
    Route::resource('/review', ReviewController::class);
    Route::resource('/seat', SeatController::class);
    Route::put('/seat/update/{place}', [SeatController::class, 'updateSeat']);
});
