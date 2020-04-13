<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
           $table->increments('id');
           $table->integer('people_id')->unsigned();
           $table->string('name');
           $table->string('desc');
           $table->integer('price');
           $table->timestamps();
           $table->foreign('people_id')->references('id')->on('people');
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
