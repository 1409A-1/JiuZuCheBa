<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.admin');
    }
}