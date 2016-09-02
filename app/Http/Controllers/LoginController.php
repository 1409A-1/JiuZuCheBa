<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Login;
use DB;
use Session;

class LoginController extends Controller
{
    public function register()
    {
        return view('home.login.login_reg');
    }
    public function login()
    {
        return view('home.login.login');
    }
    public function login_pro(Request $request)
    {
        $re['user_name']=$request->input('user_name');
        $re['password']=md5($request->input('password'));
//                print_r($re);die;
        $login=new Login();

        $res=$login->where($re)->first();
//                        print_r($res);die;

        if($res){
            $request->session()->put('user_name', $re['user_name']);
            $request->session()->put('user_id', $res['user_id']);
            return view('home.index.home');
        }else
        {
            echo "密码或账户错误，请重试";die;
        }
    }
    public function login_out(Request $request)
    {
         $request->session()->forget('user_id');
         $request->session()->forget('user_name');
        if($request->session()->has('user_name')){
           echo 1;
        } else {
           return redirect('home');
        }
    }



}