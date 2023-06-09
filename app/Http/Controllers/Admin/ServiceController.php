<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends BaseAdminController
{

    public function __construct(Service $service)
    {
        $this->service = $service;
        parent::__construct();
    }

    public function index()
    {
        $services = $this->service->all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.add');
    }


    public function store(ServiceRequest $request, Service $service)
    {
        DB::beginTransaction();

        $this->syncRequest($request, $service);
        DB::commit();
        try {
            $this->syncRequest($request, $service);
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('services.index');

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function edit($id)
    {
        $service = $this->service->find($id);
        if ($service) {
            return view('admin.services.edit', compact('service'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect(route('services.index'));
    }


    public function update(ServiceRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $service = $this->service->find($id);
            $this->syncRequest($request, $service);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('services.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function destroy($id)
    {
        $service = $this->service->find($id);
        if ($service->bookings()->exists()) {
            toastr()->error('Đang có đơn hàng đặt dịch vụ này. Không thể xoá!');
        } else {
            $service->delete();
            toastr()->success(trans('site.message.delete_success'));
        }
        return redirect()->route('services.index');
    }

    public function syncRequest($request, Service $service)
    {
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->is_enabled = $request->input('is_enabled');
        $service->admin_id = Auth::user()->id;
        $service->save();
    }
}
