<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
//表名
    protected $table = 'benefit';
//默认id
    protected $primaryKey = 'benefit_id';
//时间戳
    public $timestamps = false;
}
