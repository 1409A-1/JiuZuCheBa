<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class PublicController extends Controller
{
    // 供前台 js 用 ajax post 方式查询城市列表，返回 json 格式数据
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

    public function getServerList(Request $request)
    {
        $server = DB::table('server')->where('city_name', $request->input('city_name'))->get();
        echo json_encode($server, JSON_UNESCAPED_UNICODE);
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
