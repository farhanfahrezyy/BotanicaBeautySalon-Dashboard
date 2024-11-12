<?php

// App/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Menggunakan tabel 'category'
    protected $table = 'category';
    protected $fillable = ['category'];
    

    // Relasi ke model Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
