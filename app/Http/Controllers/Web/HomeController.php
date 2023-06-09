<?php

namespace App\Http\Controllers\Web;

use App\Models\Room;
use App\Models\Service;
use App\Models\Type;
use DB;

class HomeController extends BaseFEController
{

    public function index()
    {

        return view('welcome');
    }
}
