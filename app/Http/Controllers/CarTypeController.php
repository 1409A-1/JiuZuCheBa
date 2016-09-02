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
    public function car_list()
    {
    	$cartype = CarType::all()->toArray()?CarType::all()->toArray():array();
    	//print_r($cartype);die;
        return view('admin.cartype.list',['cartype'=>$cartype]);
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