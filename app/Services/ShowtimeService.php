<?php

namespace App\Services;

use App\Models\Showtime;
use Carbon\Carbon;

class ShowtimeService
{
    public function deleteExpiredShowtimes()
    {
        $expiredShowtimes = Showtime::where('showtime_date', '<', Carbon::now())->get();

        if ($expiredShowtimes->isNotEmpty()) {
            Showtime::where('showtime_date', '<', Carbon::now())->delete();
            return $expiredShowtimes->count();
        }

        return 0;
    }
}
