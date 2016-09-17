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
        $fast = $request->input();
        if (!$fast) {
             $fast['take_id'] = '';
             $fast['takeWeek'] = '';
             $fast['startHours1'] = '';
             $fast['endHours1'] = '';
             $fast['return_id'] = '';
             $fast['returnWeek'] = '';
             $fast['startHours2'] = '';
             $fast['endHours2'] = '';
             $fast['start_time'] = '';
             $fast['stop_time'] = '';
             $fast['begin_date'] = '';
             $fast['end_date'] = '';

        }
        $fast = json_encode($fast, JSON_UNESCAPED_UNICODE);
        return view('home.index.short', ['type'=> $type, 'fast'=> $fast]);
    }
    //长租
    public function long(){
        $type = DB::table('car_type')->get();
        return view('home.index.long', compact('type'));
    }
}