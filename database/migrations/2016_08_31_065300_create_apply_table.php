<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 租车申请表
        Schema::create('apply', function (Blueprint $table) {
            $table->increments('apply_id');
            $table->integer('user_id');
            $table->integer('departure');
            $table->integer('destination');
            $table->integer('dep_time');
            $table->integer('des_time');
            $table->integer('car_type');
            $table->integer('car_brand');
            $table->tinyInteger('apply_status')->default(0);
            $table->integer('apply_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apply');
    }
}
