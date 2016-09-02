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
    Route::get('index','AdminController@index');
});

/*
 *车辆类型管理
 */
Route::group(['middleware' => ['nologin']], function(){
	Route::get('typelist','CarTypeController@list');
	Route::get('typelistpage/{page}/{search}','CarTypeController@listpage');
	Route::any('typeadd','CarTypeController@add');
	Route::post('typeupdate','CarTypeController@update');
	Route::get('typeupdate/{id}','CarTypeController@update');
	Route::get('typedel/{id}','CarTypeController@del');
});

/*
 *车辆品牌管理
 */
Route::group(['middleware' => ['nologin']], function(){
	Route::get('brandlist','CarBrandController@list');
	Route::get('brandlistpage/{page}/{search}','CarTypeController@listpage');
	Route::any('brandadd','CarBrandController@add');
	Route::post('brandupdate','CarBrandController@update');
	Route::get('brandupdate/{id}','CarBrandController@update');
	Route::get('branddel/{id}','CarBrandController@del');
});