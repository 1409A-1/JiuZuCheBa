<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\CarType;
use App\Picture;
use DB,Session;

class IndexController extends Controller
{
    //首页
    public function home(){
        $package = DB::table('package')->limit(3)->get();
        $turn = Picture::where("type", 0)->where("isUse", 0)->get()? Picture::where("type", 0)->where("isUse", 0)->get()->toArray(): array();
        $active = Picture::where("type", 1)->where("isUse", 0)->get()? Picture::where("type", 1)->where("isUse", 0)->get()->toArray(): array();
        return view('home.index.home', ['package' => $package, 'turn' => $turn, 'active' => $active]);
    }
    //短租
    public function short(Request $request)
    {
        $path = $request->path();            //当前的路由的名字
        Session::put('path', $path);
		// 车辆类型
        $type = CarType::all();
        $fast['take_id'] = $request->input('take_id', '');
        $fast['takeWeek'] = $request->input('takeWeek', '');
        $fast['startHours1'] = $request->input('startHours1', '');
        $fast['endHours1'] = $request->input('endHours1', '');
        $fast['return_id'] = $request->input('return_id', '');
        $fast['returnWeek'] = $request->input('returnWeek', '');
        $fast['startHours2'] = $request->input('startHours2', '');
        $fast['endHours2'] = $request->input('endHours2', '');
        $fast['start_time'] = $request->input('start_time', '');
        $fast['stop_time'] = $request->input('stop_time', '');
        $fast['begin_date'] = $request->input('begin_date', '');
        $fast['end_date'] = $request->input('end_date', '');

        $fast['shop_id'] = $request->input('shop_id', '');            //推荐进入服务点id
        $fast['StartDateTime'] = $request->input('StartDateTime', '');//开始时间
        $fast['EndDateTime'] = $request->input('EndDateTime', '');    //结束时间
        $fast['class_id'] = $request->input('class_id', '');          //车辆id
        $fast = json_encode($fast, JSON_UNESCAPED_UNICODE);
        return view('home.index.short', ['type' => $type, 'fast' => $fast]);
    }
    //长租
    public function long(){
        $type = DB::table('car_type')->get();
        return view('home.index.long', compact('type'));
    }

    //404页面
    public function err404(){
        return view('home.404.404');
    }
}