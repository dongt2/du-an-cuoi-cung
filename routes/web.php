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
    return view('user.home');
});

Route::get('/book1', function () {
    return view('user.book1');
});

Route::get('/list-movie', function () {
    return view('admin.movies.list-movie');
});







// Route::group([
//     'prefix' => 'admin',
//     'as'    => 'admin.',
// ], function() {
//     Route::get('/list-movie', function () {
//         return view('admin.movies.list-movie');
//     });
// });

// Route::group([
//     'prefix' => 'user',
//     'as'    => 'user.',
// ], function() {
//     Route::get('/book1', function () {
//         return view('user.book1');
//     });
// });


// php artisan make:model Name -m -f -s
// php artisan migrate
// php artisan db:seed --class=NameSeeder
// php artisan make:controller NameController --resource
// php artisan make:controller api\PostController --api
// php artisan storage:link