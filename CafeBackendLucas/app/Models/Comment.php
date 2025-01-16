<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'drink_id',
        'user_id',
    ];

    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
