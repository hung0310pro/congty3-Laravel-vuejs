<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
