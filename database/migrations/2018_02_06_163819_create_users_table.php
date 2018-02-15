<?php

use Illuminate\Support\Facades\Schema;
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
            $table->engine = 'InnoDB';
            $table->increments('id_users')->autoIncrement();
            $table->string('fName_users');
            $table->string('lName_users');
            $table->string('email_users')->unique();
            $table->string('password_users');
            $table->string('phone_users');
            $table->integer('id_bill')->unsigned();
            $table->foreign('id_bill')->references('id_bill')->on('billing');
            $table->integer('id_ship')->unsigned();
            $table->foreign('id_ship')->references('id_ship')->on('shipping');
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id_role')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
