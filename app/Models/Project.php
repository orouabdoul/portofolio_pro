<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'category_id', 'technologies', 'image_path', 'url', 'status', 'duration', 'is_active', 'demo_url', 'github_url'
    ];

    /**
     * Casts
     * - is_active as boolean
     * - created_at/updated_at as datetimes (Eloquent handles these automatically)
     */
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relation vers la table categories (utilise category_id)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Accessor: get technologies as array
     */
    public function getTechnologiesAttribute($value)
    {
        if (is_array($value)) return $value;
        return $value ? explode(',', $value) : [];
    }

    /**
     * Mutator: set technologies from array to CSV
     */
    public function setTechnologiesAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['technologies'] = implode(',', $value);
        } else {
            $this->attributes['technologies'] = $value;
        }
    }

    /**
     * Accessor: full publicly-accessible image URL or placeholder
     */
    public function getImageUrlAttribute()
    {
        if (!empty($this->image_path)) {
            $full = public_path('storage/' . $this->image_path);
            if (file_exists($full)) {
                return asset('storage/' . $this->image_path);
            }
        }
        return 'https://via.placeholder.com/368x242/6366f1/a78bfa?text=Projet';
    }
}
