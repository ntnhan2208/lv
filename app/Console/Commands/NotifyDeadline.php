<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailDeadline;
use App\Models\Booking;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifyDeadline extends Command
{
    protected $signature = 'notify-deadline';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $bookings = Booking::all();
        if($bookings){
            foreach ($bookings as $booking){
                $message=[
                    'name' => $booking->customer->name,
                    'phone' => $booking->customer->phone,
                    'room' => $booking->room->name,
                    'date_end' => $booking->date_end,
                    'date' => Carbon::now()->toDateString(),
                ];
                $dateEnd = Carbon::createFromFormat('Y-m-d', $booking->date_end)->subDay(5)->toDateString();
                $now = Carbon::now()->toDateString();
                if ($now == $dateEnd){
                    SendEmailDeadline::dispatch($message, $booking->customer)->delay(now()->addMinute(1));
                }
            }
        }
    }
}
