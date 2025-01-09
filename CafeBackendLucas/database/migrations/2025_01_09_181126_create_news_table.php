<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//tabel waar we nieuwtjes gaan plaatsen. zoals acties (happy hours ofzo)
//later kunnen we users hier nog een reactie op laten plaatsen voorlopig nog niet.
class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable(); // verwijst naar het pad waar de foto is.
            $table->text('content');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
