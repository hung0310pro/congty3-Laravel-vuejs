<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanPhamMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // hàm này sẽ thực thi tạo và save table
    public function up()
    {
        Schema::create('SanPhamMigrate',function($table){
            $table->increments('id');
            $table->string('nameproduct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // hàm này sẽ thực thi back lại những gì đã làm ở hàm up như là xóa bảng
    public function down()
    {
        Schema::drop('SanPhamMigrate');
    }
}
