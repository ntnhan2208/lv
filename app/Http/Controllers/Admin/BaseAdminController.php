<?php

namespace App\Http\Controllers\Admin;

use App;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use View;

class BaseAdminController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
        $locale = App::getLocale();
        $time = Carbon::now()->toDateTimeString();
        View::share(['time' => $time]);
    }
}
