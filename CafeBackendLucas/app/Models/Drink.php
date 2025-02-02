<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
