<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
          protected $fillable = [
        'name',
        'slug',
        'icon',
        'is_active',
        'description',
        'parent_id',
        'color',
        'display_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
