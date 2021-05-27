<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'price', 'reference', 'published_state', 'discount', 'size', 
    ];

    // ici le setter va récupérer la value à insérer en BDD
    // nous pourrons alors vérifier sa valeur avant que le modèle n'insère la donnée en BDD
    public function setCategoryIdAttribute($value) {
        if ($value == 0) {
            $this->attributes['category_id'] = null;
        } else {
            $this->attributes['category_id'] = $value;
        }
    }

    public function setDiscountAttribute($value) {
        if ($value == "1") {
            $this->attributes['discount'] = true;
        } else {
            $this->attributes['discount'] = false;
        }
    }

    public function setPublishedStateAttribute($value) {
        if ($value == "1") {
            $this->attributes['published_state'] = true;
        } else {
            $this->attributes['published_state'] = false;
        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function picture() {
        return $this->hasOne(Picture::class);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class);
    }

    public function scopeDiscount($query) {
        return $query->where('discount', true);
    }

    public $timestamps = false;
}
