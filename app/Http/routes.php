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







//登陆
Route::get('login','LoginController@login');
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


/*
 * 后台
 * */
Route::get('admins','AdminController@admin_login');
Route::post('signin','AdminController@admin_login');

Route::group(['middleware' => ['nologin']], function(){
    Route::get('index','AdminController@index');
});

/*
 *车辆类型&品牌管理
 */
Route::group(['middleware' => ['nologin']], function(){
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
});

Route::group(['middleware' => ['nologin']], function(){
    Route::get('car_type_list','AdminController@car_type_list');
    Route::get('model_add','AdminController@model_add');
    Route::post('type_add','AdminController@model_add');
    Route::post('type_del','AdminController@type_del');
    Route::get('address','AddressController@address');
    Route::get('address_two','AddressController@address_two');
});

// 微信对接
Route::get('valid','WechatController@valid');
Route::get('oAuth','WechatController@oAuth');
Route::get('weChatLogin','WechatController@weChatLogin');
