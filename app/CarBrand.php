<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CarBrand extends Model{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'car_brand';
    public $timestamps = false;
}