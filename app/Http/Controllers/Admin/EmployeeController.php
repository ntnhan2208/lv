<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\EmployeesComission;
use App\Models\Manage;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends BaseAdminController
{
    protected $employee;
    private $admin;

    public function __construct(Employee $employee, Admin $admin)
    {
        $this->employee = $employee;
        $this->admin = $admin;
        parent::__construct();
    }

    public function index()
    {
        $employees = $this->employee->search()->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.add');
    }


    public function store(EmployeeRequest $request, Employee $employee)
    {

        DB::beginTransaction();
        try {
            $this->syncRequest($request, $employee);
            $this->admin->create($request->all());
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('employees.index');

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function edit($id)
    {
        $employee = $this->employee->find($id);
        if ($employee) {
            return view('admin.employees.edit', compact('employee'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect()->route('employees.index');
    }


    public function update(EmployeeRequest $request, $id)
    {

        DB::beginTransaction();
        try {
            $employee = $this->employee->find($id);
            $this->syncRequest($request, $employee);
            $admin = Admin::where('personal_id', $employee->personal_id)->first();
            $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'personal_id'=>$request->personal_id,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'commission'=>$request->commission,
                'admin_id'=>Auth::user()->id,
            ]);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function destroy($id)
    {
        $employee = $this->employee->find($id);
        if($employee->appointment->exists()){
            toastr()->error('Nhân viên môi giới có lịch hẹn, không thể xóa');
            return redirect()->route('employees.index');
        }else{
            $employee->delete();
            toastr()->success(trans('site.message.delete_success'));
            return redirect()->route('employees.index');
        }

    }

    public function syncRequest($request, Employee $employee)
    {
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->personal_id = $request->input('personal_id');
        $employee->gender = $request->input('gender');
        $employee->phone = $request->input('phone');
        $employee->commission = $request->input('commission');
        $employee->image = $request->input('image');
        $employee->admin_id = Auth::user()->id;
        $employee->save();
    }

    public function commission($employeeId){
        $commission = EmployeesComission::where('employee_id',$employeeId)->get();
        return view('admin.employees.commission', compact('commission'));

    }

    public function showReadyRoom(){
        $readyRooms = Room::where('is_enabled', 1)->where('booked', 0)->get();
        return view('admin.employees.room', compact('readyRooms'));
    }
    public function changeStatus(Request $request){
        $commission = EmployeesComission::find($request->id);
        if($commission){
            $commission->update(['status'=>1]);
            return response()->json(['success' => 'Cập nhật thành công!'], 200);
        }
        return response()->json(['error' => 'Lỗi dữ liệu'], 200);
    }
}
