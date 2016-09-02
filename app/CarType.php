<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CarType extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'car_type';
    public $timestamps = false;
}