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
   Route::post('password',function(){
      echo 1;
   });

});
//登陆
Route::get('login',function(){

    session(['user_name'=>'张三']);
});
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
 */

//后台登录
Route::get('admins','AdminController@admin_login');
//判断用户密码
Route::post('signin','AdminController@admin_login');

Route::group(['middleware' => ['nologin']], function(){
    Route::get('indexs','AdminController@indexs');
//车辆类型
    Route::get('car_type_list','AdminController@car_type_list');
    Route::get('model_add','AdminController@model_add');
    Route::post('type_add','AdminController@model_add');
    Route::post('type_del','AdminController@type_del');
    Route::get('address','AddressController@address');
    Route::get('address_two','AddressController@address_two');

//车辆类型
    Route::get('typelist','CarTypeController@car_list');//列表展示
    Route::get('typelistpage/{page}/{search}','CarTypeController@listpage'); //列表分页
    Route::any('typeadd','CarTypeController@add'); //添加
    Route::post('typeupdate','CarTypeController@update'); //修改
    Route::get('typeupdate/{id}','CarTypeController@update'); //执行修改
    Route::get('typedel/{id}','CarTypeController@del');    //删除



/*
 *车辆品牌管理
 */
    Route::get('brandlist','CarBrandController@brand_list');
    Route::get('brandlistpage/{page}/{search}','CarTypeController@listpage');
    Route::any('brandadd','CarBrandController@add');
    Route::post('brandupdate','CarBrandController@update');
    Route::get('brandupdate/{id}','CarBrandController@update');
    Route::get('branddel/{id}','CarBrandController@del');
});






// 微信对接
Route::get('valid','WechatController@valid');
Route::get('oAuth','WechatController@oAuth');
Route::get('weChatLogin','WechatController@weChatLogin');
