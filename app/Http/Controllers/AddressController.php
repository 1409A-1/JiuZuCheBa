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
        if($request->input('one') == 0){
            echo "<script>alert('请选择省/直辖市'); history.back(-1)</script>";die;
        }
        if($request->input('two') == 0){
            echo "<script>alert('请选择市/区'); history.back(-1)</script>";die;
        }else{
            $arr2 = DB::table('address')
                ->where(['address_id' => $request->input('one')])
                ->first();
            $arr3 = DB::table('address')
                ->where(['address_id' => $request->input('two')])
                ->first();
            $city_name = $arr2['address_name'];
            $district = $arr3['address_name'];
            $coordinate1 = $request->input('coordinate1');
            $coordinate2 = $request->input('coordinate2');
            $coordinate = "$coordinate1".","."$coordinate2";
            DB::table('server')
                ->insert([
                    'server_name'   => $request->input('server_name'),
                    'address_id'    => $request->input('two'),
                    'city_name'     => $city_name,
                    'district'      => $district,
                    'coordinate'    => $coordinate,
                    'traffic_line'  => $request->input('server_id')
                ]);
        }
        return redirect('addressList');
    }


    public function addrList()
    {
        return view('admin.address.addrList');
    }
    public function addrIns()
    {
        return view('admin.address.addrIns');

    }
    public function ping(Request $request)
    {
        $ping = new \pin();
        $name = $request->input('name');
        $str = $ping -> Pinyin("$name");
        $str = substr($str,0,1);
        echo strtoupper($str);
    }

    /**
     * @param Request $request
     */
    public function typeIns(Request $request)
    {
        if($request->input('city_one') == ''){
            echo 1;//首字母不能空
        }else{
           if($request->input('city_one_p') == ''){
               echo 2;//城市不能为空
           }else{
               if($request->input('city_two') == ''){
                   echo 3;//市/区不能为空
               }else{
                   $address_arr =DB::table('address')
                       ->where(['address_name' => $request->input('city_one')])
                       ->first();
                   if($address_arr['address_name'] == $request->input('city_one')){
                       $address_arr2 =DB::table('address')
                           ->where(['address_name' => $request->input('city_two')])
                           ->first();
                       if($address_arr2['address_name'] == $request->input('city_two')){
                           echo 4;//城市已经存在
                       }else{
                           DB::table('address')
                               ->insert([
                                   'address_name' => $request->input('city_two'),
                                   'parent_id'    => $address_arr['address_id'],
                                   'type'         => $request->input('type')
                               ]);
                       }
                   }else{
                       DB::table('address')
                           ->insert([
                               'address_name' => $request->input('city_one'),
                               'parent_id'    => 0,
                               'abridge'      => $request->input('city_one_p')
                           ]);
                       $address_arr3 = DB::table('address')
                           ->where(['address_name' => $request->input('city_one')])
                           ->first();
                       DB::table('address')
                           ->insert([
                               'address_name'  => $request->input('city_two'),
                               'parent_id'     => $address_arr3['address_id'],
                               'type'          =>  $request->input('type')
                           ]);
                       echo 0;//添加成功
                   }
               }
           }
        }
    }
    public function addressServer()
    {

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
    public function addrSelect(Request $request)
    {
        $data=$request->all();
        if($data['server_name'] == ''){
            return 0;//没有搜索
        }else{
            $ping = new \pin();
            $str = $ping->Pinyin("$data[server_name]");
            $str = substr($str,0,1);
            $str =  strtoupper($str);
            $arr = DB::table('address')
                ->where(['address_name'=>$data['server_name']])
                ->get();
            if ($arr) {
                return $arr;
            }else{
                $arr2 = DB::table('address')
                    ->where(['abridge'=>$str])
                    ->get();
                if ($arr2) {
                    return $arr2;
                } else {
                    return 1;
                }
            }
        }
    }
}
