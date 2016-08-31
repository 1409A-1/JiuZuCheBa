<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('home.index.home');
});
Route::get('home','IndexController@home');
//注册
Route::get('login_reg','LoginController@register');
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
//后台首页
/*
 * 判断登陆
 * */
Route::group(['middleware' => ['nologin']], function(){
    Route::get('index','AdminController@admin');
});

