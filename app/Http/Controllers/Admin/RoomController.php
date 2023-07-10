<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends BaseAdminController
{

    public function __construct(Room $room, Type $type)
    {
        $this->room = $room;
        $this->type = $type;
        parent::__construct();
    }

    public function index()
    {
        $rooms = $this->room->all();
        $readyRooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get();
        $bookedRooms = $this->room->where('is_enabled', 1)->where('booked', 1)->get();
        return view('admin.rooms.index', compact('rooms', 'readyRooms', 'bookedRooms'));
    }


    public function create()
    {
        $types = $this->type->all();
        return view('admin.rooms.add', compact('types'));
    }
    public function store(RoomRequest $request, Room $room)
    {
        DB::beginTransaction();
        $this->syncRequest($request, $room);
        try {
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('rooms.index');

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function edit($id)
    {
        $room = $this->room->find($id);
        $types = $this->type->all();
        if ($room) {
            return view('admin.rooms.edit', compact('room', 'types'));
        }

        toastr()->error(trans('site.message.error'));
        return redirect(route('rooms.index'));
    }


    public function update(RoomRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $room = $this->room->find($id);
            $this->syncRequest($request, $room);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('rooms.index');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }


    public function destroy($id)
    {
        $room = $this->room->find($id);
        if ($room->booking()->exists()) {
            toastr()->error('Đang có đơn hàng đặt Căn hộ này. Không thể xoá!');
        } else {
            $room->delete();
            toastr()->success(trans('site.message.delete_success'));
        }
        return redirect()->route('rooms.index');
    }

    public function syncRequest($request, Room $room)
    {
        $room->name = $request->input('name');
        $room->description = $request->input('description');
        $room->amount = $request->input('amount');
        $room->acreage = $request->input('acreage');
        $room->price = $request->input('price');
        $room->is_enabled = $request->input('is_enabled');
        $room->image = $request->input('image');
        $room->type_id = $request->input('type_id');
        $room->admin_id = Auth::user()->id;
        $room->save();
    }
}
