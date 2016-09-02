<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;

class CarTypeController extends Controller
{
    public function list()
    {
        return view('admin.cartype.list');
    }
}