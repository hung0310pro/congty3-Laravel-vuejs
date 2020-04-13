<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = "Car";
    public $timestamps = false;

    public function manycarmanycolor(){
    	// bảng trung gian.
    	return $this->belongsToMany('App\Color','CarColor');
    }
}
