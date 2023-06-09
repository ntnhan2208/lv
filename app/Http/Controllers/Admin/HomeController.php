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
//        get date
        $date_past = [Carbon::now('Asia/Ho_Chi_Minh')->toDateString()];
        $currentDay = Carbon::now('Asia/Ho_Chi_Minh');

        for ($i = 0; $i < 10; $i++) {
            $date_temp = $currentDay->subDay(1);
            array_push($date_past, $date_temp->toDateString());
        }
//get bookings count
        $bookings_count = [];
        for ($j = 0; $j < count($date_past); $j++) {
            $count = $this->booking->where('date_start', $date_past[$j])->get()->count();
            array_push($bookings_count, $count);
        }

        $bookings_not_paid = $this->booking->where('paid', 0)->get()->count();
        $customers = $this->customer->all()->count();
        $rooms_ready = $this->room->where('is_enabled', 1)->where('booked', 0)->get()->count();
        $room_booked = $this->booking->limit(5)->get()->groupBy('room_id', 'desc');

        return view('admin.home', compact('date_past', 'bookings_count', 'bookings_not_paid', 'customers', 'rooms_ready', 'room_booked'));
    }


}
