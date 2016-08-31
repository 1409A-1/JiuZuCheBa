<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 订单详情表
        Schema::create('order_info', function (Blueprint $table) {
            $table->integer('ord_id');
            $table->integer('departure');
            $table->integer('destination');
            $table->integer('dep_time');
            $table->integer('des_time');
            $table->integer('car_type');
            $table->integer('car_brand');
            $table->integer('benefit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_info');
    }
}
