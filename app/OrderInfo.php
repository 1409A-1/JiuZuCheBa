<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class OrderInfo extends Authenticatable
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
    protected $table = 'order_info';
//默认id
    //protected $primaryKey = '';
//时间戳
    public $timestamps=false;
//白名单
    protected $fillable = ['ord_id', 'departure','destination','dep_time','des_time','car_type','car_brand','benefit_id','car_id'];
}
