<?php

namespace App\Console\Commands;

use App\Mail\EmailNoti;
use App\Models\Booking;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Mail;

class AutoMailNoti extends Command
{
    protected $signature = 'sendmainoti:cron';

    protected $description = 'Auto send mail notification';

    public function __construct(Customer $customer, Booking $booking)
    {
        $this->customer = $customer;
        $this->booking = $booking;

        parent::__construct();
    }

    public function handle()
    {
        $customers = [];
        $two_days_after = Carbon::now('Asia/Ho_Chi_Minh')->addDay(2);
        $bookings = $this->booking->where('date_start', $two_days_after->toDateString())->where('active', 1)->where('paid', 0)->get();
        if ($bookings) {
            foreach ($bookings as $booking) {
                array_push($customers, $booking->customer);
            }
        }
        if ($customers != null)
            foreach ($customers as $customer) {
                Mail::to($customer)->send(new EmailNoti($customer));
            }
        return 0;
    }
}
