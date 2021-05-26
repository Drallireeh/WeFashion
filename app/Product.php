<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'price', 'reference'
    ];

    // ici le setter va récupérer la value à insérer en BDD
    // nous pourrons alors vérifier sa valeur avant que le modèle n'insère la donnée en BDD
    public function setGenreIdAttribute($value) {
        if ($value == 0) {
            $this->attributes['category_id'] = null;
        } else {
            $this->attributes['category_id'] = $value;
        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function picture() {
        return $this->hasOne(Picture::class);
    }

    public function scopeDiscount($query) {
        return $query->where('discount', true);
    }

    public $timestamps = false;
}
