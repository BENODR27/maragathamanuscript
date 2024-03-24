<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Segment;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //PUBLICATION
        Segment::create([
            'name' => 'TO BUY',
            'category_id' => '1',
        ]);
        Segment::create([
            'name' => 'READERS CHOICE',
            'category_id' => '1',
        ]);
        Segment::create([
            'name' => 'E-BOOKS',
            'category_id' => '1',
        ]);
        Segment::create([
            'name' => 'SUBJECTS',
            'category_id' => '1',
        ]);

        //COMICS
        Segment::create([
            'name' => 'TO BUY',
            'category_id' => '2',
        ]);
        Segment::create([
            'name' => 'READERS CHOICE',
            'category_id' => '2',
        ]);
        Segment::create([
            'name' => 'E-BOOKS',
            'category_id' => '2',
        ]);
        Segment::create([
            'name' => 'SUBJECTS',
            'category_id' => '2',
        ]);
        //PRODUCTION
        Segment::create([
            'name' => 'DEFAULT',
            'category_id' => '3',
        ]);
        //OTHERS
        Segment::create([
            'name' => 'TO BUY',
            'category_id' => '4',
        ]);
        Segment::create([
            'name' => 'READERS CHOICE',
            'category_id' => '4',
        ]);
        Segment::create([
            'name' => 'E-BOOKS',
            'category_id' => '4',
        ]);
        Segment::create([
            'name' => 'SUBJECTS',
            'category_id' => '4',
        ]);

    }
}
