<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\ReBookingRequest;
use App\Models\Appointment;
use App\Models\Bill;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Deposits;
use App\Models\Employee;
use App\Models\EmployeesComission;
use App\Models\Room;
use App\Models\Service;
use Carbon\Carbon;
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
        if (Auth::user()->role==1){
            return redirect()->route('dashboard');
        }
        $bookings = $this->booking->where('active', 1)->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function roomBooked()
    {
        if (Auth::user()->role==1){
            return redirect()->route('dashboard');
        }
        $bookings = $this->booking->where('active', 1)->get();
        return view('admin.bookings.booked', compact('bookings'));
    }
    public function customerBooked($id)
    {
        $room = $this->room->find($id);
        $activeBooking = $room->booking->where('active',1)->pluck('customer_id')->toArray();
        $customers = Customer::whereIn('id',$activeBooking)->get();
        return view('admin.bookings.customer.index', compact('customers','room'));
    }


    public function create()
    {
        if (Auth::user()->role==1){
            return redirect()->route('dashboard');
        }
        $checkEmptyRoom = $this->room->checkEmptyRoom();
        if(!$checkEmptyRoom){
            toastr()->error(trans('Đã hết Căn hộ trống'));
            return back();
        }
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

    public function addBookingFromAppointment($id){
        $checkEmptyRoom = $this->room->checkEmptyRoom();
        if(!$checkEmptyRoom){
            toastr()->error(trans('Đã hết Căn hộ trống'));
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
        if (Auth::user()->role==1){
            return redirect()->route('dashboard');
        }
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
            $this->syncRequestUpdate($request, $booking);
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
        if ($booking->bill) {
            toastr()->error('Không thể xoá hợp đồng');
            return back();
        }
        $booking->delete();
        toastr()->success(trans('site.message.delete_success'));

        return redirect()->route('bookings.index');
    }

    public function syncRequest($request, Booking $booking, Customer $customer)
    {
        // create new customer
        $customerOld = Customer::where('personal_id',$request->input('personal_id'))->first();
        if($customerOld){
            $customerId = $customerOld->id;
        }else{
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('phone');
            $customer->room_id = $request->input('room_id');
            $customer->personal_id = $request->input('personal_id');
            $customer->admin_id = Auth::user()->id;
            $customer->save();
            $customerId = $customer->id;
        }


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
        $booking->customer_id = $customerId;
        $booking->admin_id = Auth::user()->id;
        $booking->save();



        $phone = $this->customer->find($booking->customer_id)->phone;

        // lịch hẹn của căn hộ được ký hđ
        $appointment = $this->appointment->where(['phone' => $phone, 'room_id' => $booking->room_id])->first();

        //lịch hẹn liên quan tới căn hộ đã được ký hđ -> hủy hẹn
        $otherAppointment = $this->appointment->where('room_id', $booking->room_id)->where('phone','<>',$phone)->get();
        foreach ($otherAppointment as $other){
            $this->appointment->where(['phone' => $other->phone, 'room_id' => $booking->room_id])->update(['status'=>4]) ;
        }

        // cọc
        // type 0 - cọc giữ chỗ
        $otherDepositses = $this->deposits->where('room_id', $booking->room_id)->where('type',0)->where('phone','<>',$phone)->get();
        foreach ($otherDepositses as $otherDeposits){
            $this->deposits->where(['phone' => $otherDeposits->phone, 'room_id' => $booking->room_id])->update(['status'=>1]) ;
        }

        $deposits = $this->deposits->where(['phone' => $phone, 'room_id' => $booking->room_id])->first();
        if($deposits){
            $this->deposits->where(['phone' => $phone, 'room_id' => $booking->room_id])->update(['status'=>1]) ;
        }


        if($appointment){
            $this->appointment->where(['phone' => $phone, 'room_id' => $booking->room_id])->update(['status'=>3]);
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

        // revert booked in room
        $current_booking = $this->booking->find($booking->id);
        $current_booking->services()->sync($request->input('services'));

        // update booked Căn hộ
        $room = $current_booking->room()->find($booking->room_id);
        $room->booked = 1;
        $room->save();
    }

    public function syncRequestUpdate($request, Booking $booking)
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

    }

    public function checkout($bookingId){
//        kiểm tra hóa đơn mới nhất chưa
        $lastestMonthOfBill = 0;
        $lastestBill = Bill::where('booking_id', $bookingId)->orderBy('id','desc')->first();
        if($lastestBill){
            $lastestMonthOfBill = Carbon::createFromFormat('Y-m-d', $lastestBill->month )->month;
        }

        $current = date('m');
        $booking = Booking::find($bookingId);

        $customer = $booking->customer()->find($booking->customer_id);
        $current_room = $booking->room;
        $check = true;
        if($booking->date_end > date('Y-m-d')){
            $check = false;
        }
        if($lastestMonthOfBill == 0 || (int)$current >  $lastestMonthOfBill){
            toastr()->error('Vui lòng lập hóa đơn cho tháng hiện tại trước khi thanh lý hợp đồng','Thông báo',['timeOut'=>5000]);
            return back();
        }else{
            if($lastestBill->status==0){
                toastr()->error('Vui lòng thanh toán hóa đơn còn nợ trước khi thanh lý hợp đồng','Thông báo',['timeOut'=>5000]);
                return back();
            }
        }
        return view('admin.bookings.checkout', compact('check','booking','current_room','customer'));
    }

    public function confirmCheckout($id){
        $booking = Booking::find($id);
        $booking->update(['active'=>0]);
        $booking->room->booked = 0;
        $booking->room->save();
        toastr()->error('Đã thanh lý hợp đồng');
        return redirect()->route('bookings.index');
    }
}
