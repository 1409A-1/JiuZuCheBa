<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use App\CarType;
use Validator;

class CarTypeController extends Controller
{
	/*
	   车辆类型展示
	 */
    public function type_list()
    {
    	$count= CarType::count();
    	$page=1;
    	$prev=$page==1? 1: $page-1;
    	$next=$page==$count? $count :$page+1;
    	$length=5;
    	$pages=ceil($count/$length);
        //echo $pages;die;
    	$offset=($page-1)*$length;
    	$cartype = CarType::take($length)->skip($offset)->get()->toArray()? CarType::take($length)->skip($offset)->get()->toArray(): array();
    	//print_r($cartype);die;
        return view('admin.cartype.list',['cartype'=>$cartype,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }

    /*
	   车辆类型分页展示
	 */
    public function listpage(Request $request,$page=1,$search,$del)
    {
    	if($del!=0){
    		CarType::where('type_id', $del)->delete();
    	}
    	$search=="all" ? $search="" : $search=$search;
    	//echo $search;die;
    	$count= CarType::where("type_name",'like',"%$search%")->count();
    	//$page=1;
    	$prev=$page==1? 1: $page-1;
    	$next=$page==$count? $count :$page+1;
    	$length=5;
    	$pages=ceil($count/$length);
    	$page=$page>$pages ? $pages : $page;
    	$offset=($page-1)*$length;
    	$cartype = CarType::where("type_name",'like',"%$search%")->take($length)->skip($offset)->get()->toArray()? CarType::where("type_name",'like',"%$search%")->take($length)->skip($offset)->get()->toArray(): array();
    	//print_r($cartype);die;
        echo json_encode(['cartype'=>$cartype,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }

    /*
	   车辆类型添加
	 */
    public function add(Request $request)
    {
    	if($request::all())
    	{
    		$type_name = $request::input('type_name');
    		$validator = Validator::make(
    			['type_name' => "$type_name"],
			    ['type_name' => 'required|unique:car_type,type_name']
			);
			if ($validator->fails())
			{
				//echo $validator->errors();die;
				/*echo"<script>alert('车辆类型已存在');location.href='typeadd'</script>";*/
				return redirect()->back()->withErrors('车辆类型已存在')->withInput();

			}else{
				$flight = new CarType;

		    	$flight->type_name = $request::input('type_name');

	        	$flight->save();

	        	return redirect('typelist');

			}	    	
	   	
		}else
		{
			//echo 11;
			return view('admin.cartype.add');
		}
        
    }

    /*
    	车辆类型编辑/更新
     */
    public function update(Request $request,$id="")
    {
    	if($request::all())
    	{
    		$type_name = $request::input('type_name');
    		$validator = Validator::make(
    			['type_name' => "$type_name"],
			    ['type_name' => 'required|unique:car_type,type_name']
			);
			if ($validator->fails())
			{
				//echo $validator->errors();die;
				/*echo "<script>alert('车辆类型已存在');location.href='typeadd'</script>";*/
				return redirect()->back()->withErrors('车辆类型已存在')->withInput();

			}else{
				$type_name= $request::input('type_name');

				$flight = new CarType;

        		$flight::where('type_id', $request::input('type_id'))
		          ->update(['type_name' => "$type_name"]);

	        	return redirect('typelist');

			}	    	
	   	
		}else
		{
			$flight = new CarType;
	    	$type = $flight::where('type_id', $id)->first()->toArray();
	    	//print_r($type);die;
	    	return view('admin.cartype.update',['type' => $type]);
		}
    	
    }

    /*
    	车辆类型删除
     */
    public function del(Request $request,$id){
    	//echo $id;
    	$flight = new CarType;
    	$type = $flight::where('type_id', $id)->delete();
    	//print_r($type);die;
    	return redirect('typelist');
    }
}