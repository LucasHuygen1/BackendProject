<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //admin heeft ID 1 anders aanpassen
        $newsItems = [
            [
                'title' => 'Happy Hour: 50% Off All Drinks!',
                'image' => 'news/happy_hour.jpg',
                'content' => 'Join us every Friday from 5 PM to 7 PM for Happy Hour! Enjoy 50% off all drinks.',
                'published_at' => Carbon::now(),
                'user_id' => 1, 
            ],
            [
                'title' => '1+1 Jupiler Action!',
                'image' => 'news/jupiler_action.jpg',
                'content' => 'For a limited time only: Buy one Jupiler and get one free! Don’t miss out on this special offer.',
                'published_at' => Carbon::now()->subDay(),
                'user_id' => 1,
            ],
            [
                'title' => 'New Summer Cocktails Are Here!',
                'image' => 'news/summer_cocktails.jpg',
                'content' => 'We’re excited to introduce our new range of summer cocktails. Try them out and let us know your favorite!',
                'published_at' => Carbon::now()->subDays(2),
                'user_id' => 1,
            ],
        ];

        foreach ($newsItems as $newsItem) {
            News::create($newsItem);
        }
    }
}
