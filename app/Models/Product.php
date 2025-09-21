<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id', // clé étrangère
        'price',
        'is_active',
        'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
