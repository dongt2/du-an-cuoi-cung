<?php

use App\Http\Controllers\User\RealtimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/realtime/seats', [RealtimeController::class, 'getSeats']);
Route::post('/realtime/update-seat-status', [RealtimeController::class, 'updateSeatStatus']);
