<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'user_id'
    ];

    /**
     * Define the many-to-many relationship with FAQ Categories.
     */
    public function categories()
    {
        return $this->belongsToMany(
            FaqCategory::class,
            'faq_faq_category', // pivot
            'faq_id',          
            'faq_category_id'   
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
