<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $fillable = ['name'];

    /**
     * Define the many-to-many relationship with FAQs.
     */
    public function faqs()
    {
        return $this->belongsToMany(
            Faq::class,
            'faq_faq_category', // pivot
            'faq_category_id', 
            'faq_id'     
        );
    }
}
