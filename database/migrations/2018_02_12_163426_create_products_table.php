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
//            $table->integer('image1')->unsigned();
//            $table->foreign('image1')->references('image_id')->on('images');
//            $table->integer('image2')->unsigned();
//            $table->foreign('image2')->references('image_id')->on('images');
//            $table->integer('image3')->unsigned()->nullable();
//            $table->foreign('image3')->references('image_id')->on('images');
//            $table->integer('image4')->unsigned()->nullable();
//            $table->foreign('image4')->references('image_id')->on('images');
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
