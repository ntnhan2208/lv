<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Manage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends BaseAdminController
{
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
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
        $employee->delete();
        toastr()->success(trans('site.message.delete_success'));
        return redirect()->route('employees.index');
    }

    public function syncRequest($request, Employee $employee)
    {
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->personal_id = $request->input('personal_id');
        $employee->gender = $request->input('gender');
        $employee->phone = $request->input('phone');
        $employee->image = $request->input('image');
        $employee->admin_id = Auth::user()->id;
        $employee->save();
    }
}
