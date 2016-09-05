<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Request;
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
    public function address_two()
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
    public function address_list()
    {
        $arr = DB::table('server')
            ->join('address','server.address_id','=','address.address_id')
            ->get();
        return view('admin.address.address_list',['data' => $arr]);
    }

    public function add_server()
    {
        $arr = Request::all();
        if($arr['one'] == 0){
            echo "<script>alert('请选择省/直辖市'); history.back(-1)</script>";die;
        }
        if($arr['two'] == 0){
            echo "<script>alert('请选择市/区'); history.back(-1)</script>";die;
        }
        if($arr['three'] == 0){
            DB::table('server')
                ->insert([
                    'server_name'   => $arr['server_name'],
                    'address_id'    => $arr['two']
                ]);
            die;
        }else{
            DB::table('server')
                ->insert([
                    'server_name'   => $arr['server_name'],
                    'address_id'    => $arr['three']
                ]);
        }
        return redirect('address_list');
    }
    public function addr_list()
    {
//        $pro = DB::table('address')
//            ->where(['parent_id' => 0])
//            ->get();
//        for($i=$pro['address_id'];$i<count($pro);$i++){
//            echo $i;
//        }
//        //print_r($county);
    }
    public function addr_ins()
    {
        if(!$_POST){
            return view('admin.address.addr_ins');
        }else{
            $ping = new \pin();
            $wanghu = $ping -> Pinyin('上海');
            echo $wanghu;
        }
    }
}
