<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends BaseAdminController
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        parent::__construct();
    }

    public function index()
    {
        $customers = $this->customer->search()->orderBy('room_id','asc')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create(Request $request)
    {
        $room = $request->room;
        return view('admin.customers.add', compact('room'));
    }

    public function store(CustomerRequest $request, Customer $customer)
    {
        DB::beginTransaction();
        try {
            $this->syncRequest($request, $customer);
            $this->customer->where('id', $customer->id)->update(['room_id'=>$request->room]);
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('customers.index');

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function edit($id)
    {
        $customer = $this->customer->find($id);
        $bookings = $customer->bookings()->get();
        if ($customer) {
            return view('admin.customers.edit', compact('customer', 'bookings'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect()->route('customers.index');
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = $this->customer->find($id);
        $this->syncRequest($request, $customer);

        DB::beginTransaction();
        try {
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('customers.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function destroy($id)
    {
        $customer = $this->customer->find($id);
        if ($customer->bookings()->exists()) {
            toastr()->error('Khách hàng đang có hợp đồng. Không thể xoá!');
        } else {
            $customer->delete();
            toastr()->success(trans('site.message.delete_success'));
        }
        return redirect()->route('customers.index');
    }

    public function syncRequest($request, Customer $customer)
    {
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->personal_id = $request->input('personal_id');
        $customer->phone = $request->input('phone');
        $customer->admin_id = Auth::user()->id;
        $customer->save();
    }
}
