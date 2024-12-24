<?php

namespace App\Listeners;

use App\Events\ExpiredShowtimesCleaned;
use App\Services\ShowtimeService;

class CleanExpiredShowtimesListener
{
    protected $showtimeService;

    public function __construct(ShowtimeService $showtimeService)
    {
        $this->showtimeService = $showtimeService;
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(ExpiredShowtimesCleaned $event)
    {
        $this->showtimeService->deleteExpiredShowtimes();
    }
}
