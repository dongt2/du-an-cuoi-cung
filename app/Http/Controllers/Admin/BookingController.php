<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Combo;
use App\Models\Movie;
use App\Models\OrderCombo;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        $movie = Movie::all();

        $showtime = Showtime::all();

        $seat = Seat::all();

        $order = OrderCombo::get();

        $combo = Combo::all();

        $data = Booking::paginate(5);

        return view("admin.bookings.index", compact('user', 'movie', 'showtime', 'seat', 'combo', 'order', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::get();

        $movie = Movie::get();

        $showtime = Showtime::get();

        $seat = Seat::get();

        $order = OrderCombo::get();

        $combo = Combo::get();

        $data = Booking::get();

        return view('admin.bookings.create', compact('user', 'movie', 'showtime', 'seat', 'combo', 'order', 'data'));
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
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
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
