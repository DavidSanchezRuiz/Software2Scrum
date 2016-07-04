<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('tipo', ['p', 'd', 'm']);
            $table->integer('lugar_id')->unsigned()->nullable();
            $table->foreign('lugar_id')->references('id')->on('lugars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lugars');
    }
}
