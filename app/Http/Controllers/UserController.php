<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use App\User;
use App\Admin_user;
use Validator;

class UserController extends Controller
{
	/*
	   网站用户展示
	 */
    public function user_list()
    {
    	$count= User::count();
    	$page=1;
    	$prev=$page==1? 1: $page-1;
    	$next=$page==$count? $count :$page+1;
    	$length=5;
    	$pages=ceil($count/$length);
    	$offset=($page-1)*$length;
    	$user = User::take($length)->skip($offset)->get()->toArray()? User::take($length)->skip($offset)->get()->toArray(): array();
    	//print_r($carbrand);die;
        return view('admin.user.userlist',['user'=>$user,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }

     /*
       网站用户列表分页展示
     */
    public function listpage(Request $request,$page=1)
    {
        $count= User::count();
        //$page=1;
        $prev=$page==1? 1: $page-1;
        $next=$page==$count? $count :$page+1;
        $length=5;
        $pages=ceil($count/$length);
        $page=$page>$pages ? $pages : $page;
        $offset=($page-1)*$length;
        $user = User::take($length)->skip($offset)->get()->toArray()? User::take($length)->skip($offset)->get()->toArray(): array();
        //print_r($carbrand);die;
        echo json_encode(['user'=>$user,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }

    /*
       后台用户展示
     */
    public function admin_list()
    {
        $count= Admin_user::count();
        $page=1;
        $prev=$page==1? 1: $page-1;
        $next=$page==$count? $count :$page+1;
        $length=5;
        $pages=ceil($count/$length);
        $offset=($page-1)*$length;
        $user = Admin_user::take($length)->skip($offset)->get()->toArray()? Admin_user::take($length)->skip($offset)->get()->toArray(): array();
        //print_r($carbrand);die;
        return view('admin.user.adminlist',['user'=>$user,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }

     /*
       后台用户列表分页展示
     */
    public function adminlistpage(Request $request,$page=1)
    {
        $count= Admin_user::count();
        //$page=1;
        $prev=$page==1? 1: $page-1;
        $next=$page==$count? $count :$page+1;
        $length=5;
        $pages=ceil($count/$length);
        $page=$page>$pages ? $pages : $page;
        $offset=($page-1)*$length;
        $admin = Admin_user::take($length)->skip($offset)->get()->toArray()? Admin_user::take($length)->skip($offset)->get()->toArray(): array();
        //print_r($carbrand);die;
        echo json_encode(['user'=>$admin,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }
}