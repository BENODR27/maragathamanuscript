<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('title');
            $table->integer('genre_id');
            $table->integer('user_id');
            $table->string('language');
            $table->string('file_name');
            $table->string('poster_image_name');
            $table->string('product_type');
            $table->string('product_id')->nullable(); //published product id
            $table->boolean('published')->default(false);
            $table->boolean('terms')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
