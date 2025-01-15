<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use Carbon\Carbon;

class CancelPastTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:cancel-past';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel tickets for past showtimes if users have not checked in';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Current time
        $currentTime = Carbon::now();

        // Find tickets with past showtimes where check-in has not occurred
        $tickets = Ticket::where('checkin', 0)
            ->whereHas('showtime', function ($query) use ($currentTime) {
                $query->where('showtime_date', '<=', $currentTime->toDateString())
                    ->where('time', '<=', $currentTime->toTimeString());
            })
            ->get();

        foreach ($tickets as $ticket) {
            // Update status to canceled
            $ticket->update(['status' => 2]); // 2 = canceled

            $this->info("Canceled ticket ID: {$ticket->id}");
        }

        $this->info("Processed ticket cancellations for past showtimes.");
    }
}
