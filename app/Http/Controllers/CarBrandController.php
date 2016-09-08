<?php
namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use App\CarBrand;
use Validator;

class CarBrandController extends Controller
{
	/*
	   车辆品牌展示
	 */
    public function brandList()
    {
    	$count = CarBrand::count();
    	$page = 1;
    	$prev = $page == 1? 1: $page-1;
    	$next = $page == $count? $count: $page+1;
    	$length = 5;
    	$pages = ceil($count/$length);
    	$offset = ($page-1)*$length;
    	$carbrand = CarBrand::take($length)->skip($offset)->get()->toArray()? CarBrand::take($length)->skip($offset)->get()->toArray(): array();
        return view('admin.carbrand.list',['carbrand' => $carbrand,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
	   车辆品牌分页展示
	 */
    public function listPage(Request $request,$page = 1,$search,$del)
    {
    	if ($del != 0) {
    		CarBrand::where('brand_id', $del)->delete();
    	}
    	$search == "all"? $search = "": $search = $search;
    	//echo $search;die;
    	$count = CarBrand::where("brand_name",'like',"%$search%")->count();
    	//$page = 1;
    	$prev = $page == 1? 1: $page-1;
    	$next = $page == $count? $count: $page+1;
    	$length = 5;
    	$pages = ceil($count/$length);
    	$page = $page>$pages? $pages: $page;
    	$offset = ($page-1)*$length;
    	$carbrand  =  CarBrand::where("brand_name",'like',"%$search%")->take($length)->skip($offset)->get()->toArray()? CarBrand::where("brand_name",'like',"%$search%")->take($length)->skip($offset)->get()->toArray(): array();
        echo json_encode(['carbrand' => $carbrand,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
	   车辆类型添加
	 */
    public function add(Request $request)
    {
    	if ($request::all()) {
    		$brand_name = $request::input('brand_name');
    		$validator = Validator::make(
    			['brand_name' => "$brand_name"],
			    ['brand_name' => 'required|unique:car_brand,brand_name']
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors('车辆品牌已存在')->withInput();
			} else {
				$flight = new CarBrand;
		    	$flight->brand_name = $request::input('brand_name');
	        	$flight->save();
	        	return redirect('brandList');
			}  	
		} else {
			return view('admin.carbrand.add');
		} 
    }

    /*
    	车辆类型编辑/更新
     */
    public function update(Request $request,$id = "")
    {
    	if ($request::all()) {
    		$brand_name = $request::input('brand_name');
    		$validator = Validator::make(
    			['brand_name' => "$brand_name"],
			    ['brand_name' => 'required|unique:car_brand,brand_name']
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors('车辆品牌已存在')->withInput();
			} else {
				$brand_name = $request::input('brand_name');
				$flight = new CarBrand;
        		$flight::where('brand_id', $request::input('brand_id'))
		          ->update(['brand_name' => "$brand_name"]);
	        	return redirect('brandList');
			}	    	
		} else {
			$flight = new CarBrand;
	    	$brand = $flight::where('brand_id', $id)->first()->toArray();
	    	return view('admin.carbrand.update', ['brand' => $brand]);
		}
    	
    }

    /*
    	车辆类型删除
     */
    public function del(Request $request,$id)
    {
    	$flight = new CarBrand;
    	$brand = $flight::where('brand_id', $id)->delete();
    	return redirect('brandList');
    }
}
