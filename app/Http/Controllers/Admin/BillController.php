<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends BaseAdminController
{

    public function __construct(Room $room, Booking $booking, Bill $bill)
    {
        $this->room = $room;
        $this->booking = $booking;
        $this->bill = $bill;
        parent::__construct();
    }


    public function index($id)
    {
        $room = $this->room->find($id);
        $bookingOfRoom = $room->booking->id;
        $bills = $this->bill->where('booking_id', $bookingOfRoom)->get();
        return view('admin.bills.index', compact('bills','room'));
    }


    public function create($id)
    {
        $room = $this->room->find($id);
        $bookingOfRoom = $this->booking->where('room_id',$id)->first();
        $inDebt = $bookingOfRoom->paid == 0 ? $bookingOfRoom->total_price : 0; //nợ của hợp đồng
        $bills = $this->bill->where('booking_id', $bookingOfRoom->id)->get();
        $lastestBill = $this->bill->where('booking_id', $bookingOfRoom->id)->orderBy('id','desc')->first();
        $oldElectric = $lastestBill ? $lastestBill->new_electric : 0;
        $oldWater = $lastestBill ? $lastestBill->new_water : 0;
        foreach ($bills as $bill){
            if($bill->status == 0){
                $inDebt += $bill->total;
            }
        }

        $services = $bookingOfRoom->services()->get();

        return view('admin.bills.add', compact('services','bookingOfRoom', 'inDebt', 'oldElectric', 'oldWater'));
    }


    public function store(BillRequest $request, $id, Bill $bill)
    {
        DB::beginTransaction();
        try {
            $this->syncRequest($request, $bill);
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('room-booked');

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }

    }


    public function edit($id)
    {
        $bill= $this->bill->find($id);
        $room = $bill->booking->room_id;
        $bookingOfRoom = $this->booking->where('room_id',$room)->first();
        $inDebt = $bookingOfRoom->paid == 0 ? $bookingOfRoom->total_price : 0;
        $bills = $this->bill->where('booking_id', $bookingOfRoom->id)->where('id','<>',$id)->get();
        foreach ($bills as $billOld){
            if($bill->status == 0){
                $inDebt += $billOld->total;
            }
        }

        return view('admin.bills.edit', compact('bill','inDebt'));
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->bill->where('id',$id)->update(['status'=> $request->status]);
            if($request->status == 1){
                $bill = $this->bill->where('id',$id)->first();
                $bill->booking->update(['paid'=> 1]);
                $bills = $this->bill->where('id','<',$bill->id)->where('status',0)->get();
                foreach ($bills as $billOld){
                    $billOld->update(['status'=>1]);
                }
            }
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('room-booked');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function syncRequest($request, Bill $bill)
    {
        $bill->month = \Carbon\Carbon::createFromFormat('Y-m', $request->month)->toDateTimeString();
        $bill->date = $request->input('date');
        $bill->deadline = $request->input('deadline');
        $bill->total_room = $request->input('total_room');
        $bill->service = $request->input('service');
        $bill->total_service = $request->input('total_service');
        $bill->total = $request->input('total');
        $bill->status = $request->input('status');
        $bill->booking_id = $request->input('booking_id');
        $bill->old_electric = $request->input('old_electric');
        $bill->new_electric = $request->input('new_electric');
        $bill->electric = $request->input('electric');
        $bill->old_water = $request->input('old_water');
        $bill->new_water = $request->input('new_water');
        $bill->water = $request->input('water');
        $bill->save();
        if($request->status == 1){
            $newBill = $this->bill->where('id',$bill->id)->first();
            $newBill->booking->update(['paid'=> 1]);

            $bills = $this->bill->where('id','<',$bill->id)->where('status',0)->get();
            foreach ($bills as $billOld){
                $billOld->update(['status'=>1]);
            }
        }
    }
}
