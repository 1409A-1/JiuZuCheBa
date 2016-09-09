<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Car_info;
use App\Server;
use App\Car_number;

class CarController extends Controller
{
    /*
     *name:wanghu
     * time:2016/9/7
     * 描述：车辆详情的添加
     **/
    public function carIns(Request $request)
    {
        if(!$request->has('_token')){
            $carbrand = DB::table('car_brand')
                ->get();
            $arr = DB::table('car_type')
                ->get();
            return view('admin.carins.car_ins',['data' => $arr,'arr' => $carbrand]);
        }else{
            //$file = Request::file('car_img');
            $file = $request->file('car_img');
            $hou = $file->getClientOriginalExtension();//文件后缀
            $path = './admin/public/';
            $filename = rand(1, 999) . "." . $hou;;
            $car_img = $path . $filename;     //文件路径
            $file->move($path, $filename);  // 移动文件到指定目录
            DB::table('car_info')
                ->insert([
                    'car_name'  =>  $request->input('car_name'),
                    'type_id'   =>  $request->input('type_id'),
                    'brand_id'  =>  $request->input('brand_id'),
                    'car_img'   =>  $car_img,
                    'car_price' =>  $request->input('car_price')
                ]);
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

    /*
     * name:zhaoag
     * time:2016/9/8
     * 描述:为服务点添加车辆信息页面
     * */
    public function carServer()
    {
        $carInfo = Car_info::get()->toArray()? :array();
        $server = server::get()->toArray()? :array();
        return view("admin.address.carAllot", ['carInfo' => $carInfo, 'server' => $server]);
    }

    /*
     * name:zhaoag
     * time:2016/9/8
     * 描述:为服务点添加车辆信息 执行
     * */
    public function carServerAdd(Request $request)
    {
        $date=$request->all();
        //print_r($date);die;
        unset($date['_token']);
        Car_number::create($date);
        return "success";
    }

    /*
     * name:zhaoag
     * time:2016/9/8
     * 描述:为服务点添加车辆信息 执行
     * */
    public function carUnique(Request $request)
    {
        $date=$request->all();
        //print_r($date);die;
        unset($date['_token']);
        $car_number=Car_number::where(['server_id' => $date['server_id'], 'car_id' => $date['car_id']])->first();
        if ($car_number) {
            return "no";
        } 
    }

    /*
     * name:zhaoag
     * time:2016/9/8
     * 描述:服务点车辆信息列表
     * */
    public function carServerList()
    {
        $count = Car_number::count();
        $page = 1;
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count: $page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $offset = ($page-1)*$length;
        $date = Car_number::leftJoin('server', 'car_number.server_id', '=', 'server.server_id')->leftJoin('car_info', 'car_number.car_id', '=', 'car_info.car_id')->orderBy('car_number.server_id')->take($length)->skip($offset)->get()->toArray()? :array();
        return view('admin.address.carAllotList',['car' => $date,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }

    /*
       服务点车辆分页展示
     */
    public function carServerPage(Request $request,$page = 1)
    {
        $count = Car_number::count();
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count: $page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $page = $page>$pages? $pages: $page;
        $offset = ($page-1)*$length;
        $date = Car_number::leftJoin('server', 'car_number.server_id', '=', 'server.server_id')->leftJoin('car_info', 'car_number.car_id', '=', 'car_info.car_id')->orderBy('car_number.server_id')->take($length)->skip($offset)->get()->toArray()? :array();
        return json_encode(['car' => $date,'pages' => $pages,'prev' => $prev,'next' => $next,'page' => $page]);
    }
}
