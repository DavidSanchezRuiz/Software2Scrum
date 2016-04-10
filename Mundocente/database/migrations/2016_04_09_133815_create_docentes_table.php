<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->enum('privilegio', ['Consultador', 'Creador']);
            $table->string('email')->unique();
            $table->integer('numero_tel');
            $table->string('password', 60);
            $table->timestamps();
            $table->integer('id_instituto')->unsigned();
            $table->foreign('id_instituto')->references('id')->on('institutos');
            $table->integer('id_lugar')->unsigned();
            $table->foreign('id_lugar')->references('id')->on('lugars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('docentes');
    }
}
