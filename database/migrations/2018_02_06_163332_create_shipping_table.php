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
            $table->increments('id_ship');
            $table->string('address1_ship');
            $table->string('address2_ship');
            $table->string('city_ship');
            $table->string('state_ship');
            $table->string('zip_ship');
        });
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
