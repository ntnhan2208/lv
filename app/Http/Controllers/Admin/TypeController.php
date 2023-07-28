<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TypeController extends BaseAdminController
{

    public function __construct(Type $type)
    {
        $this->type = $type;
        parent::__construct();
    }

    public function index()
    {
        if (Auth::user()->role==1){
            return redirect()->route('dashboard');
        }
        $types = $this->type->all();
        return view('admin.types.index', compact('types'));
    }


    public function create()
    {
        if (Auth::user()->role==1){
            return redirect()->route('dashboard');
        }
        return view('admin.types.add');
    }


    public function store(TypeRequest $request, Type $type)
    {
        DB::beginTransaction();
        try {
            $this->syncRequest($request, $type);
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('types.index');

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role==1){
            return redirect()->route('dashboard');
        }
        $type = $this->type->find($id);
        if ($type) {
            return view('admin.types.edit', compact('type'));
        }

        toastr()->error(trans('site.message.error'));
        return redirect(route('types.index'));
    }


    public function update(TypeRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $type = $this->type->find($id);
            $this->syncRequest($request, $type);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('types.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function destroy($id)
    {
        $type = $this->type->find($id);
        if ($type->rooms()->exists()) {
            toastr()->error(trans('site.type.warning'));
        } else {
            $type->delete();
            toastr()->success(trans('site.message.delete_success'));
        }
        return redirect()->route('types.index');
    }

    public function syncRequest($request, Type $type)
    {
        $type->name = $request->input('name');
        $type->description = $request->input('description');
        $type->admin_id = Auth::user()->id;
        $type->save();
    }
}
