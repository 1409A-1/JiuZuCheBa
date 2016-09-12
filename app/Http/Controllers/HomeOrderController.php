<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

//-----------------------订单的控制器----------------------------------//
class HomeOrderController extends Controller
{
//进行选车侯的提交订单
    public function subOrder(Request $request)
    {
        $start_shop_id = $request->input('start_shop_id');      //提车点的的id
        $stop_shop_id = $request->input('stop_shop_id');        //还车的地点
        $start_date = $request->input('start_date');            //提车点的日期
        $stop_date = $request->input('stop_date');             //还车的日期
       // $class_id = $request->input('class_id');              //车辆的类型
        $car_id = $request->input('offersid');              //车辆的详细id
        $car_info = $this->carInfo($car_id);
        $order['start_shop'] = $this->serverId($start_shop_id);
        $order['start_shop']['start_date'] = $start_date;
        $order['stop_shop'] = $this->serverId($stop_shop_id);
        $order['stop_shop']['stop_date'] = $stop_date;
        $order['car_info'] = $car_info;
        $timeday = $this->timedate($start_date, $stop_date);               //租期天数
        $order['price']['rentalFees'] = $timeday*$car_info['car_price'];   //基本租车费
        $order['price']['leaseTerms'] = $timeday;                         //租用天数
        $order['price']['dayprices'] = intval($car_info['car_price']);              //每天价格
        /**
         * 100的异地还车费
         * 30的保险费
         * 20的手续费
         */
        if ($start_shop_id!=$stop_shop_id) {    //服务点不同
            $order['price']['server_price'] = 100;
            $order['price']['totalFees'] = $order['price']['rentalFees']*1+(30*$timeday)+100+20;
        } else {
            $order['price']['server_price'] = 0;
            $order['price']['totalFees'] = $order['price']['rentalFees']*1+(30*$timeday)+20;
        }
        $time = time();
     // print_r($order);die;
        session('user_id');//提取当前的用户id
       $benefit = DB::table('benefit')
            ->where('end_time', '>', $time)
            ->where('type', '=', 0)
            ->where('user_id', '=', session('user_id'))
            ->get();
       // print_r($benefit);die;
        $data = json_encode($order, JSON_UNESCAPED_UNICODE);
        return view('home.order.suborder',['data'=>$data,'benefit'=>$benefit]);
    }

//服务地方法
    public function serverId($id)
    {
       return DB::table('server')
            ->where('server_id',$id)
            ->first();
    }
//车辆信息
    public function carInfo($car_id)
    {
        return DB::table('car_info')
            ->leftJoin('car_brand', 'car_info.brand_id' ,'=', 'car_brand.brand_id')
            ->where('car_id',$car_id)
            ->first();
    }
//通过算法日期
    public function timedate($start_date, $stop_date)
    {
        $stime = strtotime($start_date);
        $etime = strtotime($stop_date);
        $passtime = $etime-$stime; //经过的时间戳。
       return  ceil($passtime/(24*60*60));

    }
//确认订单的提交
    public function orderAdd(Request $request){
        $order['user_id'] = session('user_id');    //用户的id
        $order['ord_type'] = 1;                    //长短租类型
        $order['ord_package'] = 0;                 //套餐
        $order['ord_price'] = $request->input('allPrice');  //总价
        $order['ord_pay'] = 0;    //付款状态
        $order['note'] = '无';
        $order['add_time'] = time();  //总价
        $order['id_card'] = '无';  //总价

        $order_info['departure'] = $request->input('start_shop_id');      //提车服务点
        $order_info['destination'] = $request->input('stop_shop_id');     //还车服务点
        $order_info['dep_time'] = $request->input('start_date');        //提车时间
        $order_info['des_time'] = $request->input('stop_date');        //提车服务点
        $order_info['car_type'] = $request->input('car_type');        //车辆类型
        $order_info['car_brand'] = $request->input('car_brand');     //车辆品牌
        $order_info['benefit_id'] = $request->input('benfitId');     //优惠券
        $order_info['car_id'] = $request->input('car_id');         //车辆具体id
        $order['ord_sn'] =(date('Ymd').time() % 86400 + 8 * 3600).'1'.$order_info['departure'].$order_info['car_id'].$order['user_id'];

        $result = DB::transaction(function () use($order_info,$order) {
            DB::table('benefit')
                ->where('benefit_id', $order_info['benefit_id'])
                ->update(['type' => 1]);
            $order_info['ord_id'] = DB::table('order')->insertGetId($order);
            DB::table('order_info')->insert($order_info);
            return $order_info['ord_id'];
        });

        return $result;
    }
//订单生成展示页面
    public function orderSuccess(Request $request)
    {
        $ord_id = $request->input('ord_id');       //订单的id
        $user_id= session('user_id');              //用户的id
        $order_info = $this->pub($ord_id, $user_id);
        if ($order_info) {
            $info['timeday'] = ceil(($order_info['des_time']-$order_info['dep_time'])/(24*60*60));  //租期
            $info['all_price'] = intval($order_info['ord_price']);  //总价格
            $info['ord_sn'] = $order_info['ord_sn'];                //订单号
            $info['ord_peo'] = session('user_name');              //租车人
            $info['img'] = $order_info['car_img'];               //图片
            $info['start_date'] = date('Y-m-d H:i',$order_info['dep_time']);       //取车时间
            $info['stop_date'] =  date('Y-m-d H:i',$order_info['des_time']);       //还车时间
            $info['start_shop'] = $this->serverId($order_info['departure']);       //取车门店
            $info['stop_shop'] = $this->serverId($order_info['destination']);      //还车门店
            $info['ord_id'] = $ord_id;
            $info['ord_pay'] = $order_info['ord_pay'];
            $info['car_info'] = $order_info['brand_name'].' '.$order_info['car_name'];
            // print_r($info);die;
            $info = json_encode($info, JSON_UNESCAPED_UNICODE);
            return view('home.order.ordersuccess', ['info'=>$info,'ord_id'=> $ord_id,'ord_sn'=> $order_info['ord_sn']]);
        } else {
           return redirect('orderList');
        }
    }
//订单详情的查看
    public function orderInfo(Request $request)
    {
        $ord_id = $request->input('ord_id');
        $user_id= session('user_id');              //用户的id
        $order_info = $this->pub($ord_id, $user_id);
        if($order_info) {
            $order_info['timeday'] = ceil(($order_info['des_time']-$order_info['dep_time'])/(24*60*60));  //租期
            $order_info['start_shop'] = $this->serverId($order_info['departure']);       //取车门店
            $order_info['stop_shop'] = $this->serverId($order_info['destination']);      //还车门店
            $order_info['start_date'] = date('Y-m-d H:i',$order_info['dep_time']);       //取车时间
            $order_info['stop_date'] =  date('Y-m-d H:i',$order_info['des_time']);       //还车时间
//租金信息
            $order_info['price']['base_price'] = $order_info['timeday']*$order_info['car_price'];
            $order_info['price']['basic_insurance'] = $order_info['timeday']*30;
            if ($order_info['departure']!=$order_info['destination']) {
                $order_info['price']['other_shop'] = 1;
            } else {
                $order_info['price']['other_shop'] = 0;
            }
//订单状态
            if ($order_info['ord_pay']==0) {
                $order_info['status'] ='未付款';
                $order_info['price']['money'] = 0;
            } else if($order_info['ord_pay']==1) {
                $order_info['status'] ='已付款，尚未提车';
                $order_info['price']['money'] = $order_info['ord_price'];
            } else if($order_info['ord_pay']==2) {
                $order_info['status'] ='使用中';
                $order_info['price']['money'] = $order_info['ord_price'];
            } else if($order_info['ord_pay']==3){
                $order_info['status'] ='已还车';
                $order_info['price']['money'] = $order_info['ord_price'];
            } else if($order_info['ord_pay']==4){
                $order_info['status'] ='待评价';
                $order_info['price']['money'] = 0;
            }else if($order_info['ord_pay']==5){
                $order_info['status'] ='订单已取消';
                $order_info['price']['money'] = 0;
            }
//查询优惠券使用
            if ($order_info['benefit_id']!=0) {
                $order_info['benefit'] = 1;
                $order_info['benefit_info'] = DB::table('benefit')
                    ->where(['benefit_id'=>$order_info['benefit_id'], 'user_id'=>$user_id])
                    ->first();
            } else {
                $order_info['benefit'] = 0;
            }
            $info = json_encode($order_info, JSON_UNESCAPED_UNICODE);
            return view('home.order.order_info', ['info'=> $info, 'ord_sn'=>$order_info['ord_sn']]);
        } else {
            return redirect('orderList');
        }
    }
//订单的取消
    public function cancelOrder(Request $request)
    {
       $ord_id = $request->input('ord_id');   //要取消的订单
       $user_id = session('user_id');          //用户
       $status = DB::table('order')
           ->where(['user_id'=>$user_id, 'ord_id'=> $ord_id])
           ->value('ord_pay');
       if ($status==0) {
           $result = DB::table('order')
               ->where(['user_id'=>$user_id, 'ord_id'=> $ord_id])
               ->update(['ord_pay' => 5]);
           if ($result) {
               echo "<script>alert('取消成功');location.href='orderList'</script>";
           } else {
               echo "<script>alert('取消失败');location.href='orderList'</script>";
           }
       } else {
               echo "<script>alert('请联系客服取消');location.href='orderList'</script>";
       }
    }
//订单付款
    public function zfbPay(Request $request)
    {
        $ord_sn = $request->input('ord_sn');           //订单号
        $user_id = session('user_id');                 //用户id
        $result = DB::table('order')
            ->where(['ord_sn'=> $ord_sn,'user_id'=>$user_id])
            ->first();
        if ($result) {
            $this->pay($ord_sn);
        } else {
            echo "<script>alert('支付失败');location.href='orderList'</script>";
        }
    }
//公共订单信息
    public function pub($ord_id, $user_id)
     {
       $order_info = DB::table('order')
             ->leftJoin('order_info', 'order.ord_id', '=', 'order_info.ord_id')
             ->leftJoin('car_info', 'order_info.car_id', '=', 'car_info.car_id')
             ->leftJoin('car_brand', 'car_info.brand_id', '=', 'car_brand.brand_id')
             ->where(['order.ord_id'=> $ord_id, 'order.user_id'=> $user_id])
             ->first();
       return $order_info;
     }
    /*
   * 支付宝支付
   * 总价
   * 订单号
   * */
    public function pay($ord_sn){
        // ******************************************************配置 start*************************************************************************************************************************
        //↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        //合作身份者id，以2088开头的16位纯数字
        $alipay_config['partner']		= '2088002075883504';
        //收款支付宝账号
        $alipay_config['seller_email']	= 'li1209@126.com';
        //安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']			= 'y8z1t3vey08bgkzlw78u9cbc4pizy2sj';
        //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        //签名方式 不需修改
        $alipay_config['sign_type']    = strtoupper('MD5');
        //字符编码格式 目前支持 gbk 或 utf-8
        //$alipay_config['input_charset']= strtolower('utf-8');
        //ca证书路径地址，用于curl中ssl校验
        //请保证cacert.pem文件在当前文件夹目录中
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';
        //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
        // ******************************************************配置 end*************************************************************************************************************************

        // ******************************************************请求参数拼接 start*************************************************************************************************************************
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'], // 合作身份者id
            "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
            "payment_type"	=> '1', // 支付类型
            "notify_url"	=> "http://www.jiuzucheba/error", // 服务器异步通知页面路径
            "return_url"	=> "http://www.jiuzucheba/paySuccess", // 页面跳转同步通知页面路径
            "out_trade_no"	=> "$ord_sn", // 商户网站订单系统中唯一订单号
            "subject"	=> "订单", // 订单名称
            "total_fee"	=> 0.01, // 付款金额
            "body"	=> "", // 订单描述 可选
            "show_url"	=> "", // 商品展示地址 可选
            "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            "exter_invoke_ip"	=> "", // 客户端的IP地址
            "_input_charset"	=> 'utf-8', // 字符编码格式
        );
// 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
                unset($parameter[$k]);
            }
        }
// 参数排序
        ksort($parameter);
        reset($parameter);

// 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . $alipay_config['key']);
        $parameter['sign_type'] = $alipay_config['sign_type'];
// ******************************************************请求参数拼接 end*************************************************************************************************************************


// ******************************************************模拟请求 start*************************************************************************************************************************
        $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
        foreach ($parameter as $k => $v) {
            $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
        }

        $sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

// ******************************************************模拟请求 end*************************************************************************************************************************
        echo $sHtml;
    }
    /*
     *支付失败
     *调到此处
     */
    public function errorr()
    {
       echo "<script>alert('支付失败');location.href='orderList'<script>";
    }
    /*
     * 支付成功
     * 修改支付状态页面
     */
    public function paySuccess(Request $request)
    {
        $ord = $request->input('out_trade_no');  //订单号
        $user_id = session('user_id');
        $order_info = DB::table('order')
            ->leftJoin('order_info', 'order.ord_id', '=', 'order_info.ord_id')
            ->where(['order.ord_sn'=> $ord, 'order.user_id'=> $user_id])
            ->first();
        DB::table('car_number')
            ->where(['server_id'=>$order_info['departure'], 'car_id'=>$order_info['car_id']])
            ->decrement('number');
        DB::table('order')
            ->where(['order.ord_sn'=> $ord, 'order.user_id'=> $user_id])
            ->update(['ord_pay'=>1]);
        return redirect('orderList');
    }
}





