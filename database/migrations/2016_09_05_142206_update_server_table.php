<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 为服务点表添加 城市名、坐标、交通路线字段
        Schema::table('server', function (Blueprint $table) {
            $table->string('city_name', 64);
            $table->string('district', 64);
            $table->string('coordinate', 64);
            $table->string('traffic_line', 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('server', function($table) {
            $table ->dropColumn('city_name');
            $table ->dropColumn('district');
            $table ->dropColumn('coordinate');
            $table ->dropColumn('traffic_line');
        });
    }
}
