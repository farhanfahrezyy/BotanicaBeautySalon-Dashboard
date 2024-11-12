<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'service_link',
    ];

    // Example relationship if services belong to categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
