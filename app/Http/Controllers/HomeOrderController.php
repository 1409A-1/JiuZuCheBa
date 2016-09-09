<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

//-----------------------订单的控制器----------------------------------//
class HomeOrderController extends Controller
{
//进行选车侯的提交订单
    public function subOrder(Request $request)
    {
        $start_shop_id = $request->input('start_shop_id');      //提车点的的id
        $stop_shop_id = $request->input('stop_shop_id');        //还车的地点
        //$start_date = $request->input('start_date');            //提车点的日期
        //$stop_date = $request->input('stop_date');             //还车的日期
        $class_id = $request->input('class_id');              //车辆的类型
        $car_id = $request->input('offersid');              //车辆的详细id

        $order['start_shop'] = $this->serverId($start_shop_id);
        $order['start_shop']['start_date'] = $request->input('start_date');
        $order['stop_shop'] = $this->serverId($stop_shop_id);
        $order['stop_shop']['stop_date'] = $request->input('stop_date');
        $order['car_info'] = $this->carInfo($car_id);
     // print_r($order);die;
         $data = json_encode($order, JSON_UNESCAPED_UNICODE);
        return view('home.order.suborder',['data'=>$data]);
    }

//服务地方法
    public function serverId($id){
       return DB::table('server')
            ->where('server_id',$id)
            ->first();
    }
//车辆信息
    public function carInfo($car_id){
        return DB::table('car_info')
            ->leftJoin('car_brand', 'car_info.brand_id' ,'=', 'car_brand.brand_id')
            ->where('car_id',$car_id)
            ->first();
    }
}
