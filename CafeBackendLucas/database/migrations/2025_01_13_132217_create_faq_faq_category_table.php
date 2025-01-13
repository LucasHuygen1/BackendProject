<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqFaqCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('faq_faq_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_id');
            $table->unsignedBigInteger('faq_category_id');
            $table->timestamps();

            // FK
            $table->foreign('faq_id')
                  ->references('id')->on('faqs')
                  ->onDelete('cascade');
            $table->foreign('faq_category_id')
                  ->references('id')->on('faq_categories')
                  ->onDelete('cascade');

            // unique alleen
            $table->unique(['faq_id', 'faq_category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_faq_category');
    }
}
