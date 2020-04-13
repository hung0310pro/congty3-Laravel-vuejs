<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelTest extends Model
{
    protected $table = "sanphammigrate";
    protected $fillable = ["id","nameproduct"]; // show ra những field mình muốn
    /*protected $hidden */ // không show ra những cái mình muốn.
   /* public $timestamps = false;*/ // cái này kiểu ví dụ mà k có cái cột này thì để như thế

   public function sanpham2onemany()
   {
   	// 1 nhiều
   	return $this->hasMany('App\sanpham2','id_product');
   }
}
