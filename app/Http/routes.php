<?php
// ---------------------------------- 前台注册、登录、退出
//注册
Route::get('register', 'LoginController@register');
//注册接值处理
Route::post('registerPro', 'LoginController@registerPro');
//前台登陆页面的展示
Route::get('login', 'LoginController@login');
//前台盒子登录
Route::get('loginBox', 'LoginController@loginBox');
//前台登录接值验证
Route::post('loginPro', 'LoginController@loginPro');
//前台退出登录
Route::get('logOut', 'LoginController@loginOut');
//发送手机验证码
Route::get('phoneCode', 'LoginController@phoneCode');
// -------------------------------------------------

// ---------------------------------- 前台菜单
//前台首页展示
Route::get('/', 'IndexController@home');
//短租
Route::match(['get', 'post'], 'short', 'IndexController@short');
//长租
Route::get('long', 'IndexController@long');
//门店地图展示
Route::get('cityMap', 'IndexController@cityMap'); //城市地图
Route::get('nationalMap', 'IndexController@nationalMap'); //国家地图
// -------------------------------------------------

//前台的非法登录中间件
Route::group(['middleware' => ['homelogin']], function(){
	//前台的个人中心
	Route::get('userInfo', 'HomeUserController@userInfo');
    //前台中积分的查看详情
    Route::get('credit', 'HomeUserController@credit');
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
    //前台修改用户名验证唯一
    Route::get('checkUpdaName', 'HomeUserController@checkUpdaName');
    //前台修改时手机验证唯一
    Route::get('checkUpdaTel', 'HomeUserController@checkUpdaTel');
    //前台修改用户名手机号
    Route::post('updaUser', 'HomeUserController@updaUser');
	//订单列表的展示
	Route::get('orderList', 'HomeUserController@orderList');
    //长租申请的查看
    Route::get('apply', 'HomeUserController@apply');
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
    //使用get查看时404页面
    Route::get('subOrder', 'IndexController@err404');
    //订单确认提交
    Route::get('orderAdd', 'HomeOrderController@orderAdd');
    //订单生成
    Route::get('orderSuccess', 'HomeOrderController@orderSuccess');
    //订单详情页的查看
    Route::get('orderInfo', 'HomeOrderController@orderInfo');
    //短租订单取消
    Route::get('cancelOrder', 'HomeOrderController@cancelOrder');
    //长租申请的中的取消
    route::get('cancelLong', 'HomeOrderController@cancelLong');
    //调用支付宝付款
    Route::get('zfbPay', 'HomeOrderController@zfbPay');
    //支付失败
    Route::get('error', 'HomeOrderController@error');
    //支付成功
    Route::get('paySuccess', 'HomeOrderController@paySuccess');
});

// ---------------------------------- 后台登陆、推出
//后台登录
Route::get('admins', 'AdminController@adminLogin');
//判断用户密码
Route::post('signin', 'AdminController@adminLogin');
//后台登出
Route::get('logout', 'AdminController@logout');
// -------------------------------------------------

//后台的非法登录中间件
Route::group(['middleware' => ['nologin']], function(){
    Route::get('indexs', 'AdminController@indexs');//后台首页

  	/**
     * 类型管理
     */
	Route::get('typeList', 'CarTypeController@typeList');//类型列表
	Route::get('typeListPage/{page}/{search}/{del}', 'CarTypeController@listPage');//搜索分页
	Route::match(['get', 'post'],'typeAdds','CarTypeController@add');//添加
	Route::post('typeUpdate', 'CarTypeController@update');//编辑
	Route::get('typeUpdate/{id}', 'CarTypeController@update');//更新
	Route::get('typeDel/{id}', 'CarTypeController@del');//删除
	
    /**
     * 品牌管理
     */
	Route::get('brandList', 'CarBrandController@brandList');//品牌列表
	Route::get('brandListPage/{page}/{search}/{del}', 'CarBrandController@listPage');//搜索分页
	Route::match(['get', 'post'], 'brandAdd', 'CarBrandController@add');//添加
	Route::post('brandUpdate', 'CarBrandController@update');//编辑
	Route::get('brandUpdate/{id}', 'CarBrandController@update');//更新
	Route::get('brandDel/{id}', 'CarBrandController@del');//删除
	
    /**
     * 用户管理
     */
	Route::get('userList', 'UserController@userList');//前台用户列表
	Route::get('userListPage/{page}', 'UserController@listPage');//用户分页
	Route::get('adminList', 'UserController@adminList');//后台用户列表
	Route::get('adminListPage/{page}', 'UserController@adminListPage');//后台管理分页

	/**
     * 用户留言管理
     */
	Route::get('messageList', 'UserController@message');//留言展示
	Route::get('messagePage/{page}/{del}', 'UserController@messagePage');//留言分页&删除
	Route::get('messageSet/{id}', 'UserController@messageSet');//留言审核
	Route::get('messageAccept/{id}', 'UserController@messageAccept');//留言采纳

	/**
     * 长租订单审核
     */
	Route::get('longOrderList', 'UserController@longOrderList');
	Route::post('longOrderCheck', 'UserController@longOrderCheck');

    Route::post('typeAdd', 'AdminController@modelAdd');
    Route::post('typeDel', 'AdminController@typeDel');

    /**
     * 地区及服务点管理
     */
    Route::get('serverAdd', 'AddressController@serverAdd');                 //服务点添加
    Route::get('addressTwo', 'AddressController@addressTwo');

    Route::get('addrList', 'AddressController@addrList');                   //地区列表
    Route::get('addrIns', 'AddressController@addrIns');                     //地区添加页面
    Route::get('addrDel', 'AddressController@addrDel');                     //地区删除

    Route::get('cityTypeUpdate', 'AddressController@cityTypeUpdate');       //地区城市类型修改
    Route::post('typeIns', 'AddressController@typeIns');                    //地区的添加
    Route::post('ping', 'AddressController@ping');                          //汉语转换拼音

    Route::post('addServer','AddressController@addServer');                 //添加服务点
    Route::get('addressList','AddressController@addressList');              //服务点列表展示
    Route::get('addressDel/{server_id}','AddressController@addressDel');    //服务点删除
    // Route::post('typeInfo', 'AddressController@typeInfo');               //地区列表操作
    // Route::get('addrSelect', 'AddressController@addrSelect');            //地区列表

    /**
     * 套餐管理
     */
    Route::get('package', 'PackageController@package');                     //套餐列表
    Route::get('packIns', 'PackageController@packageIns');                  //套餐添加
    Route::post('packInsert', 'PackageController@packageIns');              //套餐添加
    Route::get('packDel/{pack_id}', 'PackageController@packDel');           //套餐删除
    Route::get('userPack', 'PackageController@userPack');                   //用户套餐申请查看

    /*
     * name:wanghu
     * time:2016/9/9
     * 描述：订单的审核
     */
    Route::get('orderLists', 'OrderController@orderList');
    Route::get('orderInquiry', 'OrderController@orderInquiry');                //订单搜索
    Route::get('orderInfo/{ord_id}', 'OrderController@orderInfo');
    Route::get('carry/{ord_id}', 'OrderController@carry');                      //提车
    Route::get('still/{ord_id}', 'OrderController@still');                      //还车
    Route::post('integralManagement', 'OrderController@integralManagement');    //还车

    Route::any('carIns', 'CarController@carIns');                               //车辆的添加
    Route::get('carSel','CarController@carSel');                                //车辆列表的搜索
    Route::get('carList', 'CarController@carList');                             //车辆展示列表
    Route::get('carDel/{car_id}', 'CarController@carDel');                      //车辆删除
    Route::get('carServer', 'CarController@carServer');                         //服务点车辆分配页面
    Route::post('carServerAdd', 'CarController@carServerAdd');                  //服务点车辆分配执行
    Route::post('carUnique', 'CarController@carUnique');                        //车辆分配唯一性查询
    Route::get('carServerList', 'CarController@carServerList');                 //服务点车辆信息列表
    Route::get('carServerPage/{page}/{search1}/{search2}/{search3}/{search4}', 'CarController@carServerPage');//服务点车辆信息分页
    Route::get('serverSelect/{search1}/{search2}', 'CarController@serverSelect');//服务点联动查询
    Route::get('carServerUpdate/{serverId}/{carId}/{newNumber}', 'CarController@carServerUpdate');//服务点联动查询
    Route::get('picture', 'HomePictureController@manage');//前台图片展示列表
    Route::match(['get', 'post'],'pictureAdd', 'HomePictureController@pictureAdd');//前台图片展示列表
    Route::get('pictureDel/{page}/{del}', 'HomePictureController@pictureDel');//前台图片展示列表
    Route::get('pictureEdit/{pictureId}/', 'HomePictureController@pictureEdit');//前台图片展示列表

});

// 微信对接 授权登录
Route::get('valid', 'WechatController@valid');                                  // 微信对接
Route::get('oAuth', 'WechatController@oAuth');                                  // 第三方授权登录窗口
Route::get('weChatLogin', 'WechatController@weChatLogin');                      // 微信登录

// 前台数据查询常用路由
Route::post('getCityList', 'PublicController@getCityList');                     // 获取城市列表
Route::post('getServerList', 'PublicController@getServerList');                 // 获取服务点列表
Route::post('getCarList', 'PublicController@getCarList');                       // 获取车辆列表
Route::post('getCarTypeList', 'PublicController@getCarTypeList');               // 获取车辆列表
Route::post('getSpecialCar', 'PublicController@getSpecialCar');                 // 获取当前城市热门车型
Route::post('longRentApply', 'PublicController@longRentApply');                 // 长租申请
Route::post('getCarBrandByServer', 'PublicController@getCarBrandByServer');     // 根据门店获取车辆品牌
Route::post('getServerForCountry', 'PublicController@getServerForCountry');     // 根据门店获取全国地图统计信息
