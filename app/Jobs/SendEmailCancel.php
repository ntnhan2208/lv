<?php

namespace App\Jobs;

use App\Mail\EmailCancel;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailCancel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $customer;

    public function __construct($data, Customer $customer)
    {
        $this->data = $data;
        $this->customer = $customer;
    }

    public function handle()
    {
        Mail::to($this->customer->email)->send(new EmailCancel($this->data));
    }
}
