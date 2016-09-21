<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Validator;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.login.admin_login');
    }
    /*
     * name:wanghu
     * time:2016/8/31
     * @admin_user
     * */
    public function adminLogin(Request $request)
    {
        if (Session::has('name')) {
            return redirect('indexs');
        } else{
            if ($request->has('username')) {
                $name = $request->input('username');
                $pwd = $request->input('password');
                $re = DB::table('admin_user')
                    ->where(['user_name' => $name])
                    ->first();
                if ($re) {
                    if ($pwd == $re['password']) {
                        Session::put('name',$re['user_name']);
                        Session::put('id',$re['user_id']);
                        echo 1;
                    } else {
                        echo 2;
                    }
                } else {
                    echo 3;
                }
            } else {
                return view('admin.login.admin_login');
            }
        }
    }

    /*
     * name:wanghu
     * time:2016/8/31
     * @admin_user
     * */
    public function logout()
    {
        Session::pull('name');
        Session::pull('id');
        return redirect('indexs');
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
     * 描述：添加车辆的型号，判断是否值过来没有的话就跳到添加页面
     * */
    public function modelAdd(Request $request)
    {
        if($request -> has('type_name')){
            DB::table('car_type')
                ->insert([
                    'type_name'  => $request->input('type_name')
                ]);
            return redirect('carTypeList');
        }else{
            return view('admin.admin.modelAdd');
        }
    }
    /*
     * name:wanghu
     * time:2016/9/1
     * 描述:jquery删除
     * */
    public function typeDel(Request $request){

        $id = $request->input('type_id');

        $re = DB::table('car_type')
            ->where('type_id',$id)
            ->delete();
        if($re){
            echo 1;
        }
    }
}