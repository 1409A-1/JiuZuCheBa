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
        $kays_array = array('city_name', 'city_type', 'city_abridge');
        $add = $this->noLimit($address);
        print_r($add);
    }

    public function noLimit($items)
    {
        $tree = array();
        foreach ($items as $item) {
            if (empty($items[$item['parent_id']])) {
                $items[$item['parent_id']]['son'][] = &$items[$item['address_id']];
            } else {
                $tree[] = &$items[$item['address_id']];
            }
        }
        return $tree;
    }
}
