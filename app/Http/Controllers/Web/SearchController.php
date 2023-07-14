<?php

namespace App\Http\Controllers\Web;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends BaseFEController
{
    public function __construct(Type $type)
    {

        $this->type = $type;

        parent::__construct();
    }

    public function search(Request $request)
    {
        $rooms = [];
        $type = $this->type->find($request->type);
        $ready_rooms = $type->rooms()->where('is_enabled', 1)->where('booked', 0)->get();
        foreach ($ready_rooms as $ready_room) {
            if ($ready_room->amount == $request->amount) {
                array_push($rooms, $ready_room);
            }
        }
        return view('web.search-result', compact('rooms'));
    }

}
