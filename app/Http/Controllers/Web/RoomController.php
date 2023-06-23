<?php

namespace App\Http\Controllers\Web;

use App\Models\Room;
use App\Models\Type;


class RoomController extends BaseFEController
{
    public function __construct(Room $room, Type $type)
    {
        $this->room = $room;
        $this->type = $type;
    }

    public function index()
    {
        $rooms = $this->room->where('is_enabled', '=', 1)->where('booked', 0)->get();
        $types = $this->type->all();
        return view('web.rooms', compact('rooms', 'types'));
    }

    public function show($id)
    {
        $room = $this->room->find($id);
        $availables = $this->room->limit(3)->get();
        $types = $this->type->all();
        return view('web.room-detail', compact('room', 'availables', 'types'));
    }

    public function showRoomType($id)
    {
        $type = $this->type->find($id);
        $rooms = $type->rooms()->where('is_enabled', '=', 1)->where('booked', 0)->get();
        return view('web.room-type', compact('type', 'rooms'));
    }
}
