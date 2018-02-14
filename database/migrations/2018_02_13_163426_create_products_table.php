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
            $table->increments('id_product');
            $table->string('productName');
            $table->integer('id_images')->unsigned();
            $table->foreign('id_images')->references('id_images')->on('images');
            $table->text('description');
            $table->string('materials');
            $table->string('weight');
            $table->string('dimensions');
            $table->string('category');
            $table->integer('price');
            $table->string('keywords');
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
