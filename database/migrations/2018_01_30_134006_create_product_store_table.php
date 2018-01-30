<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_store', function (Blueprint $table){
          $table->increments('id');
          $table->timestamps();
          $table->softDeletes();
          $table->integer('estoque')->default(0);
          $table->float('preco')->nullable();
          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
          $table->integer('store_id')->unsigned();
          $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_store');
    }
}
