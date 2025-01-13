<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqSeeder extends Seeder
{
    public function run()
    {

        //categorie
        //later meerdere voor many to many
        $category = FaqCategory::create([
            'name' => 'General Questions'
        ]);

        // entries
        $faq1 = Faq::create([
            'question' => 'When are we open?',
            'answer'   => 'We are open from 9 AM to 5 PM Monday to Friday. For more details, view all the actions on the news tab.',
            'user_id'  => 1
        ]);

        $faq2 = Faq::create([
            'question' => 'Are we open during holidays?',
            'answer'   => 'We are closed on public holidays. Check the news tab for updates.',
            'user_id'  => 1
        ]);

        $faq3 = Faq::create([
            'question' => 'Where can we see discounts?',
            'answer'   => 'Discounts and special offers are listed on the news tab. Please check there regularly for updates.',
            'user_id'  => 1
        ]);

       //voor nu alles aan zelfde catogrie via pivot attachen
        $faq1->categories()->attach($category->id);
        $faq2->categories()->attach($category->id);
        $faq3->categories()->attach($category->id);
    }
}
