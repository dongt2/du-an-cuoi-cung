<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ScreenController;
use App\Http\Controllers\admin\SeatController;
use App\Http\Controllers\Admin\ShowtimeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\BookingController;
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
        Route::get('listMovie', [MovieController::class, 'index'])->name('list');
        Route::get('show/{id}', [DetailMovieController::class, 'index'])->name('show');

    });

//Route Booking with movie_id
Route::post('/booking/store', [BookingController::class, 'storeBooking'])->name('storeBooking');
Route::get('booking', [BookingController::class, 'stepFinal'])->name(name: 'booking');
Route::get('booking/{id}', [BookingController::class, 'bookingWithMovie'])->name('bookingMovie');
Route::get('booking-step-2', [BookingController::class, 'bookingStepTwo'])->name('user.bookings.stepTwo');
Route::post('booking1', [BookingController::class, 'storestepTwo'])->name('storestepTwo');
Route::get('booking-step-3', [BookingController::class, 'bookingStepThree'])->name('user.bookings.stepThree');
// Route::post('combo', [BookingController::class, 'comboPost'])->name('storestepThree');

// Route::get('/booking/combo', [BookingController::class, 'stepFinal']);
// Route::get('/booking/combo', [BookingController::class, 'stepFinal']);
// Route::post('/booking/combo', [BookingController::class, 'comboPost'])->name('user.bookings.comboPost');
Route::get('/booking/confirmation', [BookingController::class, 'confirmation'])->name('user.bookings.confirmation');
Route::post('booking/step-final', [BookingController::class, 'stepFinal'])->name('user.bookings.stepFinal');
Route::get('/booking/combo', [BookingController::class, 'showComboPage'])->name('booking.combo');
Route::post('/booking/combo/select', [BookingController::class, 'selectCombo'])->name('booking.combo.select');
Route::get('/booking/payment', [BookingController::class, 'showPayment'])->name('booking.payment');
Route::get('/booking/final', [BookingController::class, 'stepFinal'])->name('booking.final');
Route::get('/booking/step2', [BookingController::class, 'storeStepTwo'])->name('booking.step2');

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

Route::prefix('auth')
    ->as('auth.')
    ->group(function () {
        Route::get('login', [LoginController::class, 'showFormLogin'])->name('login');
        Route::post('login', [LoginController::class, 'login']);

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('register', [RegisterController::class, 'showFormRegister'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);

        Route::prefix('password')
            ->as('password.')
            ->group(function () {
                Route::get('forgot', [ForgotPasswordController::class, 'forgot'])->name('forgot');
                Route::post('forgot', [ForgotPasswordController::class, 'forgotPassword']);
            });

    });
Route::get('reset/{token}', [ForgotPasswordController::class, 'reset']);
Route::post('reset/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');

