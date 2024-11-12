<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'image',
        'product_link' // Pastikan kolom image ada di sini
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Product model
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
