<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB,Session;

class IndexController extends Controller
{
    //首页
    public function home(){
        return view('home.index.home');
    }
    //短租
    public function short(Request $request){
        $path = $request->path();            //当前的路由的名字
        Session::put('path', $path);
        $type = DB::table('car_type')->get();
        return view('home.index.short', compact('type'));
    }
    //长租
    public function long(){
        $type = DB::table('car_type')->get();
        return view('home.index.long', compact('type'));
    }
}