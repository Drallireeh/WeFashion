<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function products() {
        return $this->belongsTo(Product::class);
    }
}
