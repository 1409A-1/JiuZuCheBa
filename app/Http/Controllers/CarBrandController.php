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
	   车辆类型展示
	 */
    public function list()
    {
    	$count= CarBrand::count();
    	$page=1;
    	$prev=$page==1? 1: $page-1;
    	$next=$page==$count? $count :$page+1;
    	$length=5;
    	$pages=ceil($count/$length);
    	$offset=($page-1)*$length;
    	$carbrand = CarBrand::take($length)->skip($offset)->get()->toArray()? CarBrand::take(2)->skip(2)->get()->toArray(): array();
    	//print_r($carbrand);die;
        return view('admin.carbrand.list',['carbrand'=>$carbrand,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }

    /*
	   车辆类型分页展示
	 */
    public function listpage(Request $request,$page=1,$search="")
    {
    	$count= CarBrand::where("")->count();
    	//$page=1;
    	$prev=$page==1? 1: $page-1;
    	$next=$page==$count? $count :$page+1;
    	$length=5;
    	$pages=ceil($count/$length);
    	$offset=($page-1)*$length;
    	$carbrand = CarBrand::take($length)->skip($offset)->get()->toArray()? CarBrand::take(2)->skip(2)->get()->toArray(): array();
    	//print_r($carbrand);die;
        echo json_encode(['carbrand'=>$carbrand,'pages'=> $pages,'prev'=> $prev,'next'=> $next,'page'=>$page]);
    }

    /*
	   车辆类型添加
	 */
    public function add(Request $request)
    {
    	if($request::all())
    	{
    		$brand_name = $request::input('brand_name');
    		$validator = Validator::make(
    			['brand_name' => "$brand_name"],
			    ['brand_name' => 'required|unique:car_brand,brand_name']
			);
			if ($validator->fails())
			{
				//echo $validator->errors();die;
				/*echo"<script>alert('车辆类型已存在');location.href='brandadd'</script>";*/
				return redirect()->back()->withErrors('车辆品牌已存在')->withInput();
			}else{
				$flight = new CarBrand;

		    	$flight->brand_name = $request::input('brand_name');

	        	$flight->save();

	        	return redirect('brandlist');

			}	    	
	   	
		}else
		{
			//echo 11;
			return view('admin.carbrand.add');
		}
        
    }

    /*
    	车辆类型编辑/更新
     */
    public function update(Request $request,$id="")
    {
    	if($request::all())
    	{
    		$brand_name = $request::input('brand_name');
    		$validator = Validator::make(
    			['brand_name' => "$brand_name"],
			    ['brand_name' => 'required|unique:car_brand,brand_name']
			);
			if ($validator->fails())
			{
				//echo $validator->errors();die;
				/*echo "<script>alert('车辆类型已存在');location.href='brandadd'</script>";*/
				return redirect()->back()->withErrors('车辆品牌已存在')->withInput();

			}else{
				$brand_name= $request::input('brand_name');

				$flight = new CarBrand;

        		$flight::where('brand_id', $request::input('brand_id'))
		          ->update(['brand_name' => "$brand_name"]);

	        	return redirect('brandlist');

			}	    	
	   	
		}else
		{
			$flight = new CarBrand;
	    	$brand = $flight::where('brand_id', $id)->first()->toArray();
	    	//print_r($brand);die;
	    	return view('admin.carbrand.update',['brand' => $brand]);
		}
    	
    }

    /*
    	车辆类型删除
     */
    public function del(Request $request,$id){
    	//echo $id;
    	$flight = new CarBrand;
    	$brand = $flight::where('brand_id', $id)->delete();
    	//print_r($brand);die;
    	return redirect('brandlist');
    }
}