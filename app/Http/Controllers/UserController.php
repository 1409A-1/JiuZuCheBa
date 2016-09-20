<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use App\Admin_user;
use App\Message;
use App\Benefit;
use App\Apply;
use App\Car_type;
use App\Car_brand;
use App\Car_info;
use App\Car_number;
use App\Order;
use App\OrderInfo;
use Validator;

class UserController extends Controller
{
	/*
	   网站用户展示
	 */
    public function userList()
    {
    	$count = User::count();
    	$page = 1;
    	$prev = $page==1? 1: $page-1;
    	$next = $page== $count? $count: $page+1;
    	$length = 5;
    	$pages = ceil($count/$length);
    	$offset = ($page-1)*$length;
    	$user = User::take($length)->skip($offset)->get()->toArray()? User::take($length)->skip($offset)->get()->toArray(): array();
        foreach ($user as $key => $val) {
            $user[$key]['reg_time']=date("Y/m/d h:i:s", $user[$key]['reg_time']);
        }
        return view('admin.user.userList',['user' => $user,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

     /*
       网站用户列表分页展示
     */

    public function listPage(Request $request,$page = 1)
    {
        $count = User::count();
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count :$page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $page = $page>$pages ? $pages : $page;
        $offset = ($page-1)*$length;
        $user = User::take($length)->skip($offset)->get()->toArray()? User::take($length)->skip($offset)->get()->toArray(): array();
        return json_encode(['user' => $user,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
       后台用户展示
     */
    public function adminList()
    {
        $count = Admin_user::count();
        $page = 1;
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count :$page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $offset = ($page-1)*$length;
        $user = Admin_user::take($length)->skip($offset)->get()->toArray()? Admin_user::take($length)->skip($offset)->get()->toArray(): array();
        return view('admin.user.adminList',['user' => $user,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

     /*
       后台用户列表分页展示
     */
    public function adminListPage(Request $request,$page = 1)
    {
        $count = Admin_user::count();
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count: $page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $page = $page>$pages? $pages: $page;
        $offset = ($page-1)*$length;
        $admin = Admin_user::take($length)->skip($offset)->get()->toArray()? Admin_user::take($length)->skip($offset)->get()->toArray(): array();
        return json_encode(['user' => $admin,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
        用户留言展示
     */
    public function message()
    {
        $count = Message::count();
        $page = 1;
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count: $page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $offset = ($page-1)*$length;
        $message = Message::take($length)->skip($offset)->get()->toArray()? : array();
        foreach ($message as $key => $val) {
            $message[$key]['add_time']=date("Y/m/d h:i:s",$message[$key]['add_time']);
        }
        return view('admin.user.message',['message' => $message,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
       用户留言Ajax分页&删除
     */
    public function messagePage(Request $request,$page = 1,$del = 0)
    {
        if ($del != 0) {
            Message::where('message_id', $del)->delete();
        }
        $count = Message::count();
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count: $page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $page = $page>$pages ? $pages : $page;
        $offset = ($page-1)*$length;
        $message = Message::take($length)->skip($offset)->get()->toArray()? : array();
        foreach ($message as $key => $val) {
            $message[$key]['add_time']=date("Y/m/d h:i:s",$message[$key]['add_time']);
        }
        return json_encode(['message' => $message,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
       用户留言Ajax审核
     */
    public function messageSet(Request $request,$id)
    {
        $message = Message::where('message_id', $id)->first()->toArray();
        $type = $message['type'];
        if ($type == 0) {
            Message::where('message_id', $id)
            ->update(['type' => 1]);
            echo "unshow";
        } elseif ($type == 1) {
            Message::where('message_id', $id)
            ->update(['type' => 0]);
            echo "show";
        }
    }

    /*
       用户留言Ajax采纳
     */
    public function messageAccept(Request $request,$id)
    {
        Message::where('message_id', $id)
        ->update(['type' => 2]);
        $message = Message::where('message_id', $id)->first()->toArray();
        $date = ['user_id' => $message['user_id'], 'benefit_name' => "评论采纳礼包", 'ord_price' => 5, 'begin_time' => time(), 'end_time' => time()+3600*24*10];
        Benefit::create($date);
        return "success";
    }

    /*
        长租订单展示
     */
    public function longOrderList()
    {
        $data = Apply::select('apply_id', 'tel', 'a.server_id', 'car_info.car_id', 'user_name', 'dep_time', 'des_time', 'type_name', 'brand_name', 'car_name', 'apply_time', 'apply_status', 'a.server_name as start_name', 'b.server_name as end_name', 'a.city_name as start_city', 'a.district as start_dis', 'b.city_name as end_city', 'b.district as end_dis')->leftJoin('server as a', 'apply.departure', '=', 'a.server_id')->leftJoin('server as b', 'apply.destination', '=', 'b.server_id')->leftJoin('user', 'apply.user_id', '=', 'user.user_id')->leftJoin('car_type', 'apply.car_type', '=', 'car_type.type_id')->leftJoin('car_brand', 'apply.car_brand', '=', 'car_brand.brand_id')->leftJoin('car_info', 'apply.car_id', '=', 'car_info.car_id')->get()->toArray();
        foreach ($data as $k => $val) {
            $data[$k]['dep_time'] = date("Y/m/d h:i:s", $data[$k]['dep_time']);
            $data[$k]['des_time'] = date("Y/m/d h:i:s", $data[$k]['des_time']);
            $data[$k]['apply_time'] = date("Y/m/d h:i:s", $data[$k]['apply_time']);
        }
        return view('admin.user.longOrderList', ['order' => $data]);
    }

    /*
        长租订单审核
     */
    public function longOrderCheck(Request $request)
    {
        $date = $request->input();
        $car = Car_number::where(['server_id' => $date['serverId'], 'car_id' => $date['carId']])->first()? Car_number::where(['server_id' => $date['serverId'], 'car_id' => $date['carId']])->first()->toArray(): array();
        //print_r($date);die;
        if ($car) {
            $number = $car['number'];
        }else{
            $number = 0;
        }
        
        if($number == 0){
            Apply::where('apply_id', $date['applyId'])->update(['apply_status' => 2]);
            //调用短信接口
            /*$url = "http://api.k780.com:88/?app=sms.send&tempid=50794
&phone={$date['tel']}&appkey=19680&sign=7179f1c6c731d1b0c18d80737c0fc295&format=json";
            $res = file_get_contents($url);*/
            echo "false";
        } else {
            Apply::where('apply_id', $date['applyId'])->update(['apply_status' => 1]);
            $apply = Apply::where('apply_id', $date['applyId'])->first()->toArray();
            $data['user_id'] = $apply['user_id'];
            $data['ord_sn'] = (date('Ymd').time() % 86400 + 8 * 3600).'1'.$apply['departure'].$apply['car_id'].$apply['user_id'];
            $data['ord_type'] = 2;
            $data['ord_package'] = 0;
            $timeday = ceil(($apply['des_time']-$apply['dep_time'])/24/60/60);
            $carInfo = Car_info::where('car_id', $apply['car_id'])->first()->toArray();
            $data['ord_price'] = $timeday*$carInfo['car_price'];
            if ($apply['departure'] != $apply['destination']) {//服务点不同
                $server_price = 100;
                $data['ord_price'] = $data['ord_price']*1+(30*$timeday)+$server_price+20;
            } else {
                $server_price = 0;
                $data['ord_price'] = $data['ord_price']*1+(30*$timeday)+$server_price+20;
            }
            $data['ord_pay'] = 0;
            $data['add_time'] = time();
            $data['note'] = '无';
            $data['id_card'] = '无';
            //Order::create($data);
            //订单信息入库
            $id = Order::insertGetId($data);
            $orderInfo['ord_id'] = $id;
            $orderInfo['departure'] = $apply['departure'];
            $orderInfo['destination'] = $apply['destination'];
            $orderInfo['dep_time'] = $apply['dep_time'];
            $orderInfo['des_time'] = $apply['des_time'];
            $orderInfo['car_type'] = $apply['car_type'];
            $orderInfo['car_brand'] = $apply['car_brand'];
            $orderInfo['benefit_id'] = '';
            $orderInfo['car_id'] = $apply['car_id'];
            OrderInfo::create($orderInfo);
            //调用短信接口
            /*$param = "请您于{$date['dep_time']}，准时到{$date['start']}取车";
            $url = "http://api.k780.com:88/?app=sms.send&tempid=50794&param=code%3D$param
&phone={$date['tel']}&appkey=19680&sign=7179f1c6c731d1b0c18d80737c0fc295&format=json";
            $res = file_get_contents($url);*/
            return "success";
        }
    }
}
