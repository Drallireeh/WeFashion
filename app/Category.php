<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'gender'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public $timestamps = false;
}
