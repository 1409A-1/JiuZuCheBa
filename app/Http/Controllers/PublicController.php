<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class PublicController extends Controller
{
    // 供前台 js 用 ajax post 方式查询数据

    //城市列表，返回 json 格式数据
    public function getCityList()
    {
        $address = DB::table('address')->get();
        $data = $this->noLimit($address);
        foreach ($data as $k => $v) {
            $city[$k]['city_name']    = $v['address_name'];
            $city[$k]['city_abridge'] = $v['abridge'];
            $city[$k]['city_type']    = $v['type'];
        }
        echo json_encode($city, JSON_UNESCAPED_UNICODE);
    }

    // 服务点列表，返回 json 格式数据
    public function getServerList(Request $request)
    {
        if ($request->has('city_name')) {
            // 获取对应城市服务点
            $server = DB::table('server')->where('city_name', $request->input('city_name'))->get();
        } else {
            // 获取取车、还车服务点
            $start_shop = DB::table('server')->where('server_id', $request->input('start_shop_id'))->first();
            $stop_shop  = DB::table('server')->where('server_id', $request->input('stop_shop_id'))->first();
            $server = array('start_shop' => $start_shop, 'stop_shop' => $stop_shop);
        }
        echo json_encode($server, JSON_UNESCAPED_UNICODE);
    }

    // 服务点列表，返回 json 格式数据
    public function getCarList(Request $request)
    {
//                "start_time": start_time,
//                "stop_time": stop_time,
//                "begin_date": begin_date,
//                "end_date": end_date,
        $car = DB::table('car_number as n')
            ->leftJoin('car_info as i', 'n.car_id', '=', 'i.car_id')
            ->leftJoin('car_type as t', 'i.type_id', '=', 't.type_id')
            ->leftJoin('car_brand as b', 'i.brand_id', '=', 'b.brand_id')
            ->where('server_id', $request->input('shop_id'))
            ->where('number', '<>', 0)
            ->get();

        echo json_encode($car, JSON_UNESCAPED_UNICODE);
    }

    // 无限极分类
    public function noLimit($data, $pid = 0, $indent = 0)
    {
        static $array = Array();
        foreach($data as $son) {
            if ($son['parent_id'] == $pid) {
                $son['indent'] = $indent;
                $array[] = $son;
                $this->noLimit($data, $son['address_id'], $indent + 1);
            }
        }
        return $array;
    }
}
