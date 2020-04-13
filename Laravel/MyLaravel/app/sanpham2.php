<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham2 extends Model
{
    protected $table = "sanpham2";
    /*protected $fillable = ["id","nameproduct"];*/ // show ra những field mình muốn
    /*protected $hidden */ // không show ra những cái mình muốn.
    public $timestamps = false; // cái này kiểu ví dụ mà k có cái cột này thì để như thế
}
