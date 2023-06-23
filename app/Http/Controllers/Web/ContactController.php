<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends BaseFEController
{
    public function index(){
        return view('web.contact');
    }
}
