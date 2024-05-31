<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'image_url',
        'likes',
        'count',
        'category_id',
    ];

    protected function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
