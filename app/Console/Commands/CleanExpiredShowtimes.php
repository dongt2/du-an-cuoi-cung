<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Showtime;
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
    public function handle()
    {
        // Lấy tất cả các suất chiếu đã hết hạn
        $expiredShowtimes = Showtime::where('showtime_date', '<', Carbon::now())->get();

        // Nếu có suất chiếu đã hết hạn, xóa chúng
        if ($expiredShowtimes->isNotEmpty()) {
            Showtime::where('showtime_date', '<', Carbon::now())->delete();
            $this->info('Đã xóa ' . $expiredShowtimes->count() . ' suất chiếu đã hết hạn.');
        } else {
            $this->info('Không có suất chiếu nào đã hết hạn.');
        }

        return 0; // Trả về 0 để chỉ ra rằng lệnh đã hoàn tất thành công
    }
}
