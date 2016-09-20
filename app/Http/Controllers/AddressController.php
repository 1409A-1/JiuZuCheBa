<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function address()
    {
        $arr = DB::table('address')
            ->where(['parent_id' => 0])
            ->get();
        return view('admin.address.address',['data' => $arr]);
    }
    public function addressTwo()
    {
        $id = $_GET['id'];
        if($id != 0){
            $arr = DB::table('address')
                ->where(['parent_id' => $id])
                ->get();
            $arr = json_encode($arr);
            echo $arr;
        }else{
            echo 0;
        }
    }
    public function addressList()
    {
        $arr = DB::table('server')
            ->join('address','server.address_id','=','address.address_id')
            ->get();
        return view('admin.address.addressList',['data' => $arr]);
    }
    public function addServer(Request $request)
    {
        $arr = DB::table('server')
            ->where(['server_name' => $request->input('server_name')])
            ->first();
        if ($arr) {
            echo "<script>alert('服务点存在。'); location.href='".url('address')."';</script>";die;
        }
        if($request->input('one') == 0){
            echo "<script>alert('请选择省/直辖市'); location.href='".url('address')."';</script>";die;
        }
        if($request->input('two') == '0'){
            echo "<script>alert('请选择市/区'); location.href='address';</script>";die;
        }else{
            $coordinate1 = $request->input('coordinate1');
            $coordinate2 = $request->input('coordinate2');
            $coordinate = "$coordinate1".","."$coordinate2";
          DB::table('server')
            ->insert([
                'server_name'   => $request->input('server_name'),
                'address_id'    => $request->input('one'),
                'city_name'     => $request->input('city_name'),
                'district'      => $request->input('two'),
                'coordinate'    => $coordinate,
                'traffic_line'  => $request->input('traffic_line'),
                'street'  => $request->input('street')
            ]);
        }
       return redirect('addressList');
    }


    public function addrList()
    {
        $arr = DB::table('address')
            ->where('parent_id',0)
            ->get();
        foreach($arr as $k => $val){
            $arr2 = DB::table('address')
                ->where('parent_id',$val['address_id'])
                ->get();
            $arr[$k]['son'] = $arr2;
        }
        return view('admin.address.addrList',['data' => $arr]);
    }

    public function addrIns()
    {
        return view('admin.address.addrIns');

    }
    /**
     * @param Request $request
     */
    public function typeIns(Request $request)
    {
        $arr = $request->all();
        if ($arr['city'] == '地级市') {
            return 1;//地级市不能为空
        }
        if ($arr['county'] == '市、县级市、县') {
            return 2;//市、县级市、县不能为空
        }
        $ping = new \pin();
        $cityFirst = $ping->Pinyin($arr['city']);
        $countyFirst = $ping->Pinyin($arr['county']);
        $str1 = strtoupper(substr($cityFirst,0,1));
        $str2 = strtoupper(substr($countyFirst,0,1));
        $address_city =DB::table('address')
            ->where(['address_name' => $arr['city']])
            ->first();
        $parent_id = $address_city['address_id'];
        if ($address_city) {
            $address_county = DB::table('address')
                ->where(['address_name' => $arr['county']])
                ->first();
            if ($address_county) {
                return 3;//不能重复添加
            } else {
                DB::table('address')
                    ->insert([
                        'address_name' => $arr['county'],
                        'abridge'       => $str2,
                        'parent_id'        => $parent_id
                    ]);
                return 0;//添加成功
            }
        } else {
            DB::table('address')
                ->insert([
                    'address_name' => $arr['city'],
                    'parent_id'    => 0,
                    'abridge'      => $str1
                ]);
            $address_city =DB::table('address')
                ->where(['address_name' => $arr['city']])
                ->first();
            $parent_id = $address_city['address_id'];
            DB::table('address')
                ->insert([
                    'address_name' => $arr['county'],
                    'parent_id'    => $parent_id,
                    'abridge'      => $str2
                ]);
            return 0;
        }
    }

    /**
     *username:wanghu
     * time:2016/9/8
     *
     */
    public function addressDel($id)
    {
        $arr1 = DB::table('car_number')
            ->where('server_id',$id)
            ->first();
        if ($arr1) {
            echo "<script>alert('该服务点下有车辆，不能删除。');location.href='".URL('addressList')."'</script>";
        } else {
            DB::table('server')
                ->where('server_id',$id)
                ->delete();
            return redirect(url('addressList'));
        }
    }

    public function typeInfo(Request $request)
    {
        $id = $request -> input('id');
        $arr = DB::table('address')
            ->where('address_id',$id)
            ->first();
        $county = json_encode($arr);
        echo $county;
    }

//地区城市类型的修改
    public function changeAddType(Request $request)
    {
        $type = $request->input('type');  //要修改的类型 id
        $a_id = $request->input('a_id');  //要修改的类型 id
        $result = DB::table('address')
            ->where('address_id', $a_id)
            ->update(['type'=> $type]);
        if ($result) {
            echo 1;
        } else {
            echo 2;
        }

    }
}
