<?php

namespace App\Http\Controllers\Web;

use App\Models\Room;
use App\Models\Service;
use App\Models\Type;
use DB;

class HomeController extends BaseFEController
{
    public function __construct(Room $room, Type $type, Service $service)
    {
        $this->room = $room;
        $this->type = $type;
        $this->service = $service;
    }

    public function index()
    {
        $rooms = $this->room->where('is_enabled', 1)->where('booked', 0)->get()->sortBy('price')->take(-3);
        $types = $this->type->all();
        $services = $this->service->where('is_enabled', 1)->get();
        return view('web.homepage', compact('rooms', 'types', 'services'));
    }
}
