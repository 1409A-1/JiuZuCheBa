<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Server extends Authenticatable
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
    protected $table = 'server';
//默认id
    protected $primaryKey = 'server_id';
//时间戳
    public $timestamps=false;




}
