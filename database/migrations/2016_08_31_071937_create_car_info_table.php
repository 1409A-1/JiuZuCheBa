<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 订单表
        Schema::create('car_info', function (Blueprint $table) {
            $table->increments('car_id');
            $table->string('car_name', 60);
            $table->integer('type_id');
            $table->integer('brand_id');
            $table->string('car_img', 128);
            $table->decimal('car_price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_info');
    }
}
