<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 //订单详情表添加字段
    public function up()
    {
        Schema::table('order_info', function (Blueprint $table) {
            $table->integer('car_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_info', function($table) {
            $table ->dropColumn('car_id');
        });
    }
}
