<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit', function (Blueprint $table) {
            $table->increments('cre_id');
            $table->integer('user_id');
            $table->smallInteger('points');
            $table->tinyInteger('status')->default(1);
            $table->string('reason', 60);
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
        Schema::drop('credit');
    }
}
