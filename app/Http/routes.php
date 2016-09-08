<?php

Route::get('/', function () {
    return view('home.index.home');
});

Route::get('home','IndexController@home');
//注册
Route::get('login_reg','LoginController@register');
//注册接值处理
Route::post('reg_pro','LoginController@reg_pro');
//前台验证注册用户名唯一
Route::get('only_name','LoginController@only_name');
//前台验证注册手机号唯一
Route::get('only_tel','LoginController@only_tel');


//前台的非法登录
Route::group(['middleware' => ['homelogin']], function(){
//前台的个人中心
   Route::get('user_info','HomeUserController@user_info');
//修改密码展示页面
   Route::get('update_pass','HomeUserController@update_pass');
//修改密码发送短信
   Route::get('phone','HomeUserController@phone');
//接值进行密码的修改
   Route::post('password','HomeUserController@password');
//前台判断原密码是否正确
   Route::get('only_pwd','HomeUserController@only_pwd');
//前台验证修改手机验证码是否正确
   Route::get('only_mobile_code','HomeUserController@only_mobile_code');
//订单列表的展示
   Route::get('order_list','HomeUserController@order_list');

});

//前台登陆
Route::get('login','LoginController@login');
//登录验证
Route::post('login_pro','LoginController@login_pro');
//前台退出登录
Route::get('login_out','LoginController@login_out');
//短租自驾
Route::get('driving','IndexController@driving');
//长期租车
Route::get('lease_car','IndexController@lease_car');
//企业租车
Route::get('e_rent_car','IndexController@e_rent_car');
//优惠活动
Route::get('pre_activity','IndexController@pre_activity');
//招商加盟
Route::get('attract','IndexController@attract');




//后台登录
Route::get('admins','AdminController@adminLogin');

//判断用户密码
Route::post('signin','AdminController@adminLogin');

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

	Route::get('carTypeList','AdminController@carTypeList');
    Route::get('modelAdd','AdminController@modelAdd');
    Route::post('typeAdd','AdminController@modelAdd');
    Route::post('typeDel','AdminController@typeDel');
    Route::get('address','AddressController@address');//服务点添加
    Route::get('addressTwo','AddressController@addressTwo');

    Route::get('addrList','AddressController@addrList');//地区列表
    Route::get('addrIns','AddressController@addrIns');//地区添加页面
    Route::post('typeIns','AddressController@typeIns');//地区的添加
    Route::post('ping','AddressController@ping');//汉语转换拼音
    Route::post('addInsert','AddressController@address_ins');//服务点的添加页面
    Route::post('addServer','AddressController@add_server');//添加服务点
    Route::get('addressList','AddressController@addressList');//服务点列表展示
    Route::get('addressDel/{server_id}','AddressController@addressDel');//服务点删除
    Route::get('package','PackageController@package');//套餐列表
    Route::get('packIns','PackageController@package_ins');//套餐添加
    Route::post('packInsert','PackageController@package_ins');//套餐添加
    Route::get('packDel/{pack_id}','PackageController@pack_del');//套餐删除
    Route::get('userPack','PackageController@user_pack');//用户套餐申请查看



    Route::any('carIns','CarController@carIns');//车辆的添加
    Route::get('carList','CarController@carList');//车辆展示列表
    Route::get('carDel/{car_id}','CarController@carDel');//车辆删除

//车辆类型
    Route::get('typelist','CarTypeController@car_list');//列表展示
    Route::get('typelistpage/{page}/{search}','CarTypeController@listpage'); //列表分页
    Route::any('typeadd','CarTypeController@add'); //添加
    Route::post('typeupdate','CarTypeController@update'); //修改
    Route::get('typeupdate/{id}','CarTypeController@update'); //执行修改
    Route::get('typedel/{id}','CarTypeController@del');    //删除
    Route::get('typedel/{id}','CarTypeController@del');    //删除
});

// 微信对接 授权登录
Route::get('valid','WechatController@valid');   // 微信对接
Route::get('oAuth','WechatController@oAuth');   // 第三方授权登录窗口
Route::get('weChatLogin','WechatController@weChatLogin');   // 微信登录

// 常用路由
Route::post('getCityList','PublicController@getCityList');  // 获取城市列表
Route::post('getServerList','PublicController@getServerList');  // 获取城市列表

// 短租
// 长租
