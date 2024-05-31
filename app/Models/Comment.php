<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }
}
