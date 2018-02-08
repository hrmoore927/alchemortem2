<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_order');
            $table->integer('total');
            $table->date('orderDate');
            $table->date('shipDate');
            $table->string('orderStatus');
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id_users')->on('users');
            $table->integer('id_payment')->unsigned();
            $table->foreign('id_payment')->references('id_payment')->on('payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
