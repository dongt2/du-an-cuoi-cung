<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\Movie;

class BookingController extends Controller
{
   public function book(Request $request){
    $validated = $request->validate([
        'movie_id' => 'required|exists:movies,id',
        'seat_id' => 'required|exists:seats,id',
        'customer_name' => 'required|string|max:255',
    ]);

    // Tạo một booking mới
    $booking = Booking::create([
        'movie_id' => $validated['movie_id'],
        'seat_id' => $validated['seat_id'],
        'customer_name' => $validated['customer_name'],
    ]);

    // Cập nhật ghế đã được đặt
    Seat::where('id', $validated['seat_id'])->update(['is_booked' => true]);

    return redirect()->route('movies.index')->with('success', 'Đặt vé thành công!');
   }
}
