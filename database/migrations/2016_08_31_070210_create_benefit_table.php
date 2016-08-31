<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 优惠券表
        Schema::create('benefit', function (Blueprint $table) {
            $table->increments('benefit_id');
            $table->integer('user_id');
            $table->string('benefit_name', 60);
            $table->decimal('ord_price', 8, 2);
            $table->integer('begin_time');
            $table->integer('end_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('benefit');
    }
}
