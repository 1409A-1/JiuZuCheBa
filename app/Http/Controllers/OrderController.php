<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orderList()
    {
        $orderArr = DB::table('order')
            ->join('user','user.user_id','=','order.user_id')
            ->join('package','package.pack_id','=','order.ord_package')
            ->get();
        return view('admin.order.orderList',['data' => $orderArr]);
    }
    public function orderInfo($id)
    {
        $arr = DB::table('order_info')
            ->join('server','server.server_id','=','order_info.departure')
            ->join('car_type','car_type.type_id','=','order_info.car_type')
            ->join('car_brand','car_brand.brand_id','=','order_info.car_brand')
           ->join('benefit','benefit.benefit_id','=','order_info.benefit_id')
            ->join('car_info','car_info.car_id','=','order_info.car_id')
            ->where('ord_id',$id)
            ->first();
        $arr2 = DB::table('order_info')
            ->join('server','server.server_id','=','order_info.destination')
            ->where('ord_id',$id)
            ->first();
        $arr['destination'] = $arr2['server_name'];
        $order_arr = DB::table('order')
            ->where('ord_id',$id)
            ->first();
        return view('admin.order.orderInfo',['data' => $arr,'arr' => $order_arr]);
    }
    public function carry($id)
    {
        echo $id;
    }
    public function still($id)
    {
        $re = DB::table('order')
            ->where('ord_id', $id)
            ->update([
                'ord_pay'  =>  4
            ]);
        if($re){
            return redirect(url('orderList'));
        }else{
            return redirect(url('orderInfo'));
        }
    }
}
