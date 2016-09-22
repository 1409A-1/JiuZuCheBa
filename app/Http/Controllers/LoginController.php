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
        return view('home.login.login_reg');
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
    public function regPro(Request $request){
        $user = new User();
        $user->tel = $request->input('tel');
        $name = $user->user_name = $request->input('user_name');
        $user->password = md5($request->input('password'));
        $user->reg_time = time();
        $result = $user->save();
        $user_id = $user->user_id;               //获取刚添加的自增的id
        if ($result) {
            $benefit = new Benefit();             //实例化优惠券表
            Session::put('user_name', $name);
            Session::put('user_id', $user_id);
            $benefit->user_id = $user_id;
            $benefit->benefit_name = '新人大礼包';
            $benefit->ord_price = '100';
            $benefit->begin_time = time();
            $benefit->end_time = strtotime('+1 month');
            $benefit->save();
            return redirect('/');
        } else {
            echo "<script>alert('注册失败');location.href='register'</script>";
        }
    }
    
    //前台验证用户名唯一
    public function onlyName(Request $request){
        $user = new User();
        $name = $request->input('name');
        $result =  $user->where('user_name',$name)->first();
        if ($result) {
            return 'false';
        } else {
            return 'true';
        }

    }
    
    //前台验证用户名唯一
    public function onlyTel(Request $request){
        $user = new User();
        $tel = $request->input('tel');
        $result =  $user->where('tel',$tel)->first();
        if ($result) {
            return 'false';
        } else {
            return 'true';
        }
    }
}