<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_id')->autoIncrement();
            $table->string('productName')->index('productName');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->text('description');
            $table->string('materials');
            $table->string('dimensions');
            $table->string('category');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
