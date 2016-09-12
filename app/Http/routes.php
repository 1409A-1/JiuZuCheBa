<?php
//前台首页展示
Route::get('/', function () {
    return view('home.index.home');
});
//注册
Route::get('loginReg','LoginController@register');
//注册接值处理
Route::post('regPro','LoginController@regPro');
//前台验证注册用户名唯一
Route::get('onlyName','LoginController@onlyName');
//前台验证注册手机号唯一
Route::get('onlyTel','LoginController@onlyTel');


//前台的非法登录
Route::group(['middleware' => ['homelogin']], function(){
	//前台的个人中心
	Route::get('userInfo', 'HomeUserController@userInfo');
	//修改密码展示页面
	Route::get('updatePass', 'HomeUserController@updatePass');
	//修改密码发送短信
	Route::get('phone', 'HomeUserController@phone');
	//接值进行密码的修改
	Route::post('password', 'HomeUserController@password');
	//前台判断原密码是否正确
	Route::get('onlyPwd', 'HomeUserController@onlyPwd');
	//前台验证修改手机验证码是否正确
	Route::get('onlyMobileCode', 'HomeUserController@onlyMobileCode');
	//订单列表的展示
	Route::get('orderList', 'HomeUserController@orderList');
	//优惠券的展示
	Route::get('benefitList', 'HomeUserController@benefitList');
	//公开留言页面的展示
	Route::get('message', 'HomeUserController@message');
	//ajax进行留言的添加
	Route::get('messageAdd', 'HomeUserController@messageAdd');
	//滑动鼠标进行加载
	Route::get('messageDown', 'HomeUserController@messageDown');
    //订单预订展示
    Route::post('subOrder', 'HomeOrderController@subOrder');
    //订单确认提交
    Route::get('orderAdd', 'HomeOrderController@orderAdd');
    //订单生成
    Route::get('orderSuccess', 'HomeOrderController@orderSuccess');
    //订单详情页的查看
    Route::get('orderInfo', 'HomeOrderController@orderInfo');
    //订单取消
    Route::get('cancelOrder', 'HomeOrderController@cancelOrder');
    //调用支付宝付款
    Route::get('zfbPay', 'HomeOrderController@zfbPay');
    //支付失败
    Route::get('error', 'HomeOrderController@error');
    //支付成功
    Route::get('paySuccess', 'HomeOrderController@paySuccess');
});

//前台登陆页面的展示
Route::get('login', 'LoginController@login');
//前台盒子登录
Route::get('loginBox', function(){
    return view('home.login.loginBox');
});
//前台盒子登录的验证接值
Route::get('loginBoxPro', 'LoginController@loginBoxPro');
//前台登录接值验证
Route::post('loginPro', 'LoginController@loginPro');
//前台退出登录
Route::get('logout', 'LoginController@loginOut');
//短租
Route::get('short', 'IndexController@short');
//长租
Route::get('long', 'IndexController@long');


//后台登录
Route::get('admins','AdminController@adminLogin');

//判断用户密码
Route::post('signin','AdminController@adminLogin');

Route::group(['middleware' => ['nologin']], function(){
    Route::get('indexs','AdminController@indexs');
  
  	/*
	   类型管理
	 */
	Route::get('typeList','CarTypeController@typeList');//类型列表
	Route::get('typeListPage/{page}/{search}/{del}','CarTypeController@listPage');//搜索分页
	Route::match(['get', 'post'],'typeAdds','CarTypeController@add');//添加
	Route::post('typeUpdate','CarTypeController@update');//编辑
	Route::get('typeUpdate/{id}','CarTypeController@update');//更新
	Route::get('typeDel/{id}','CarTypeController@del');//删除
	
    /*
	    品牌管理
	 */
	Route::get('brandList','CarBrandController@brandList');//品牌列表
	Route::get('brandListPage/{page}/{search}/{del}','CarBrandController@listPage');//搜索分页
	Route::match(['get', 'post'],'brandAdd','CarBrandController@add');//添加
	Route::post('brandUpdate','CarBrandController@update');//编辑
	Route::get('brandUpdate/{id}','CarBrandController@update');//更新
	Route::get('brandDel/{id}','CarBrandController@del');//删除
	
    /*
	    用户管理
	 */
	Route::get('userList','UserController@userList');//前台用户列表
	Route::get('userListPage/{page}','UserController@listPage');//用户分页
	Route::get('adminList','UserController@adminList');//后台用户列表
	Route::get('adminListPage/{page}','UserController@adminListPage');//后台管理分页

	/*
	    用户留言管理
	 */
	Route::get('messageList','UserController@message');//留言展示
	Route::get('messagePage/{page}/{del}','UserController@messagePage');//留言分页&删除
	Route::get('messageSet/{id}','UserController@messageSet');//留言审核
	Route::get('messageAccept/{id}','UserController@messageAccept');//留言采纳

	/*
		长租订单审核
	 */
	Route::get('longOrderList','UserController@longOrderList');
	Route::post('longOrderCheck','UserController@longOrderCheck');

    Route::post('typeAdd','AdminController@modelAdd');
    Route::post('typeDel','AdminController@typeDel');
    Route::get('address','AddressController@address');//服务点添加
    Route::get('addressTwo','AddressController@addressTwo');

    Route::get('addrList','AddressController@addrList');//地区列表
    Route::get('addrSelect','AddressController@addrSelect');//地区列表
    Route::get('addrIns','AddressController@addrIns');//地区添加页面
    Route::post('typeIns','AddressController@typeIns');//地区的添加
    Route::post('ping','AddressController@ping');//汉语转换拼音

    Route::post('addServer','AddressController@addServer');//添加服务点
    Route::get('addressList','AddressController@addressList');//服务点列表展示
    Route::get('addressDel/{server_id}','AddressController@addressDel');//服务点删除
    Route::get('package','PackageController@package');//套餐列表
    Route::get('packIns','PackageController@packageIns');//套餐添加
    Route::post('packInsert','PackageController@packageIns');//套餐添加
    Route::get('packDel/{pack_id}','PackageController@packDel');//套餐删除
    Route::get('userPack','PackageController@userPack');//用户套餐申请查看

    /*
     * name:wanghu
     * time:2016/9/9
     * 描述：订单的审核
     * */
    Route::get('orderLists','OrderController@orderList');
    Route::get('orderInfo/{ord_id}','OrderController@orderInfo');
    Route::get('carry/{ord_id}','OrderController@carry');//提车
    Route::get('still/{ord_id}','OrderController@still');//还车


    Route::any('carIns','CarController@carIns');//车辆的添加
    Route::get('carList','CarController@carList');//车辆展示列表
    Route::get('carDel/{car_id}','CarController@carDel');//车辆删除
    Route::get('carServer','CarController@carServer');//服务点车辆分配页面
    Route::post('carServerAdd','CarController@carServerAdd');//服务点车辆分配执行
    Route::post('carUnique','CarController@carUnique');//车辆分配唯一性查询
    Route::get('carServerList','CarController@carServerList');//服务点车辆信息列表
    Route::get('carServerPage/{page}','CarController@carServerPage');//服务点车辆信息分页

});

// 微信对接 授权登录
Route::get('valid','WechatController@valid');   // 微信对接
Route::get('oAuth','WechatController@oAuth');   // 第三方授权登录窗口
Route::get('weChatLogin','WechatController@weChatLogin');   // 微信登录

// 常用路由
Route::post('getCityList','PublicController@getCityList');  // 获取城市列表
Route::post('getServerList','PublicController@getServerList');  // 获取服务点列表
Route::post('getCarList','PublicController@getCarList');  // 获取车辆列表
Route::post('getCarTypeList','PublicController@getCarTypeList');  // 获取车辆列表
Route::post('getSpecialCar','PublicController@getSpecialCar');  // 获取当前城市热门车型
