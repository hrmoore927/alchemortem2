<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_ship')->autoIncrement();
            $table->string('address1_ship');
            $table->string('address2_ship');
            $table->string('city_ship');
            $table->integer('id_state')->unsigned();
            $table->foreign('id_state')->references('id_state')->on('states');
            $table->string('zip_ship');
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
        Schema::dropIfExists('shipping');
    }
}
