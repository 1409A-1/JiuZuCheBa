<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //数据库
    protected $table='user';
    //默认id
    protected $primaryKey = 'user_id';
    //时间戳
    public $timestamps=false;

    //前台验证用户名唯一
    public static function onlyName(string $name)
    {
    	return self::where('user_name', $name)->first();
    }

    //前台验证手机号唯一
    public static function onlyPhone(string $phone)
    {
    	return self::where('tel', $phone)->first();
    }
}
