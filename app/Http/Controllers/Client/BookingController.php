<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookingWithMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $showtime = DB::table('showtimes')
            ->join('screens', 'showtimes.screen_id', '=', 'screens.screen_id')
            ->where('showtimes.movie_id', $id)
            ->select('showtimes.*', 'screens.screen_name as screen_name')
            ->get()
            ->toArray();
//        dd($movie, $showtime);
        return view('user.bookings.booking', compact('movie', 'showtime'));
    }

    public function bookingShow()
    {
        $movies= Movie::all();

//        $showtimes = Showtime::all();

        return view('user.bookings.booking', compact('movies'));
    }
}
