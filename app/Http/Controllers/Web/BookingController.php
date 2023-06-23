<?php

namespace App\Http\Controllers\Web;

use App\Jobs\SendEmailCancel;
use App\Models\Booking;
use App\Models\RequestBooking;
use App\Models\Room;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BookingController extends BaseFEController
{
    public function __construct(Room $room, Service $service, RequestBooking $requestBooking, Booking $booking)
    {
        $this->room = $room;
        $this->service = $service;
        $this->requestBooking = $requestBooking;
        $this->booking = $booking;
        parent::__construct();
    }

    public function createRequest($id)
    {
        $availables = $this->room->limit(3)->get();
        $room = $this->room->find($id);
        $services = $this->service->where('is_enabled', 1)->get();
        return view('web.booking', compact('room', 'availables', 'services'));
    }

    public function storeRequest(Request $request, RequestBooking $requestBooking)
    {
//        $messages = [
//            'g-recaptcha-response.required' => 'You must check the reCAPTCHA.',
//            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
//        ];
//
//        $validator = Validator::make($request->all(), [
//            'g-recaptcha-response' => 'required|captcha'
//        ], $messages);
//
//        if ($validator->fails()) {
//            return back()
//                ->withErrors($validator)
//                ->withInput();
//        }
        DB::beginTransaction();
        try {
            $this->syncRequest($request, $requestBooking);
            DB::commit();
            return redirect()->route('web_rooms.index')->with('success', 'Đặt phòng thành công! Nhân viên của khách sạn sẽ chủ động liện hệ với quý khách trong vòng 30 phút nữa để xác nhận và hướng dẫn quý khách thanh toán!');

        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    }

    public function syncRequest($request, RequestBooking $requestBooking)
    {
        $requestBooking->room_id = $request->input('room_id');
        $requestBooking->date_start = $request->input('date_start');
        $requestBooking->date_end = $request->input('date_end');
        $requestBooking->name = $request->input('name');
        $requestBooking->phone = $request->input('phone');
        $requestBooking->email = $request->input('email');
        $requestBooking->personal_id = $request->input('personal_id');
        $requestBooking->request = $request->input('request');
        $requestBooking->total_room = $request->input('total_room');
        $requestBooking->total_service = $request->input('total_service');
        $requestBooking->total_price = $request->input('total_price');
        $requestBooking->save();

        $room = $this->room->find($request->input('room_id'));
        $room->booked = 1;
        $room->save();

        $current_request = $this->requestBooking->find($requestBooking->id);
        $current_request->services()->sync($request->input('services'));
    }

    public function cancelBooking($id)
    {
        $booking = $this->booking->find($id);
        $booking->active = 0;
        $customer = $booking->customer;
//        $booking->services()->detach();
        $booking->room->booked = 0;
        $booking->room->save();
        $booking->save();
        $message = [
            'name' => $customer->name,
            'phone' => $customer->phone,
            'room' => $booking->room->name,
            'services' => $booking->services()->get(),
            'date_start' => $booking->date_start,
            'date_end' => $booking->date_end,
            'total_price' => $booking->total_price,
            'date' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
        ];
        SendEmailCancel::dispatch($message, $customer)->delay(now()->addMinute(1));

        return redirect()->route('frontend.home');
    }

//    public function storeRequest(Request $request, Booking $booking, Customer $customer)
//    {
////        $messages = [
////            'g-recaptcha-response.required' => 'You must check the reCAPTCHA.',
////            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
////        ];
////
////        $validator = Validator::make($request->all(), [
////            'g-recaptcha-response' => 'required|captcha'
////        ], $messages);
////
////        if ($validator->fails()) {
////            return back()
////                ->withErrors($validator)
////                ->withInput();
////        }
//
//        DB::beginTransaction();
//        $phone = $request->input('phone');
//        $customer_exists = $this->customer->where('phone', $phone)->first();
//        if ($customer_exists) {
//            $booking->customer_id = $customer_exists->id;
//            $this->syncRequest2($request, $booking);
//        } else {
//            $this->syncRequest($request, $booking, $customer);
//        }
//        try {
//            DB::commit();
//            return redirect()->route('frontend.home', ['success' => 'Your messge']);
//        } catch (\Exception $e) {
//            DB::rollback();
//            return back();
//        }
//    }
//
//    public function syncRequest($request, Booking $booking, Customer $customer)
//    {
//        //        create new customer
//        $customer->name = $request->input('name');
//        $customer->email = $request->input('email');
//        $customer->phone = $request->input('phone');
//        $customer->personal_id = $request->input('personal_id');
//        $customer->admin_id = 0;
//        $customer->save();
//
////        create booking
//        $booking->request = $request->input('request');
//        $booking->date_start = $request->input('date_start');
//        $booking->date_end = $request->input('date_end');
//        $booking->room_id = $request->input('room_id');
//        $booking->total_room = $request->input('total_room');
//        $booking->total_service = $request->input('total_service');
//        $booking->total_price = $request->input('total_price');
//        $booking->paid = 0;
//        $booking->customer_id = $customer->id;
//        $booking->admin_id = 0;
//        $booking->save();
//
//        $current_booking = $this->booking->find($booking->id);
//        $current_booking->services()->sync($request->input('services'));
//
//        $room = $this->room->find($request->input('room_id'));
//        $room->booked = 1;
//        $room->save();
//    }
//
//    public function syncRequest2($request, Booking $booking)
//    {
//        $booking->request = $request->input('request');
//        $booking->date_start = $request->input('date_start');
//        $booking->date_end = $request->input('date_end');
//        $booking->room_id = $request->input('room_id');
//        $booking->total_room = $request->input('total_room');
//        $booking->total_service = $request->input('total_service');
//        $booking->total_price = $request->input('total_price');
//        $booking->paid = 0;
//        $booking->admin_id = 0;
//        $booking->save();
//
//
//        $current_booking = $this->booking->find($booking->id);
//        $current_booking->services()->sync($request->input('services'));
//
//        $room = $this->room->find($request->input('room_id'));
//        $room->booked = 1;
//        $room->save();
//
//    }
}
