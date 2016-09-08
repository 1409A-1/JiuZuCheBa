<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use App\User;
use App\Admin_user;
use App\Message;
use App\Benefit;
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
        echo "success";
    }
}
