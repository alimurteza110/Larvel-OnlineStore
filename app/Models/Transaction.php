<?php

namespace App\Models;

use App\Enums\TransactionStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => TransactionStatusEnum::class
    ];

    public function carts()
    {
        return  $this->hasMany(Cart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
