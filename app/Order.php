<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

//表名
    protected $table = 'order';
//默认id
    protected $primaryKey = 'order_id';
//时间戳
    public $timestamps=false;
//白名单
    protected $fillable = ['user_id', 'ord_sn','ord_type','ord_package','ord_price','ord_pay','add_time','note','id_card'];
}
