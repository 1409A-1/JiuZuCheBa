<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 为地区表添加地区拼音、地区类型字段
        Schema::table('apply', function (Blueprint $table) {
            $table->Integer('car_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apply', function($table) {
            $table ->dropColumn('car_id');
        });
    }
}
