<?php


class CreateUsersTable extends Migration{
    public function up(){
        Schema::create('users', function (Blueprint $table){
            $table->increments('id');
            $table->string('username', 30);
            $table->string('email', 60);
            $table->string('password', 100);
            $table->string('remember_token', 100)->default(NULL)->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::drop('users');
    }
}