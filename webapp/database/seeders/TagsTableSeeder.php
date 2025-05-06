<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::insert([
            ['category_id' => 1, 'name' => 'スプラトゥーン', 'slug' => 'splatoon', 'description' => '', 'color' => '#f1c40f'],
            ['category_id' => 1, 'name' => 'スマブラ', 'slug' => 'smash', 'description' => '', 'color' => '#e67e22'],
            ['category_id' => 2, 'name' => '三月のパンタシア', 'slug' => '3phantasia', 'description' => '', 'color' => '#9b59b6'],
        ]);
    }
}
