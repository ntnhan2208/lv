<?php

namespace App\Http\Controllers\Web;

use App\Models\Employee;
use App\Models\Room;
use App\Models\Service;

class AboutController extends BaseFEController
{
    function __construct(Room $room, Employee $employee, Service $service)
    {
        $this->room = $room;
        $this->employee = $employee;
        $this->service = $service;
    }

    public function index()
    {
        $rooms = $this->room->all()->count();
        $services = $this->service->all();
        $employees = $this->employee->all()->count();
        return view('web.about', compact('rooms', 'services', 'employees'));
    }

}
