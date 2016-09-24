<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Benefit;
use App\Login;
use App\Http\Requests;
use DB,Session;


class LoginController extends Controller
{
    //注册的方法
    public function register(){
        return view('home.login.register');
    }
    
    //前台登录
    public function login()
    {
        return view('home.login.login');
    }
    
    //前台登录盒子窗口
    public function loginBox()
    {
        return view('home.login.loginBox');
    }
    
    //前台登录检验用户名密码
    public function loginPro(Request $request)
    {
        $info['user_name'] = $request->input('account');
        $info['password'] = md5($request->input('password'));
        $result = Login::where($info)->first();
        if ($result) {
            Session::put('user_name', $info['user_name']);
            Session::put('user_id', $result['user_id']);
            return 1;
        } else {
            return -1;
        }
    }
    
    //前台登录退出
    public function loginOut(Request $request)
    {
        if ($request->session()->has('user_name')) {
            session()->forget('user_id');
            session()->forget('user_name');
            return redirect('/');
        }
    }
    
    //进行注册接值
    public function registerPro(Request $request){
        // print_r($this->onlyName($request->input('name')));die;
        // 验证用户名是否可用
        if (User::onlyName($request->input('name'))) {
            return -1;
        }

        // 验证手机号是否可用
        if (User::onlyPhone($request->input('phone'))) {
            return -2;
        }
        //验证码是否正确
        if ($request->input('dx_code') != session($request->input('phone'))) {
            return -3;
        }
        $user = new User();
        $user->user_name = $request->input('name');
        $user->tel = $request->input('phone');
        $user->password = md5($request->input('password'));
        $user->reg_time = time();
        $result = $user->save();

        $user_id = $user->user_id;                //获取刚添加的自增的id
        if ($result) {
            $benefit = new Benefit();             //实例化优惠券表
            Session::put('user_name', $request->input('name'));
            Session::put('user_id', $user_id);
            $benefit->user_id = $user_id;
            $benefit->benefit_name = '新人大礼包';
            $benefit->ord_price = '100';
            $benefit->begin_time = time();
            $benefit->end_time = strtotime('+1 month');
            $benefit->save();
            return 1;
        } else {
            return -10;
        }
    }
//发送手机验证码
   public function phoneCode(Request $request)
   {
       $phone = $request->input('phone');
       if ($phone=='') {
           return -2;  //手机号不为空
       }
       if (User::onlyPhone($phone)) {
           return -3;  //手机号已存在
       }
       $phoneCode = new HomeUserController();
       $result = $phoneCode->phone($phone);
       if ($result == 2) {
           return 1;
       } else {
           return -10;
       }
   }
}