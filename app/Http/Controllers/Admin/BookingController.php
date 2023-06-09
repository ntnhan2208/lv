<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\ReBookingRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends BaseAdminController
{
    public function __construct(Room $room, Booking $booking, Service $service, Customer $customer)
    {
        $this->booking = $booking;
        $this->room = $room;
        $this->service = $service;
        $this->customer = $customer;
        parent::__construct();
    }

    public function index()
    {
        $bookings = $this->booking->where('active', 1)->get();
        return view('admin.bookings.index', compact('bookings'));
    }


    public function create()
    {
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $services = $this->service->where('is_enabled', 1)->get();
        return view('admin.bookings.add', compact('rooms', 'services'));
    }

    public function store(BookingRequest $request, Booking $booking, Customer $customer)
    {
        DB::beginTransaction();
        try {
            $this->syncRequest($request, $booking, $customer);
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('bookings.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

//    re-book
    public function re_create($id)
    {
        $customer = $this->customer->find($id);
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $services = $this->service->where('is_enabled', 1)->get();
        if ($customer) {
            return view('admin.bookings.re-add', compact('customer', 'rooms', 'services'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect()->route('customers.index');

    }

    public function re_store(ReBookingRequest $request, Booking $booking, $id)
    {
        DB::beginTransaction();
        try {
            $booking->customer_id = $id;
            $this->syncRequest2($request, $booking);
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('bookings.index');

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }

    }

    public function edit($id)
    {
        $booking = $this->booking->find($id);
        $customer = $booking->customer()->find($booking->customer_id);
        $current_room = $booking->room;
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $services = $this->service->where('is_enabled', 1)->get();
        if ($booking) {
            return view('admin.bookings.edit', compact('booking', 'customer', 'rooms', 'services', 'current_room'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect()->route('bookings.index');
    }


    public function update(ReBookingRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $booking = $this->booking->find($id);
            if ($booking->room->id != $request->room_id) {
                $booking->room->booked = 0;
                $booking->room->save();
            }
            $this->syncRequest2($request, $booking);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('bookings.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function destroy($id)
    {
        $booking = $this->booking->find($id);
        $booking->services()->detach();
        $booking->room->booked = 0;
        $booking->room->save();
        $booking->delete();
        toastr()->success(trans('site.message.delete_success'));

//        check có KH
//        if ($booking->customer->id) {
//            toastr()->error('Không thể xoá đơn hàng');
//        } else {
//            $booking->services()->detach();
//            $booking->delete();
//            toastr()->success(trans('site.message.delete_success'));
//        }
        return redirect()->route('bookings.index');
    }

    public function checkDuplicateCustomer(Request $request)
    {
        $phone = $request->input('check_phone');
        $customer = $this->customer->where('phone', $phone)->first();
        if ($customer) {
            $id = $customer->id;
            toastr()->success('Khách hàng cũ');
            return redirect()->route('re_create', $id);
        } else {
            toastr()->success('Khách hàng mới');
            return redirect()->route('bookings.create');
        }
    }

    public function syncRequest($request, Booking $booking, Customer $customer)
    {
        //        create new customer
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->personal_id = $request->input('personal_id');
        $customer->admin_id = Auth::user()->id;
        $customer->save();

//        create booking
        $booking->request = $request->input('request');
        $booking->date_start = $request->input('date_start');
        $booking->date_end = $request->input('date_end');
        $booking->room_id = $request->input('room_id');
        $booking->total_room = $request->input('total_room');
        $booking->total_deposits = $request->input('total_deposits');
        $booking->total_price = $request->input('total_price');
        $booking->paid = $request->input('paid');
        $booking->customer_id = $customer->id;
        $booking->admin_id = Auth::user()->id;
        $booking->save();

//        revert booked in room
        $current_booking = $this->booking->find($booking->id);
        $current_booking->services()->sync($request->input('services'));

        $room = $current_booking->room()->find($booking->room_id);
        if ($booking->paid == 0) {
            $room->booked = 1;
        } else {
            $room->booked = 0;
        }
        $room->save();
    }

    public function syncRequest2($request, Booking $booking)
    {
        $booking->request = $request->input('request');
        $booking->date_start = $request->input('date_start');
        $booking->date_end = $request->input('date_end');
        $booking->room_id = $request->input('room_id');
        $booking->total_room = $request->input('total_room');
        $booking->total_deposits = $request->input('total_deposits');
        $booking->total_price = $request->input('total_price');
        $booking->paid = $request->input('paid');
        $booking->admin_id = Auth::user()->id;
        $booking->save();

//        revert booked in room
        $current_booking = $this->booking->find($booking->id);
        $current_booking->services()->sync($request->input('services'));

        $room = $current_booking->room()->find($booking->room_id);
        if ($booking->paid == 0) {
            $room->booked = 1;
        } else {
            $room->booked = 0;
        }
        $room->save();
    }
}
