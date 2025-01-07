<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie; // Assuming this model exists
use App\Models\Combo; // Assuming this model exists
use App\Models\DailyPremiere; // Assuming this model exists
use Carbon\Carbon;

class DashboardController extends Controller
{
/**
* Display the dashboard.
*/
public function index()
{
// Get statistics for best-selling movies (weekly)
$bestSellingMovies = Movie::withSum('sales', 'quantity')
->orderByDesc('sales_sum_quantity')
->take(5) // Limit top 5
->get();
dd($bestSellingMovies);
// Get statistics for best-selling combos (weekly)
$bestSellingCombos = Combo::withSum('sales', 'quantity')
->orderByDesc('sales_sum_quantity')
->take(5) // Limit top 5
->get();

// Get daily premiere statistics
$dailyPremieres = DailyPremiere::whereDate('premiere_date', Carbon::today())
->get();

// Data for charts (e.g., monthly stats)
$monthlySales = Movie::selectRaw('MONTH(sale_date) as month, SUM(quantity) as total_sales')
->groupBy('month')
->get();

return view('admin.dashboard', [
    'bestSellingMovies' => $bestSellingMovies,
'bestSellingCombos' => $bestSellingCombos,
'dailyPremieres' => $dailyPremieres,
'monthlySales' => $monthlySales,
]);
}
}
