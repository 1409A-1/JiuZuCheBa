<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 套餐表
        Schema::create('package', function (Blueprint $table) {
            $table->increments('pack_id');
            $table->string('pack_name', 60);
            $table->decimal('pack_price', 8, 2);
            $table->tinyInteger('pack_day')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('package');
    }
}
