<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Picture extends Authenticatable
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
    protected $table = 'picture';
//默认id
    protected $primaryKey = 'picture_id';
//时间戳
    public $timestamps=false;
//白名单
    protected $fillable = ['dir', 'type', 'isUse', 'alt'];

}
