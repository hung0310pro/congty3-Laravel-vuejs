<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanPham2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham2', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',200);
            $table->string('sku');
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('sanphammigrate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SanPham2');
    }
}
