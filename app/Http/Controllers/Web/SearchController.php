<?php

namespace App\Http\Controllers\Web;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends BaseFEController
{
    public function __construct(Room $room, Type $type, Customer $customer)
    {
        $this->room = $room;
        $this->type = $type;
        $this->customer = $customer;
        parent::__construct();
    }

    public function search(Request $request)
    {
        $rooms = [];
        $type = $this->type->find($request->type);
        $ready_rooms = $type->rooms()->where('is_enabled', 1)->where('booked', 0)->get();
        foreach ($ready_rooms as $ready_room) {
            if ($ready_room->amount == $request->amount) {
                array_push($rooms, $ready_room);
            }
        }
        return view('web.search-result', compact('rooms'));
    }

    public function createSearchBooking()
    {
        return view('web.search-booking');
    }

    public function searchBooking(Request $request)
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


        $phone = $request->input('phone');
        $personal_id = $request->input('personal_id');
        $customer = $this->customer->where('phone', $phone)->first();
        if ($customer == null) {
            return redirect()->back()->with('message', 'Số điện thoại chưa có đặt Căn hộ! Vui lòng liên hệ khách sạn để hiểu thêm!');;
        }
        $bookings = $customer->bookings()->where('paid', 0)->where('active', 1)->get();
//        dd($bookings->count());
        if ($bookings->count()==0) {
            return redirect()->back()->with('message', 'Không có đặt Căn hộ! Vui lòng liên hệ khách sạn để hiểu thêm!');;

        }
        return view('web.search-boooking-result', compact('customer', 'bookings'));
    }
}
