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
        'discount_price',
        'stock',
        'category',
        'image',
        'gallery',
        'status',
        'featured'
    ];

    protected $casts = [
        'gallery' => 'array',
        'featured' => 'boolean'
    ];

}
