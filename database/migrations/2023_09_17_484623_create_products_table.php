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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('product_type')->nullable();
            $table->string('poster_image_name');
            $table->string('e_book_file_name')->nullable();//for ebook saved file name
            $table->integer('user_id');//writer
            $table->integer('segment_id');
            $table->integer('genre_id');
            $table->integer('department_id')->nullable();
            $table->integer('submission_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('rating_average')->default(0);
            $table->longText('one_line_concept')->nullable();
            // $table->longText('preview')->nullable();
            $table->integer('category_id');
            $table->boolean('is_active')->default(true);
            $table->integer('viewers')->default(0);
            $table->integer('price')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->string('language')->nullable();
            $table->string('director')->nullable();
            $table->string('music')->nullable();
            $table->string('audio_video_url')->nullable();
            $table->string('author')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
