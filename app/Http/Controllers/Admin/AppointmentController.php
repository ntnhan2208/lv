<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use DB;

class AppointmentController extends BaseAdminController
{
    public function __construct(Room $room, Appointment $appointment, Employee $employee)
    {
        $this->room = $room;
        $this->employee = $employee;
        $this->appointment = $appointment;
        parent::__construct();
    }

    public function index()
    {
        $appointments = $this->appointment->all();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $checkEmptyRoom = $this->room->checkEmptyRoom();
        if(!$checkEmptyRoom){
            toastr()->error(trans('Đã hết phòng trống'));
            return back();
        }
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $employees = $this->employee->all();
        return view('admin.appointments.add', compact('rooms', 'employees'));
    }

    public function store(AppointmentRequest $request, Appointment $appointment)
    {
        $this->syncRequest($request, $appointment);
        DB::beginTransaction();
        try {
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('appointments.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function edit($id)
    {
        $appointment = $this->appointment->find($id);
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $employees = $this->employee->all();
        if ($appointment) {
            return view('admin.appointments.edit', compact('appointment','employees', 'rooms'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect()->route('appointment.index');
    }


    public function update(AppointmentRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $appointment = $this->appointment->find($id);
            $this->syncRequest($request, $appointment);
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('appointments.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function destroy($id)
    {
        $appointment = $this->appointment->find($id);
        $appointment->delete();
        toastr()->success(trans('site.message.delete_success'));
        return redirect()->route('appointments.index');
    }

    public function syncRequest($request, Appointment $appointment)
    {
        $appointment->name = $request->input('name');
        $appointment->phone = $request->input('phone');
        $appointment->date = $request->input('date');
        $appointment->room_id = $request->input('room_id');
        $appointment->employee_id = $request->input('employee_id');
        $appointment->status = $request->input('status') <> 0 ? $request->input('status') : 0;
        $appointment->save();
    }
}
