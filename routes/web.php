<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\TicketController;
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
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InstructionController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\AccountController;

use App\Http\Controllers\User\RealtimeController;

use Illuminate\Support\Facades\Route;


Route::resource('/register', RegisterController::class);
Route::resource('/login', LoginController::class);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/movie/categories', [HomeController::class, 'categories'])->name('movie.categories');
Route::get('/movie/upcoming', [HomeController::class, 'upcoming'])->name('movie.upcoming');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/instruction', [InstructionController::class, 'stepfinal'])->name('instruction.stepfinal');
// Route::get('/movie/filter', [HomeController::class, 'filter'])->name('movie.filter');

Route::get('/', [HomeController::class, 'listMovie'])->name('home');
Route::resource('/movie', HomeController::class);





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
    Route::post('/destroy-voucher', [BookingController::class, 'destroyVoucher'])->name('destroy-voucher');

    Route::get('checkout/vnpay/return', [BookingController::class, 'vnpay_return'])->name('vnpay_return');

});

// thanh toan
    Route::post('/vnpay_payment', [BookingController::class, 'vnpay_payment'])->name('payment');

    // thanh toan thanh cong va that bai
    Route::get('/payment-success', [BookingController::class, 'paymentSuccess'])->name('payment-success');
    Route::get('/payment-fail', [BookingController::class, 'paymentFail'])->name('payment-fail');

// Routes dành cho Admin
Route::prefix('admin')->name('admin.')->middleware('checkAdmin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/user', UserController::class);

    Route::get('/movie/trashed', [MovieController::class, 'trashed'])->name('movie.trashed');
    Route::post('/movie/{movie}/restore', [MovieController::class, 'restore'])->name('movie.restore');
    Route::delete('/movie/{movie}/force', [MovieController::class, 'forceDelete'])->name('movie.forceDelete');
    Route::resource('/movie', MovieController::class);

    Route::get('/category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    Route::post('/category/{category}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/category/{category}/force', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    Route::resource('/category', CategoryController::class);

    Route::get('/screen/trashed', [ScreenController::class, 'trashed'])->name('screen.trashed');
    Route::post('/screen/{screen}/restore', [ScreenController::class, 'restore'])->name('screen.restore');
    Route::delete('/screen/{screen}/force', [ScreenController::class, 'forceDelete'])->name('screen.forceDelete');
    Route::resource('/screen', ScreenController::class);

    Route::get('/showtime/trashed', [ShowtimeController::class, 'trashed'])->name('showtime.trashed');
    Route::post('/showtime/{showtime}/restore', [ShowtimeController::class, 'restore'])->name('showtime.restore');
    Route::delete('/showtime/{showtime}/force', [ShowtimeController::class, 'forceDelete'])->name('showtime.forceDelete');
    Route::resource('/showtime', ShowtimeController::class);

    Route::get('/combo/trashed', [ComboController::class, 'trashed'])->name('combo.trashed');
    Route::post('/combo/{combo}/restore', [ComboController::class, 'restore'])->name('combo.restore');
    Route::delete('/combo/{combo}/force', [ComboController::class, 'forceDelete'])->name('combo.forceDelete');
    Route::resource('/combo', ComboController::class);

    Route::get('/voucher/trashed', [VoucherController::class, 'trashed'])->name('voucher.trashed');
    Route::post('/voucher/{voucher}/restore', [VoucherController::class, 'restore'])->name('voucher.restore');
    Route::delete('/voucher/{voucher}/force', [VoucherController::class, 'forceDelete'])->name('voucher.forceDelete');
    Route::resource('/voucher', VoucherController::class);

    Route::resource('/review', ReviewController::class);
    Route::resource('/seat', SeatController::class);
    Route::post('/seat1', [SeatController::class, 'store1'])->name('seat.store1');
    Route::put('/seat/update/{place}', [SeatController::class, 'updateSeat']);

    Route::get('/actor/trashed', [ActorController::class, 'trashed'])->name('actor.trashed');
    Route::post('/actor/{actor}/restore', [ActorController::class, 'restore'])->name('actor.restore');
    Route::delete('/actor/{actor}/force', [ActorController::class, 'forceDelete'])->name('actor.forceDelete');
    Route::resource('/actor', ActorController::class);

    Route::get('/review/trashed', [ReviewController::class, 'trashed'])->name('review.trashed');
    Route::post('/review/{review}/restore', [ReviewController::class, 'restore'])->name('review.restore');
    Route::delete('/review/{review}/force', [ReviewController::class, 'forceDelete'])->name('review.forceDelete');
    Route::resource('/review', ReviewController::class);

    Route::get('/director/trashed', [DirectorController::class, 'trashed'])->name('director.trashed');
    Route::post('/director/{director}/restore', [DirectorController::class, 'restore'])->name('director.restore');
    Route::delete('/director/{director}/force', [DirectorController::class, 'forceDelete'])->name('director.forceDelete');
    Route::resource('/director', DirectorController::class);

    Route::resource('ticket', TicketController::class);

    //ticket
    Route::get('checkin/{id}', [TicketController::class, 'checkin'])->name('checkin');
    Route::put('checkin/{id}', [TicketController::class, 'checkinUpdate'])->name('checkin.update');

    Route::get('print/{id}', [TicketController::class, 'print'])->name('checkin.print');
    Route::put('print/{id}', [TicketController::class, 'print'])->name('checkin.print-update');


    Route::get('export/{ticketId}', [TicketController::class, 'exportTicketsToPdf'])
        ->name('export-pdf');});

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


        Route::post('/comment/{id}', [AccountController::class, 'storeReviewForm'])->name('comment');
    });


