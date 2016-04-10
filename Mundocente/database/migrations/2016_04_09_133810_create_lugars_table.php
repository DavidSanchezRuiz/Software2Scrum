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
            $table->enum('tipo', ['Pais', 'Departamento','Municipio']);
            $table->string('nombre');
            $table->timestamps();
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
        Schema::drop('lugars');
    }
}
