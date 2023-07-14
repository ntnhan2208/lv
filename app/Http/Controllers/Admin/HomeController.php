<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Carbon\Carbon;

class HomeController extends BaseAdminController
{

    public function __construct(Room $room, Booking $booking, Customer $customer)
    {
        $this->booking = $booking;
        $this->room = $room;
        $this->customer = $customer;
        parent::__construct();
    }

    public function index()
    {
        return view('admin.home');
    }


}
