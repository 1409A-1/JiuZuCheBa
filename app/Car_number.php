<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Car_number extends Authenticatable
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
    protected $table = 'car_number';
//默认id
    //protected $primaryKey = false;
//时间戳
    public $timestamps=false;
//白名单
    protected $fillable = ['server_id', 'car_id', 'number'];
}
