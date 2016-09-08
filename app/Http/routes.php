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
   Route::get('userInfo','HomeUserController@userInfo');
//修改密码展示页面
   Route::get('updatePass','HomeUserController@updatePass');
//修改密码发送短信
   Route::get('phone','HomeUserController@phone');
//接值进行密码的修改
   Route::post('password','HomeUserController@password');
//前台判断原密码是否正确
   Route::get('onlyPwd','HomeUserController@onlyPwd');
//前台验证修改手机验证码是否正确
   Route::get('onlyMobileCode','HomeUserController@onlyMobileCode');
//订单列表的展示
   Route::get('orderList','HomeUserController@orderList');
//优惠券的展示
   Route::get('benefitList','HomeUserController@benefitList');
//公开留言页面的展示
   Route::get('message','HomeUserController@message');
//ajax进行留言的添加
   Route::get('messageAdd','HomeUserController@messageAdd');
//滑动鼠标进行加载
   Route::get('messageDown','HomeUserController@messageDown');
});

//前台登陆页面的展示
Route::get('login','LoginController@login');
//前台登录接值验证
Route::post('loginPro','LoginController@loginPro');
//前台退出登录
Route::get('loginOut','LoginController@loginOut');

//短租自驾
Route::get('driving','IndexController@driving');


/*
 * 后台
 * */
Route::get('admins','AdminController@admin_login');

//后台登录
Route::get('admins','AdminController@admin_login');

//判断用户密码
Route::post('signin','AdminController@admin_login');

Route::group(['middleware' => ['nologin']], function(){
    Route::get('indexs','AdminController@indexs');
    /*
	   类型管理
	 */
	Route::get('typelist','CarTypeController@type_list');//类型列表
	Route::get('typelistpage/{page}/{search}/{del}','CarTypeController@listpage');//搜索分页
	Route::match(['get', 'post'],'typeadd','CarTypeController@add');//添加
	Route::post('typeupdate','CarTypeController@update');//编辑
	Route::get('typeupdate/{id}','CarTypeController@update');//更新
	Route::get('typedel/{id}','CarTypeController@del');//删除
	/*
	    品牌管理
	 */
	Route::get('brandlist','CarBrandController@brand_list');//品牌列表
	Route::get('brandlistpage/{page}/{search}/{del}','CarBrandController@listpage');//搜索分页
	Route::match(['get', 'post'],'brandadd','CarBrandController@add');//添加
	Route::post('brandupdate','CarBrandController@update');//编辑
	Route::get('brandupdate/{id}','CarBrandController@update');//更新
	Route::get('branddel/{id}','CarBrandController@del');//删除
	/*
	    用户管理
	 */
	Route::get('userlist','UserController@user_list');//前台用户列表
	Route::get('userlistpage/{page}','UserController@listpage');//用户分页
	Route::get('adminlist','UserController@admin_list');//后台用户列表
	Route::get('adminlistpage/{page}','UserController@adminlistpage');//后台管理分页

	/*
	    用户留言管理
	 */
	Route::get('messageList','UserController@message');//留言展示
	Route::get('messagepage/{page}/{del}','UserController@messagepage');//留言分页&删除
	Route::get('messageset/{id}','UserController@messageset');//留言审核
	Route::get('messageaccept/{id}','UserController@messageaccept');//留言采纳

	Route::get('car_type_list','AdminController@car_type_list');
    Route::get('model_add','AdminController@model_add');
    Route::post('type_add','AdminController@model_add');
    Route::post('type_del','AdminController@type_del');
    Route::get('address','AddressController@address');
    Route::get('address_two','AddressController@address_two');
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

