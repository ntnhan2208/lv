<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Employee;
use DB;

class AppointmentController extends BaseFEController
{
    public function __construct(Appointment $appointment, Employee $employee)
    {
        $this->employee = $employee;
        $this->appointment = $appointment;
        parent::__construct();
    }

    public function store(Request $request, Appointment $appointment)
    {
        //trùng sđt và căn hộ
        $currentAppointment = $this->appointment->where('phone',$request->phone)->where('room_id',$request->room_id)->first();
        $room = Room::find($request->room_id);
        if($room && $room->booked == 1){
            return response()->json(['error' => 'Căn hộ đã có người đặt!'], 200);
        }
        if ($currentAppointment){
            return response()->json(['error' => 'Rất tiếc, đã xảy ra lỗi!'], 200);
        }
        if($request->name==null){
            return response()->json(['error' => 'Tên không được để trống'], 200);
        }
        if($request->phone==null){
            return response()->json(['error' => 'Số điện thoại không được để trống'], 200);
        }
        if($request->date < date('Y-m-d')){
            return response()->json(['error' => 'Ngày hẹn không hợp lệ'], 200);
        }

        DB::beginTransaction();
        try {
            $this->syncRequest($request, $appointment);
            DB::commit();
            return response()->json(['success' => 'Đã đặt lịch hẹn thành công!'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Rất tiếc, đã xảy ra lỗi!'], 200);
        }
    }

    public function syncRequest($request, Appointment $appointment)
    {
        $employee = $this->employee->pluck('id')->unique()->toArray();
        shuffle($employee);
        $appointment->name = $request->input('name');
        $appointment->phone = $request->input('phone');
        $appointment->date = $request->input('date');
        $appointment->room_id = $request->input('room_id');
        $appointment->employee_id = $employee[0];
        $appointment->status = 0;
        $appointment->save();
    }
}
