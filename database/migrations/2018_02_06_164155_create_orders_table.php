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
            $table->increments('order_id')->autoIncrement();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('custName');
            $table->text('shipLine1');
            $table->text('shipLine2')->nullable();
            $table->text('shipCity');
            $table->text('shipState');
            $table->text('shipZip');
            $table->timestamp('orderDate')->index('orderDate');
            $table->date('shipDate')->nullable();
            $table->string('orderStatus')->default('paid');
            $table->text('cart');
            $table->string('payment_id');
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
        Schema::dropIfExists('orders');
    }
}
