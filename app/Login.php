<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    protected $table='user';

    protected $guarded=['id'];

    public $timestamps = false;
}
