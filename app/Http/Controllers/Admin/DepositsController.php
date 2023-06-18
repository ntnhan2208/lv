<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepositsRequest;
use App\Models\Appointment;
use App\Models\Deposits;
use App\Models\Room;
use Illuminate\Http\Request;
use DB;

class DepositsController extends BaseAdminController
{
    public function __construct(Deposits $deposits, Room $room, Appointment $appointment)
    {
        $this->deposits = $deposits;
        $this->room = $room;
        $this->appointment = $appointment;
        parent::__construct();
    }

    public function index()
    {
        $depositses = $this->deposits->all();
        return view('admin.deposits.index', compact('depositses'));
    }

    public function create()
    {
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        return view('admin.deposits.add', compact('rooms'));
    }

    public function store(DepositsRequest $request, deposits $deposits)
    {
        $this->syncRequest($request, $deposits);
        DB::beginTransaction();
        try {
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('deposits.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function edit($id)
    {
        $deposits = $this->deposits->find($id);
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        if ($deposits) {
            return view('admin.deposits.edit', compact('deposits', 'rooms'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect()->route('deposits.index');
    }


    public function update(DepositsRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $deposits = $this->deposits->find($id);
            $this->syncRequest($request, $deposits);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('deposits.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function destroy($id)
    {
        $deposits = $this->deposits->find($id);
        $deposits->delete();
        toastr()->success(trans('site.message.delete_success'));
        return redirect()->route('deposits.index');
    }

    public function addDepositsFromAppointment($id){
        $checkEmptyRoom = $this->room->checkEmptyRoom();
        if(!$checkEmptyRoom){
            toastr()->error(trans('Đã hết phòng trống'));
            return back();
        }
        $appointment = $this->appointment->find($id);
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        return view('admin.deposits.add-from-appointment', compact('appointment','rooms'));
    }

    public function syncRequest($request, Deposits $deposits)
    {
        $deposits->name = $request->input('name');
        $deposits->phone = $request->input('phone');
        $deposits->date = $request->input('date');
        $deposits->date_start = $request->input('date_start');
        $deposits->type = $request->input('type');
        $deposits->note = $request->input('note');
        $deposits->price = $request->input('price');
        $deposits->room_id = $request->input('room_id');
        $deposits->status = $request->input('status') <> 0 ? $request->input('status') : 0;
        $deposits->save();


        //cập nhật lại status thành đặt cọc
        $appointment = $this->appointment->where(['phone' => $deposits->phone, 'room_id' => $deposits->room_id])->first();
        if($appointment){
           $this->appointment->where(['phone' => $deposits->phone, 'room_id' => $deposits->room_id])->update(['status'=>2]) ;
        }
        $this->room->where(['id' => $deposits->room_id])->update(['booked'=>1]) ;
    }
}
