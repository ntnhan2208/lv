<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Request;
use Spatie\Activitylog\Models\Activity;

class ActivitylogController extends BaseAdminController
{
    public function index()
    {
        return view('admin.activitylog.index');
    }
}
