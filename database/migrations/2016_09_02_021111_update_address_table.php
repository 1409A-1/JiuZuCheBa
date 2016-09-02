<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 为地区表添加地区拼音、地区类型字段
        Schema::table('address', function (Blueprint $table) {
            $table->string('abridge', 10);
            $table->tinyInteger('type')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address', function($table) {
            $table ->dropColumn('abridge');
            $table ->dropColumn('type');
        });
    }
}
