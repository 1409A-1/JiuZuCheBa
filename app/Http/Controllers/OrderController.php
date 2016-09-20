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
        $arr = DB::table('order')
            ->where('ord_package' ,0)
            ->get();
        if (!$arr) {
            $orderArr = DB::table('order')
                ->join('user','user.user_id','=','order.user_id')
                ->join('package','package.pack_id','=','order.ord_package')
                ->get();
        } else {
            $orderArr = DB::table('order')
                ->join('user','user.user_id','=','order.user_id')
                ->get();
        }

        return view('admin.order.orderList',['data' => $orderArr]);
    }
    public function orderInfo($id)
    {
        $ben = DB::table('order_info')
            ->where('benefit_id',0)
            ->first();
        if (!$ben) {
            $arr = DB::table('order_info')
                ->join('server','server.server_id','=','order_info.departure')
                ->join('car_type','car_type.type_id','=','order_info.car_type')
                ->join('car_brand','car_brand.brand_id','=','order_info.car_brand')
                ->join('benefit','benefit.benefit_id','=','order_info.benefit_id')
                ->join('car_info','car_info.car_id','=','order_info.car_id')
                ->where('ord_id',$id)
                ->first();
        } else {
            $arr = DB::table('order_info')
                ->join('server','server.server_id','=','order_info.departure')
                ->join('car_type','car_type.type_id','=','order_info.car_type')
                ->join('car_brand','car_brand.brand_id','=','order_info.car_brand')
    //           ->join('benefit','benefit.benefit_id','=','order_info.benefit_id')
                ->join('car_info','car_info.car_id','=','order_info.car_id')
                ->where('ord_id',$id)
                ->first();

        }
        $arr2 = DB::table('order_info')
            ->join('server','server.server_id','=','order_info.destination')
            ->where('ord_id',$id)
            ->first();
        $arr['destination'] = $arr2['server_name'];
        $order_arr = DB::table('order')
            ->where('ord_id',$id)
            ->first();
        //print_r($arr);die;
        return view('admin.order.orderInfo',['data' => $arr,'arr' => $order_arr]);
    }
    public function carry($id)
    {
        $re = DB::table('order')
            ->where('ord_id', $id)
            ->update([
                'ord_pay'  =>  2
            ]);
        if($re){
            return redirect(url('orderLists'));
        }else{
            return redirect(url('orderInfo'));
        }
    }
    public function still(Request $request,$id)
    {
        $re = DB::table('order')
            ->where('ord_id', $id)
            ->update([
                'ord_pay'  =>  4
            ]);
        if($re){
            return redirect(url('orderLists'));
        }else{
            echo "<script>alert('发生未知错误。'); location.href='".url('orderInfo')."';</script>";die;
        }
    }
    public function integralManagement(Request $request)
    {
        $arr = $request->all();
        $re = DB::table('order')
            ->where(['ord_id' => $arr['id'],'ord_pay' => 2])
            ->first();
        if ($re) {
            $user_id = $re['user_id'];
            if ($arr['consumption'] == 0) {
                $credit = DB::table('user')
                    ->where('user_id' , $user_id)
                    ->first();
                DB::table('user')
                    ->where(['user_id' => $user_id])
                    ->update([
                        'credit'   =>  $credit['credit']+4
                    ]);
                DB::table('credit')
                    ->insert([
                        'user_id' => $user_id,
                        'points'  => 4,
                        'status'  => 1,
                        'reason'  => '油量正常',
                        'add_time'=> time()
                    ]);
            } else {
                $credit = DB::table('user')
                    ->where('user_id' , $user_id)
                    ->first();
                DB::table('user')
                    ->where(['user_id' => $user_id])
                    ->update([
                        'credit'   =>  $credit['credit']-4
                    ]);
                DB::table('credit')
                    ->insert([
                        'user_id' => $user_id,
                        'points'  => 4,
                        'status'  => 0,
                        'reason'  => '油量偏少',
                        'add_time'=> time()
                    ]);
            }
            if ($re) {
                if ( $arr['carDamage'] == 0) {
                    $credit = DB::table('user')
                        ->where('user_id' , $user_id)
                        ->first();
                    DB::table('user')
                        ->where(['user_id' => $user_id])
                        ->update([
                            'credit'   =>  $credit['credit']-4
                        ]);
                    DB::table('credit')
                        ->insert([
                            'user_id' => $user_id,
                            'points'  => 4,
                            'status'  => 0,
                            'reason'  => '车辆有损坏',
                            'add_time'=> time()
                        ]);
                }else{
                    $credit = DB::table('user')
                        ->where('user_id' , $user_id)
                        ->first();
                    DB::table('user')
                        ->where(['user_id' => $user_id])
                        ->update([
                            'credit'   =>  $credit['credit']+4
                        ]);
                    DB::table('credit')
                        ->insert([
                            'user_id' => $user_id,
                            'points'  => 4,
                            'status'  => 1,
                            'reason'  => '车辆无损坏',
                            'add_time'=> time()
                        ]);
                }

            }
        }
    }
    //订单查询
    public function orderInquiry(Request $request)
    {
        $arr = $request->all();
        if ($arr['orderIn'] == 0) {
            return redirect('orderLists');
        }
        if ($arr['orderIn'] == 1) {
            $orderIn = DB::table('order')
                ->where(['ord_pay' => 0])
                ->get();
            return view('admin.order.orderInquiry',['data' => $orderIn]);
        } else if ($arr['orderIn'] == 2) {
            $orderIn = DB::table('order')
                ->join('user','user.user_id','=','order.user_id')
                ->where(function($query){
                    $query->where(['ord_pay' => 1])
                        ->orWhere(function($query){
                            $query->where(['ord_pay' => 2])
                            ->orWhere(function($query){
                                $query->where(['ord_pay' => 3])
                                    ->orWhere(function($query){
                                        $query->where(['ord_pay' => 4]);
                                    });
                            });
                        });
                })->get();
            return view('admin.order.orderInquiry',['data' => $orderIn]);
        } else if ($arr['orderIn'] == 3) {
            $orderIn = DB::table('order')
                ->join('user','user.user_id','=','order.user_id')
                ->where(['ord_pay' => 1])
                ->get();
            return view('admin.order.orderInquiry',['data' => $orderIn]);
        } else if ($arr['orderIn'] == 4){
            $orderIn = DB::table('order')
                ->join('user','user.user_id','=','order.user_id')
                ->where(['ord_pay' => 2])
                ->get();
            return view('admin.order.orderInquiry',['data' => $orderIn]);
        }
    }
}
