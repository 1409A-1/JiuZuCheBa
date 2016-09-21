<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use App\Server;
use DB;
use Session;

class AddressController extends Controller
{
    public function serverAdd()
    {
        $address = Address::where('parent_id', 0)->get();
        return view('admin.address.address', ['data' => $address]);
    }

    public function addressTwo(Request $request)
    {
        $id = $request->input('id');
        if($id != 0){
            $arr = DB::table('address')
                ->where(['parent_id' => $id])
                ->get();
            $arr = json_encode($arr);
            return $arr;
        }else{
            return 0;
        }
    }

    public function addressList()
    {
        $server = Server::join('address','server.address_id','=','address.address_id')->get();
        return view('admin.address.addressList',['data' => $server]);
    }

    public function addServer(Request $request)
    {
        $arr = Server::where(['server_name' => $request->input('server_name')])->first();
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
        $address = Address::where('parent_id', 0)->get();
        foreach ($address as $k => $v) {
            $son = Address::where('parent_id', $v['address_id'])->get();
            $address[$k]['son'] = $son;
        }
        return view('admin.address.addrList', ['data' => $address]);
    }

    public function addrIns()
    {
        return view('admin.address.addrIns');
    }

    /**
     * 地区删除
     */
    public function addrDel(Request $request)
    {
        $address = $request->input('address');
        $count = Server::where('district', $address)->count();

        // 存在门店禁止删除
        if ($count) {
            $isSuccess = 'ban';
            return $isSuccess;
        }

        // 若是城市最后一个地区将连同城市一块删除
        $result = Address::where('address_name', $address)->first();
        $lastCity = Address::where('parent_id', $result['parent_id'])->count();
        if ($lastCity == 1) {
            $result = Address::where('address_name', $address)->orWhere('address_id', $result['parent_id'])->delete();
            $isSuccess = $result? 'all': 'fail';
        } else {
            $result = Address::where('address_name', $address)->delete();
            $isSuccess = $result? 'one': 'fail';
        }
        return $isSuccess;
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
                        'abridge'      => $str2,
                        'parent_id'    => $parent_id
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

    //城市类型的修改
    public function cityTypeUpdate(Request $request)
    {
        return $result = Address::where('address_id', $request->input('id'))->update(['type'=> $request->input('type')]);
    }
}
