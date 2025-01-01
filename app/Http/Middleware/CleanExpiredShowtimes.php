<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Showtime;
use Carbon\Carbon;

class CleanExpiredShowtimes
{
    public function handle($request, Closure $next)
    {
        // Xóa các vé phim đã hết hạn
        Showtime::where('showtime_date', '<', Carbon::now())->delete();

        return $next($request);
    }
}
