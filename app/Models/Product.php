<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
        use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
        'status',
        'featured'
    ];

    protected $casts = [
        'featured' => 'boolean'
    ];

    public function category()
{
    return $this->belongsTo(\App\Models\Category::class, 'category_id');
}

public function brand()
{
    return $this->belongsTo(\App\Models\Brand::class, 'brand_id');
}

}
