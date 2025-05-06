<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'ゲーム', 'slug' => 'games', 'description' => 'ゲームに関するリンク', 'color' => '#1abc9c', 'created_by' => 0],
            ['name' => '音楽', 'slug' => 'music', 'description' => '音楽関連のリンク', 'color' => '#3498db', 'created_by' => 0],
        ]);
    }
}
