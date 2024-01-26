<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'PUBLICATION',
            'category_image_name' => 'mm_publications.png',
            'category_type' => 'book_ebook',
            'description' => 'To read and get books',
        ]);
        Category::create([
            'name' => 'COMICS',
            'category_image_name' => 'mm_comics.png',
            'category_type' => 'book_ebook',
            'description' => 'To read and get books',
        ]);
        Category::create([
            'name' => 'PRODUCTION',
            'category_image_name' => 'mm_productions.png',
            'category_type' => 'audio_video',
            'description' => 'To watch and hear',
        ]);
        Category::create([
            'name' => 'OTHERS',
            'category_image_name' => 'mm_others.png',
            'category_type' => 'book_ebook',
            'description' => 'OTHERS',
        ]);

    }
}
