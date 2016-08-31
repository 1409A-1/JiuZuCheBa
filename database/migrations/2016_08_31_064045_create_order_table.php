<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 订单表
        Schema::create('order', function (Blueprint $table) {
            $table->increments('ord_id');
            $table->integer('user_id');
            $table->string('ord_sn', 60);
            $table->tinyInteger('ord_type');
            $table->tinyInteger('ord_package')->default(0);
            $table->decimal('ord_price', 8, 2);
            $table->tinyInteger('ord_pay')->default(0);
            $table->string('note', 128);
            $table->char('id_card', 18);
            $table->integer('add_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }
}
