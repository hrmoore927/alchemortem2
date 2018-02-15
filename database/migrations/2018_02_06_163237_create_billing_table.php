<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_bill')->autoIncrement();
            $table->string('address1_bill');
            $table->string('address2_bill');
            $table->string('city_bill');
            $table->integer('id_state')->unsigned();
            $table->foreign('id_state')->references('id_state')->on('states');
            $table->string('zip_bill');
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
        Schema::dropIfExists('billing');
    }
}
