<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login.admin_login');
    }
    /*
     * name:wanghu
     * time:2016/8/31
     * @admin_user
     * */
    public function admin_login()
    {
        if($_POST){
            $arr = Request::all();
            $name = $arr['username'];
            $pwd = $arr['password'];
            $re = DB::table('admin_user')
                ->where(['user_name' => $name])
                ->first();
            if($re){
                if($pwd == $re['password']){
                    Session::put('name',$re['user_name']);
                    Session::put('id',$re['user_id']);
                    echo 1;
                }else{
                    echo 2;
                }
            }else{
                echo 3;
            }
        }else{
           return view('admin.login.admin_login');
        }
    }
    /*
     * username：wanghu
     * time:2016/9/1
     * @index
     * 描述：登陆后跳到首页
     * */
    public function indexs()
    {
        return view('admin.admin.admin');
    }
    /*
     * name:wanghu
     * time:2016/9/1
     * @car_type
     * 描述:车辆类型管理
     * */
    public function car_type_list()
    {
        $arr = DB::table('car_type')
            ->get();
        return view('admin.admin.car_type',['data' => $arr]);
    }
    /*
     * name:wanghu
     * time:2016/9/1
     * 描述：添加车辆的型号，判断是否值过来没有的话就跳到添加页面
     * */
    public function model_add()
    {
        if($_POST){
            $arr = Request::all();
            DB::table('car_type')
                ->insert([
                    'type_name'  => $arr['type_name']
                ]);
            return redirect('car_type_list');
        }else{
            return view('admin.admin.model_add');
        }
    }
    /*
     * name:wanghu
     * time:2016/9/1
     * 描述:jquery删除
     * */
    public function type_del(){

        $id = Request::input('type_id');

        $re = DB::table('car_type')
            ->where('type_id',$id)
            ->delete();
        if($re){
            echo 1;
        }
    }
}