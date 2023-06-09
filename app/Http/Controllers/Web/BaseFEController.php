<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Utility\Sanitize;
use App\Models\Language;
use App;
use View;

class BaseFEController extends App\Http\Controllers\Controller
{
    public function __construct()
    {
        $locale = App::getLocale();
        View::share(['locale' => $locale]);
    }
}
