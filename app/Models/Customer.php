<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'status',
        'order_count',
        'total_spending',
        'join_date'
    ];

    protected $casts = [
        'join_date' => 'date',
        'total_spending' => 'decimal:2'
    ];

    protected $attributes = [
    'join_date' => null, // atau now()->format('Y-m-d')
];

protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        if (empty($model->join_date)) {
            $model->join_date = now()->format('Y-m-d');
        }
    });
}
}
