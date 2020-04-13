<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
