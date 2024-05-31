<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
