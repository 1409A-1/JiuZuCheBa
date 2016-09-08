<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /*
     *name:wanghu
     * time:2016/9/7
     * 描述：车辆详情的添加
     **/
    public function carIns()
    {
        if(!$_POST){
            $carbrand = DB::table('car_brand')
                ->get();
            $arr = DB::table('car_type')
                ->get();
            return view('admin.carins.car_ins',['data' => $arr,'arr' => $carbrand]);
        }else{
            $arr = Request::all();
            unset($arr['_token']);
            $file = Request::file('car_img');
            $hou = $file->getClientOriginalExtension();//文件后缀
            $path = './admin/public/';
            $filename = rand(1, 999) . "." . $hou;;
            $car_img = $path . $filename;     //文件路径
            $arr['car_img'] = $car_img;
            $file->move($path, $filename);  // 移动文件到指定目录
            DB::table('car_info')
                ->insert($arr);
            return redirect('carList');
        }
    }
    public function carList()
    {
        $arr = DB::table('car_info')
            ->join('car_type','car_info.type_id','=','car_type.type_id')
            ->join('car_brand','car_info.brand_id','=','car_brand.brand_id')
            ->get();
        return view('admin.carins.carList',['data' => $arr]);
    }
    /*
     * name:wanghu
     * time:2016/9/7
     * 描述：删除车型，判断是否被使用，如果没有被使用可以删除，如果被使用删除失败。
     * */
    public function carDel($id)
    {
        $server = DB::table('car_number')
            ->where('car_id',$id)
            ->get();
        if($server){
            echo "<script>alert('该车型被服务点使用，禁止删除。');location.href='".URL('carList')."'</script>";die;
        }else{
            $apply = DB::table('apply')
                ->where('car_id' , $id)
                ->where(function($query){
                    $query->where(['apply_status' => 0])
                        ->orWhere(function($query){
                            $query->where(['apply_status' => 1]);
                        });
                })->get();
            if($apply){
                echo "<script>alert('该车型被申请或使用，禁止删除。');location.href='".URL('carList')."'</script>";
            }else{
                $order = DB::table('order_info')
                    ->where('car_id',$id)
                    ->first();
                $ord_id = $order['ord_id'];
                $ord = DB::table('order')
                    ->where('ord_id',$ord_id)
                    ->where(function($query){
                        $query -> where(['ord_pay' => 1])
                            ->orWhere(function($query){
                                $query -> where(['ord_pay' => 2]);
                            });
                    })->get();
                if ($ord) {
                    echo "<script>alert('该车型被被使用，禁止删除。');location.href='".URL('carList')."'</script>";
                } else {
                    DB::table('car_info')
                        ->where(['car_id' => $id])
                        ->delete();
                    return redirect('carList');
                }
            }
        }
    }
}
