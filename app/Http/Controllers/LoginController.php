<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;

class LoginController extends Controller
{
    public function register()
    {
        return view('home.login.login_reg');
    }
    public function login()
    {
        return view('home.login.login');
    }



}