<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //数据库
    protected $table='user';
    //默认id
    protected $primaryKey = 'user_id';
    //时间戳
    public $timestamps=false;
}
