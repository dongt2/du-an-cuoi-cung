<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function bookingStore1($id)
    {
        $data = Movie::where('movie_id', $id)->first();
        session([
            'movie' => [
                'movie_id' => $data->movie_id,
                'title' => $data->title,
            ]
        ]);
        return redirect()->route('user.booking1');
    }

    public function viewBooking1()
    {
        if (session('movie')) {
            $data = Movie::where('movie_id', session('movie')['movie_id'])->get();
        } else {
            $data = Movie::all();
        }
        $screens = Screen::all();

        return view('user.booking.booking1', compact('data', 'screens'));
    }

    public function getShowtimes(Request $request)
    {
        $screen_id = $request->input('screen_id');
        $movie_id = $request->input('movie_id');

        $showtimes = Showtime::where('movie_id', $movie_id)
            ->where('screen_id', $screen_id)
            ->get()
            ->groupBy('showtime_date');

        return response()->json($showtimes);
    }


    public function bookingStore2(Request $request)
    {
        session([
            'booking' => [
                'movie_id' => $request->input('movie_id'),
                'screen_id' => $request->input('screen_id'),
                'showtime_date' => $request->input('showtime_date'),
                'showtime_time' => $request->input('showtime_time'),
            ]
        ]);
        return redirect()->route('user.booking2');
    }

    public function viewBooking2()
    {
        // dd(session()->get('booking'));
        $showtime_id = Showtime::where('movie_id', session('booking.movie_id'))
            ->where('screen_id', session('booking.screen_id'))
            ->where('showtime_date', session('booking.showtime_date'))
            ->where('time', session('booking.showtime_time'))
            ->value('showtime_id');
        // $showtime_id = 1;

        $data = Seat::where('showtime_id', $showtime_id)
            ->select('place', 'price', 'status')
            ->orderByRaw("SUBSTRING(place, 1, 1), CAST(SUBSTRING(place, 2) AS UNSIGNED)")
            ->get();

        return view('user.booking.booking2', compact("data"));
    }


    public function bookingStore3(Request $request)
    {
        session()->push('booking.seats', array_filter($request->all(), fn($key) => $key !== '_token' && $key !== 'total_price'));
        session(['booking.seats' => $request->except(['_token', 'total_price'])]);
        session(['booking.total_price' => $request->input('total_price')]);
        // dd(session()->get('booking'));
        return redirect()->route('user.booking3');
    }

    public function viewBooking3()
    {
        $combos = Combo::get();
        return view('user.booking.booking3', compact('combos'));
    }




    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
