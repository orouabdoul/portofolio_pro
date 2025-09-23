<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'technologies', 'image_path', 'url', 'status', 'duration', 'created_at', 'updated_at', 'is_active', 'demo_url', 'github_url'
    ];

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
