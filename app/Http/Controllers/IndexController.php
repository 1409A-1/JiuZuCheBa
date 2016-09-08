<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class IndexController extends Controller
{
    //首页
    public function home(){
        return view('home.index.home');
    }
    //短租
    public function short(){
        $type = DB::table('car_type')->get();
        return view('home.index.short', compact('type'));
    }
    //长租
    public function long(){
        $type = DB::table('car_type')->get();
        return view('home.index.long', compact('type'));
    }
}