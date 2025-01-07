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
use App\Http\Controllers\User\AccountController;
// use App\Http\Controllers\User\GenreController;
use App\Http\Controllers\User\RealtimeController;

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
Route::get('/movie/categories', [HomeController::class, 'categories'])->name('movie.categories');
Route::get('/movie/upcoming', [HomeController::class, 'upcoming'])->name('movie.upcoming');
Route::resource('/movie', HomeController::class);
// Route::get('/movie/categories', [HomeController::class, 'categories'])->name('movie.categories');
// Route::get('/movie/filter', [HomeController::class, 'filter'])->name('movie.filter');

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

    Route::get('checkout/vnpay/return', [BookingController::class, 'vnpay_return'])->name('vnpay_return');

});

// thanh toan
Route::post('/vnpay_payment', [BookingController::class, 'vnpay_payment'])->name('payment');

// thanh toan thanh cong va that bai
Route::get('/payment-success', [BookingController::class, 'paymentSuccess'])->name('payment-success');
Route::get('/payment-fail', [BookingController::class, 'paymentFail'])->name('payment-fail');

// Routes dành cho Admin
Route::prefix('admin')->name('admin.')->middleware('checkAdmin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/user', AccountController::class);
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

// qr code
Route::get('/qr-code', [RealtimeController::class, 'index']);

Route::get('/ticket/{id}', [BookingController::class, 'showTicket'])->name('ticket.show');

Route::get('/ticket/{id}/download', [BookingController::class, 'downloadQrCode'])->name('ticket.download');

// routes/web.php

Route::get('/booking/time-limit', [BookingController::class, 'getTimeLimit'])->name('booking.timeLimit');


//Accounts
Route::prefix('account')
    ->name('account.')
    ->middleware('auth')
    ->group(function () {
    Route::get('/info', [AccountController::class, 'showAccountInfo'])->name('info');

    Route::get('/update-profile', [AccountController::class, 'updateAccountInfo'])->name('update-profile');
    Route::put('/update-profile', [AccountController::class, 'updateAccountInfoStore'])->name('update');

    Route::get('/booking-history', [AccountController::class, 'showBookingHistory'])->name('booking-history');

    Route::get('/booking-history/{id}', [AccountController::class, 'showBookingDetail'])->name('booking-detail');


});
