<?php

namespace App\Http\Controllers\Admin;

use App;
use Illuminate\Routing\Controller as BaseController;
use View;

class BackendController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $locale = App::getLocale();
        View::share(['locale' => $locale]);
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }
}