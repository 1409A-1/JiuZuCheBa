<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\CarType;
use Validator;

class CarTypeController extends Controller
{
	/*
	   车辆类型展示
	 */
    public function typeList()
    {
    	$count = CarType::count();
    	$page = 1;
    	$prev = $page == 1? 1: $page-1;
    	$next = $page == $count? $count: $page+1;
    	$length = 5;
    	$pages = ceil($count/$length);
    	$offset = ($page-1)*$length;
    	$cartype = CarType::select('car_type.type_id', 'type_name', 'car_id')->leftJoin('car_info', 'car_type.type_id', '=', 'car_info.type_id')->take($length)->skip($offset)->get()->toArray()? CarType::select('car_type.type_id', 'type_name', 'car_id')->leftJoin('car_info', 'car_type.type_id', '=', 'car_info.type_id')->take($length)->skip($offset)->groupBy('type_name')->get()->toArray(): array();
        return view('admin.cartype.list',['cartype' => $cartype,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
	   车辆类型分页展示
	 */
    public function listPage(Request $request,$page = 1,$search,$del)
    {
    	if ($del != 0) {
    		CarType::where('type_id', $del)->delete();
    	}
    	$search == "all" ? $search = "" : $search = $search;
    	$count =  CarType::where("type_name",'like',"%$search%")->count();
    	$prev = $page == 1? 1: $page-1;
    	$next = $page == $count? $count: $page+1;
    	$length = 5;
    	$pages = ceil($count/$length);
    	$page = $page>$pages ? $pages : $page;
    	$offset = ($page-1)*$length;
    	$cartype = CarType::leftJoin('car_info', 'car_type.type_id', '=', 'car_info.type_id')->where("type_name",'like',"%$search%")->take($length)->skip($offset)->get()->toArray()? CarType::select('car_type.type_id', 'type_name', 'car_id')->leftJoin('car_info', 'car_type.type_id', '=', 'car_info.type_id')->where("type_name",'like',"%$search%")->take($length)->skip($offset)->groupBy('type_name')->get()->toArray(): array();
        echo json_encode(['cartype' => $cartype, 'pages' => $pages, 'prev' => $prev, 'next' => $next, 'page' => $page]);
    }

    /*
	   车辆类型添加
	 */
    public function add(Request $request)
    {
    	if ($request->input()) {
    		$type_name = $request->input('type_name');
    		$validator = Validator::make(
    			['type_name' => "$type_name"],
			    ['type_name' => 'required|unique:car_type,type_name']
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors('车辆类型已存在')->withInput();
			} else {
				$flight = new CarType;
		    	$flight->type_name = $request->input('type_name');
	        	$flight->save();
	        	return redirect('typeList');
			}	    	
		} else {
			return view('admin.cartype.add');
		}    
    }

    /*
    	车辆类型编辑/更新
     */
    public function update(Request $request,$id = "")
    {
    	if ($request->input()) {
    		$type_name = $request->input('type_name');
    		$validator = Validator::make(
    			['type_name' => "$type_name"],
			    ['type_name' => 'required|unique:car_type,type_name']
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors('车辆类型已存在')->withInput();
			} else {
				$type_name = $request->input('type_name');
				$flight = new CarType;
        		$flight::where('type_id', $request->input('type_id'))
		          ->update(['type_name'  => "$type_name"]);
	        	return redirect('typeList');
			}	    	  	
		} else {
			$flight = new CarType;
	    	$type = $flight::where('type_id', $id)->first()->toArray();
	    	return view('admin.cartype.update',['type' => $type]);
		}  	
    }

    /*
    	车辆类型删除
     */
    public function del(Request $request,$id)
    {
    	$flight = new CarType;
    	$type = $flight::where('type_id', $id)->delete();
    	return redirect('typeList');
    }
}