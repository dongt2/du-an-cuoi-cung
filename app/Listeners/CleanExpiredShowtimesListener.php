<?php

namespace App\Listeners;

use App\Events\ShowtimesUpdated;
use App\Models\Showtime;
use Carbon\Carbon;

class CleanExpiredShowtimesListener
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle()
    {
        // Lấy tất cả các suất chiếu đã hết hạn
        $expiredShowtimes = Showtime::where('showtime_date', '<', Carbon::now())->get();

        // Nếu có suất chiếu đã hết hạn, xóa chúng
        if ($expiredShowtimes->isNotEmpty()) {
            Showtime::where('showtime_date', '<', Carbon::now())->delete();
        }
    }
}
