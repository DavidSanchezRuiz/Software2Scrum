<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->enum('rol', ['publicador', 'buscador','pendiente','administrador']);
            $table->enum('email_active', ['si', 'no']);
            $table->string('cargo');
            $table->integer('institute_id')->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->integer('lugar_id')->unsigned();
            $table->foreign('lugar_id')->references('id')->on('lugars');
            $table->string('password', 60);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
