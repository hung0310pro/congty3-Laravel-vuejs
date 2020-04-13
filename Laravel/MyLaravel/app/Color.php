<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = "Color";
    public $timestamps = false;

    public function manycolormanycar(){
    	// bảng trung gian.
    	return $this->belongsToMany('App\Car','CarColor');

/*    	Array
(
    [0] => Array
        (
            [id] => 1
            [name] => car1
            [price] => 300
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [color_id] => 1
                    [car_id] => 1
                )

        )

    [1] => Array
        (
            [id] => 3
            [name] => car3
            [price] => 100
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [color_id] => 1
                    [car_id] => 3
                )

        )

    [2] => Array
        (
            [id] => 2
            [name] => car2
            [price] => 200
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [color_id] => 1
                    [car_id] => 2
                )

        )

)*/
    }
}
