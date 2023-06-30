<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\ReBookingRequest;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Deposits;
use App\Models\Employee;
use App\Models\EmployeesComission;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends BaseAdminController
{
    public function __construct(Room $room, Booking $booking, Service $service, Customer $customer, Appointment $appointment, Deposits $deposits, EmployeesComission $comission, Employee $employee)
    {
        $this->booking = $booking;
        $this->room = $room;
        $this->service = $service;
        $this->customer = $customer;
        $this->appointment = $appointment;
        $this->deposits = $deposits;
        $this->commission = $comission;
        $this->employee = $employee;
        parent::__construct();
    }

    public function index()
    {

        $bookings = $this->booking->where('active', 1)->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function roomBooked()
    {
        $bookings = $this->booking->where('active', 1)->get();
        return view('admin.bookings.booked', compact('bookings'));
    }
    public function customerBooked($id)
    {

        $room = $this->room->find($id);
        $customers = $room->customer()->get();
        return view('admin.bookings.customer.index', compact('customers','room'));
    }


    public function create()
    {
        $checkEmptyRoom = $this->room->checkEmptyRoom();
        if(!$checkEmptyRoom){
            toastr()->error(trans('Đã hết phòng trống'));
            return back();
        }
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $services = $this->service->where('is_enabled', 1)->get();
        return view('admin.bookings.add', compact('rooms', 'services'));
    }

    public function store(Request $request, Booking $booking, Customer $customer)
    {
        $this->syncRequest($request, $booking, $customer);
        DB::commit();
        DB::beginTransaction();
        try {
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('bookings.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function addBookingFromAppointment($id){
        $checkEmptyRoom = $this->room->checkEmptyRoom();
        if(!$checkEmptyRoom){
            toastr()->error(trans('Đã hết phòng trống'));
            return back();
        }
        $appointment = $this->appointment->find($id);
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $services = $this->service->where('is_enabled', 1)->get();
        return view('admin.bookings.add-from-appointment', compact('appointment','rooms' ,'services'));
    }
    public function addBookingFromDeposits($id){
        $deposits = $this->deposits->find($id);
        $room = $this->room->where('id',$deposits->room_id)->first();
        $services = $this->service->where('is_enabled', 1)->get();
        return view('admin.bookings.add-from-deposits', compact('deposits','room' ,'services'));
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
        if ($booking->bill->id) {
            toastr()->error('Không thể xoá hợp đồng');
            return back();
        }
        $booking->delete();
        toastr()->success(trans('site.message.delete_success'));

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
        // create new customer
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->room_id = $request->input('room_id');
        $customer->personal_id = $request->input('personal_id');
        $customer->admin_id = Auth::user()->id;
        $customer->save();

        // create booking
        $booking->request = $request->input('request');
        $booking->date_start = $request->input('date_start');
        $booking->date_end = $request->input('date_end');
        $booking->room_id = $request->input('room_id');
        $booking->total_room = $request->input('total_room');
        $booking->total_deposits = $request->input('total_deposits');
        $booking->deposits = $request->input('deposits');
        $booking->total_price = $request->input('total_price');
        $booking->paid = $request->input('paid');
        $booking->customer_id = $customer->id;
        $booking->admin_id = Auth::user()->id;
        $booking->save();



        $phone = $this->customer->find($booking->customer_id)->phone;

        // lịch hẹn
        $appointment = $this->appointment->where(['phone' => $phone, 'room_id' => $booking->room_id])->first();
        $otherAppointment = $this->appointment->where('room_id', $booking->room_id)->where('phone','<>',$phone)->get();
        foreach ($otherAppointment as $other){
            $this->appointment->where(['phone' => $other->phone, 'room_id' => $booking->room_id])->update(['status'=>4]) ;
        }

        if($appointment){
            $this->appointment->where(['phone' => $phone, 'room_id' => $booking->room_id])->update(['status'=>3]) ;

            //hoa hồng
            $employeeOfBooking = $appointment->employee_id;
            $employee = $this->employee->find($appointment->employee_id);
            if($employee){
                $commission = ($booking->total_room * $employee->commission)/100;
                $this->commission->create(
                    [
                        'employee_id' => $appointment->employee_id,
                        'room_id' => $booking->room_id,
                        'commission' => $commission
                    ]
                );
            }

        }

        // cọc
        $otherDepositses = $this->deposits->where('room_id', $booking->room_id)->where('type',0)->where('phone','<>',$phone)->get();
        foreach ($otherDepositses as $otherDeposits){
            $this->deposits->where(['phone' => $otherDeposits->phone, 'room_id' => $booking->room_id])->update(['status'=>1]) ;
        }
        $deposits = $this->deposits->where(['phone' => $phone, 'room_id' => $booking->room_id])->first();
        if($deposits){
            $this->deposits->where(['phone' => $phone, 'room_id' => $booking->room_id])->update(['status'=>1]) ;
        }



        // revert booked in room
        $current_booking = $this->booking->find($booking->id);
        $current_booking->services()->sync($request->input('services'));

        // update booked phòng
        $room = $current_booking->room()->find($booking->room_id);
        $room->booked = 1;
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
        $booking->deposits = $request->input('deposits');
        $booking->total_price = $request->input('total_price');
        $booking->paid = $request->input('paid');
        $booking->admin_id = Auth::user()->id;
        $booking->save();

//        revert booked in room
        $current_booking = $this->booking->find($booking->id);
        $current_booking->services()->sync($request->input('services'));

        $room = $current_booking->room()->find($booking->room_id);
//        if ($booking->paid == 0) {
//            $room->booked = 1;
//        } else {
//            $room->booked = 0;
//        }
        $room->save();
    }
}
