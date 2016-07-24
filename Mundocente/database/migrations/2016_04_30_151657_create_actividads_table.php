<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->enum('tipo', ['convocatoria', 'revista', 'evento']);
            $table->string('cargo');
            $table->string('enlace');
            $table->string('description');
            $table->enum('indexada', ['si', 'no']);
            $table->enum('categoria', ['A1', 'A2', 'B', 'C']);
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->timestamps();
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('lugar_id')->unsigned();
            $table->foreign('lugar_id')->references('id')->on('lugars');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actividads');
    }
}
