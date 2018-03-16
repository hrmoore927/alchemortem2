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
            $table->increments('id')->autoIncrement();
            $table->string('fName');
            $table->string('lName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
//            $table->integer('ship_id')->unsigned();
//            $table->foreign('ship_id')->references('id')->on('shippings');
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
