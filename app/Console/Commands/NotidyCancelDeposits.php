<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Models\Customer;
use App\Models\Deposits;
use Carbon\Carbon;
use Illuminate\Console\Command;


class NotidyCancelDeposits extends Command
{
    protected $signature = 'notify-cancel-deposits';
    protected $description = 'Command description';

    public function __construct(Deposits $customer)
    {
        $this->customer = $customer;
        parent::__construct();
    }


    public function handle()
    {
        $depositses = Deposits::all();
        if ($depositses){
            foreach ($depositses as $deposits){
                $message=[
                    'name' => $deposits->name,
                    'phone' => $deposits->phone,
                    'room' => $deposits->room->name,
                    'type' => $deposits->type === 0 ? 'Cọc giữ chỗ' : 'Cọc thuê căn hộ',
                    'date_start' => $deposits->date_start,
                    'date' => Carbon::now()->toDateString(),
                ];
                if($deposits->type == 0){
                    $nextFiveDays = Carbon::createFromFormat('Y-m-d', $deposits->date_start)->addDay(5)->toDateString();
                    $now = Carbon::now()->toDateString();
                    if($now > $nextFiveDays && $deposits->status == 0){
                        SendEmail::dispatch($message, $deposits)->delay(now()->addMinute(1));
                        $deposits->room->update(['booked' => 0]);
                        $deposits->delete();
                    }
                } // cọc giữ chỗ
                else if ($deposits->type == 1){
                    $nextThirtyDays = Carbon::createFromFormat('Y-m-d', $deposits->date_start)->addDay(30)->toDateString();
                    $now = Carbon::now()->toDateString();
                    if($now > $nextThirtyDays && $deposits->status == 0){
                        SendEmail::dispatch($message, $deposits)->delay(now()->addMinute(1));
                        $deposits->room->update(['booked' => 0]);
                        $deposits->delete();
                    } // cọc thuê căn hộ
                }
            }
        }
    }
}
