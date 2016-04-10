<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_area')->unsigned();
            $table->foreign('id_area')->references('id')->on('areas');
            $table->integer('id_docente')->unsigned();
            $table->foreign('id_docente')->references('id')->on('docentes');
            $table->integer('id_actividad')->unsigned();
            $table->foreign('id_actividad')->references('id')->on('actividads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('creados');
    }
}
