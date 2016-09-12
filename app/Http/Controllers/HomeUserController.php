<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//------------------------用户信息的控制器---------------------------------//
class HomeUserController extends Controller
{
    public function userInfo(){
       //加载页面
        $user_info = $this->u_info();
        return view('home.user_info.user_info',['info'=>$user_info]);
    }
 //密码修改展示页面
    public function updatePass(){
        return view('home.user_info.user_pass');
    }
//前台修改密码验证原密码是否正确
    public function onlyPwd(Request $request){
      $new_pwd = md5($request->input('new_pwd'));
      $info = $this->u_info();
          if ($new_pwd==$info['password']){
               echo 'true';
          } else {
               echo 'false';
          }
    }
//前台修改密码验证手机验证码是否正确
    public function onlyMobileCode(Request $request){
        $mobile_code = $request->input('mobile_code');
       // echo $mobile_code;
        $info = $this->u_info();
        if ($mobile_code==session($info['tel'])) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
//接值进行验证密码修改
    public function password(Request $request){
       // $info = $request->except('_token');
        $new_pwd = md5($request->input('password'));  //新密码
        $pass = md5($request->input('new_pwd'));    //旧密码
        $mobile_code = $request->input('mobile_code');    //手机验证码
        $info = $this->u_info();
        if ($mobile_code == session($info['tel'])) {
              if ($pass == $info['password']) {
                 $result = DB::table('user')->where('user_id',$info['user_id'])->update(['password'=>$new_pwd]);
                   if ($result) {
                       $request->session()->forget('user_name');
                       $request->session()->forget('user_id');
                       return redirect('login');
                   } else {
                       echo "<script>alert('修改失败');history.go(-1)</script>";
                   }
              } else {
                  echo "<script>alert('旧密码不正确');history.go(-1)</script>";
              }
        } else {
            echo "<script>alert('验证码不正确');history.go(-1)</script>";
        }

    }

 //调用短息发送
    public function phone(){
            $info = $this->u_info();
            $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
            $mobile = $info['tel'];//接值（手机号码）
            $mobile_code = $this->random(4,1);
            $post_data = "account=cf_hhy&password=hhyhhy&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
//密码可以使用明文密码或使用32位MD5加密
            $gets =  $this->xml_to_array($this->Post($post_data, $target));
            if($gets['SubmitResult']['code']==2){
                session([$info['tel'] => $mobile_code]);
            }
            echo $gets['SubmitResult']['msg'];
        }

//订单列表的展示
    public function orderList(){
//好几个表联查
       $id = session('user_id');
       $order =  DB::table('order')
            ->leftJoin('order_info','order.ord_id','=','order_info.ord_id')
            ->leftJoin('car_info','order_info.car_id','=','car_info.car_id')
            ->where('order.user_id',$id)
            ->get();
        if ($order) {
            foreach($order as $k=>$v) {
                $arr['all'][]=$v;           //全部的订单
                if($v['ord_pay']==6){       //订单申请中
                    $arr['6'][]=$v;
                }
                if($v['ord_pay']==2){
                    $arr['2'][]=$v;
                }
                if($v['ord_pay']==3){
                    $arr['3'][]=$v;
                }
                if($v['ord_pay']==5){
                    $arr['5'][]=$v;
                }
            }
        } else {
            $arr[]='';
        }

     //print_r($arr);die;
        return view('home.user_info.order_list',['order'=>$arr]);
    }

//个人优惠券列表的展示
    public function benefitList(){
        $id = session('user_id');
        $benefit = DB::table('benefit')
              ->where('user_id',$id)
              ->get();

        if ($benefit) {
            foreach($benefit as $k=>$v){
                if ($v['end_time']<=time()) {
                    $yh['old'][] = $v;
                }
                if ($v['type']==0&&$v['end_time']>time()) {
                   $yh['0'][] = $v;
                }
                if ($v['type']==1&&$v['end_time']>time()) {
                   $yh['1'][] = $v;
                }

            }
        } else {
            $yh[]='';
        }
        return view('home.user_info.user_benefit',['yh'=>$yh]);
    }

//留言页面的展示
    public function message(){
       $result =  DB::select("select * from message ORDER BY message_id desc limit ?,?",[0,6]);
           return view('home.message.message',['message'=>$result]);
    }
//滑动鼠标进行查询
    public function messageDown(Request $request){
       $page = $request->input('page');
       $nextpage = $page*1+1;
       $page=$page*6;
       $result['str'] =  DB::select("select * from message ORDER BY message_id desc limit ?,?",[$page,6]);
        if($result['str']){
            $result['nextpage'] = $nextpage;
            echo json_encode($result);
        } else{

        }


    }
//进行留言的ajax添加
    public function messageAdd(Request $request){
        $message['user_name'] = e($request->input('name'));
        $message['message_con'] = e($request->input('con'));
        $message['user_id'] = session('user_id');
        $message['add_time'] = time();
        DB::table('message')
            ->insert($message);
    }

 //___________________________调用短信接口自带的开始____________________________
    function Post($curlPost,$url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return $return_str;
    }
    function xml_to_array($xml){
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches)){
            $count = count($matches[0]);
            for($i = 0; $i < $count; $i++){
                $subxml= $matches[2][$i];
                $key = $matches[1][$i];
                if(preg_match( $reg, $subxml )){
                    $arr[$key] = $this->xml_to_array( $subxml );
                }else{
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }
    function random($length = 6 , $numeric = 0) {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }
//_______________________________结束________________________________________

/**
 *
 * 公用的调用个人信息
 */
    public function u_info(){
        $user_id = session('user_id');
        $user_info = DB::table('user')->where('user_id',$user_id)->first();
        return $user_info;
    }


}
