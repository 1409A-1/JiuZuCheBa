<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Apply;
use App\Address;
use App\Car_info;
use App\Car_number;
use App\CarBrand;
use App\CarType;
use App\Server;
use DB;
use Session;

class PublicController extends Controller
{
    // 供前台 js 用 ajax post 方式查询数据

    //城市列表，返回 json 格式数据
    public function getCityList()
    {
        $city_id = Server::groupBy('address_id')->lists('address_id');
        $address = Address::whereIn('address_id', $city_id)->get();
        foreach ($address as $k => $v) {
            $city[$k]['city_name']    = $v['address_name'];
            $city[$k]['city_abridge'] = $v['abridge'];
            $city[$k]['city_type']    = $v['type'];
        }
        return json_encode($city, JSON_UNESCAPED_UNICODE);
    }

    // 服务点列表，返回 json 格式数据
    public function getServerList(Request $request)
    {
        if ($request->has('city_name')) {
            // 获取对应城市服务点
            $server = Server::where('city_name', $request->input('city_name'))->get();
        } else {
            // 获取取车、还车服务点
            $start_shop = Server::where('server_id', $request->input('start_shop_id'))->first();
            $stop_shop  = Server::where('server_id', $request->input('stop_shop_id'))->first();
            $server = array('start_shop' => $start_shop, 'stop_shop' => $stop_shop);
        }
        return json_encode($server, JSON_UNESCAPED_UNICODE);
    }

    // 服务点列表，返回 json 格式数据
    public function getCarList(Request $request)
    {
        $car = DB::table('car_number as n')
            ->leftJoin('car_info as i', 'n.car_id', '=', 'i.car_id')
            ->leftJoin('car_type as t', 'i.type_id', '=', 't.type_id')
            ->leftJoin('car_brand as b', 'i.brand_id', '=', 'b.brand_id')
            ->where('server_id', $request->input('shop_id'))
            ->get();
        return json_encode($car, JSON_UNESCAPED_UNICODE);
    }

    // 获取车辆类型
    public function getCarTypeList()
    {
        $carTypeList = CarType::all();
        return json_encode($carTypeList, JSON_UNESCAPED_UNICODE);
    }

    // 获取城市热门车型
    public function getSpecialCar(Request $request)
    {
        // 获取当前城市服务点ID
        $car = DB::table('server as s')
            ->select(DB::raw('
                s.server_id as id,
                i.car_id as class_id,
                b.brand_name,
                t.type_name as honda,
                i.car_img as class_image,
                i.car_price as work_week_price
                '))
            ->join('car_number as n', 's.server_id', '=', 'n.server_id')
            ->join('car_info as i', 'n.car_id', '=', 'i.car_id')
            ->leftJoin('car_type as t', 'i.type_id', '=', 't.type_id')
            ->leftJoin('car_brand as b', 'i.brand_id', '=', 'b.brand_id')
            ->where('city_name', $request->input('city'))
            ->limit(5,0)
            ->get();
        return json_encode($car, JSON_UNESCAPED_UNICODE);
    }

    // 根据门店获取车辆品牌
    public function getCarBrandByServer(Request $request)
    {
        $car_id = Car_number::where('server_id', $request->input('shop_id'))->lists('car_id');
        $brand_id = Car_info::whereIn('car_id', $car_id)->groupBy('brand_id')->lists('brand_id');
        $data['car'] = Car_info::whereIn('car_id', $car_id)->get();
        $data['brand'] = CarBrand::whereIn('brand_id', $brand_id)->get();
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    // 根据门店获取全国地图统计信息
    public function getServerForCountry()
    {
        $server = Server::all();
        return json_encode($server, JSON_UNESCAPED_UNICODE);
    }

    // 提交长租申请
    public function longRentApply(Request $request)
    {
        if (session::has('user_name')) {
            $apply = $request->input();
            $unit = strpos($apply['rent_month_count'], '月')? 'month': 'years';
            $data = array(
                'user_id' => session('user_id'),
                'departure' => $apply['start_shop_id'],
                'destination' => $apply['start_shop_id'],
                'dep_time' => strtotime($apply['start_date']),
                'des_time' => strtotime($apply['start_date'] . '+' . (int)$apply['rent_month_count'] . $unit),
                'car_type' => $apply['auto_count'], //暂作车辆租赁数量
                'car_brand' => $apply['brand_id'],
                'apply_time' => time(),
                'car_id' => $apply['contact_class_id'] //车辆id
            );
            if (Apply::create($data)) {
                return 1;
            }
        } else {
            return 0;
        }
    }

    // 无限极分类
    // public function noLimit($data, $pid = 0, $indent = 0)
    // {
    //     static $array = Array();
    //     foreach ($data as $son) {
    //         if ($son['parent_id'] == $pid) {
    //             $son['indent'] = $indent;
    //             $array[] = $son;
    //             $this->noLimit($data, $son['address_id'], $indent + 1);
    //         }
    //     }
    //     return $array;
    // }
}
