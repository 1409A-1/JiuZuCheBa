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
    public function driving(){
        $type = DB::table('car_type')->get();
        return view('home.index.short_driving', compact('type'));
    }

    //长租
    public function lease_car(){

        return view('home.index.lease_car');
    }
    //企业租车
    public function e_rent_car(){

        return view('home.index.e_rent_car');
    }
    //优惠活动
    public function pre_activity() {

        return view('home.index.pre_activity');
    }
    //招商加盟
    public function attract(){

        return view('home.index.attract');
    }
}