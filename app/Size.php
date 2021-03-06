<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function products() {
        return $this->hasMany(Product::class);
    }

    public $timestamps = false;
}
