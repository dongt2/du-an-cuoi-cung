<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Showtime;
use App\Services\ShowtimeService;
use Carbon\Carbon;

class CleanExpiredShowtimes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'showtimes:clean-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Xóa các suất chiếu đã hết hạn';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ShowtimeService $showtimeService)
    {
        $deletedCount = $showtimeService->deleteExpiredShowtimes();

        if ($deletedCount > 0) {
            $this->info("Đã xóa $deletedCount suất chiếu đã hết hạn.");
        } else {
            $this->info('Không có suất chiếu nào đã hết hạn.');
        }

        return 0;
    }
}
