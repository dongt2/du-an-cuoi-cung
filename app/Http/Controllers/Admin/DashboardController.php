<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket; // Assuming you have a Ticket model
use App\Models\Movie; // To fetch movie titles
use App\Models\Combo; // To fetch combo names
use App\Models\Screen; // To fetch screen details

class DashboardController extends Controller
{
    public function index()
    {

        // Daily Revenue
        $dailyRevenue = Booking::select(
            DB::raw('DATE(created_at) as date'), // Comma added correctly
            DB::raw('SUM(total_price) as total_revenue') // Removed extra semicolon
        )
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->take(7) // Get last 7 days
            ->get();

        // Weekly Revenue
        $weeklyRevenue = Booking::select(
            DB::raw('YEARWEEK(created_at, 1) as week'), // Fixed logic for week
            DB::raw('SUM(total_price) as total_revenue') // Ensure proper syntax
        )
            ->groupBy('week')
            ->orderBy('week', 'desc')
            ->take(4)
            ->get();

        // Monthly Revenue
        $monthlyRevenue = Booking::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total_revenue')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->take(12) // Get last 12 months
            ->get();


        // Best-Selling Movies
        $bestSellingMovies = Ticket::select
        ('movie_id', DB::raw('SUM(ticket_id) as total_tickets_sold'))
            ->with('movie') // Assuming Ticket has a "movie" relationship
            ->groupBy('movie_id')
            ->orderByDesc('total_tickets_sold')
            ->take(5) // Get top 5 best-selling movies
            ->get();

        // Most-Purchased Combos
        $mostPurchasedCombos = Booking::select('combo_id', DB::raw('SUM(booking_id) as total_combos_sold'))
            ->with('combo') // Assuming Ticket has a "combo" relationship
            ->groupBy('combo_id')
            ->orderByDesc('total_combos_sold')
            ->take(5) // Get top 5 most-purchased combos
            ->get();
//        dd($mostPurchasedCombos);
        // Most-Purchased Screens
        $mostPurchasedScreens = Showtime::select('screen_id', DB::raw('SUM(showtime_id) as total_tickets_sold'))
            ->with('screen') // Assuming Ticket has a "screen" relationship
            ->groupBy('screen_id')
            ->orderByDesc('total_tickets_sold')
            ->take(5) // Get top 5 most-purchased screens
            ->get();
//        dd($mostPurchasedScreens);
        return view('admin.dashboard', compact('bestSellingMovies','mostPurchasedCombos','mostPurchasedScreens',
            'dailyRevenue', 'weeklyRevenue', 'monthlyRevenue',
            'bestSellingMovies'));
    }
}
