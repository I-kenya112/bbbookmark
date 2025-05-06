<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Link;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Link::insert([
            [
                'user_id' => 1,
                'url' => 'https://www.nintendo.co.jp/switch/aab6a/index.html',
                'title' => 'スプラトゥーン公式',
                'description' => 'スプラの公式サイトです。',
                'is_public' => true,
                'likes_count' => 12,
            ],
            [
                'user_id' => 1,
                'url' => 'https://www.lisani.jp/',
                'title' => 'リスアニ！',
                'description' => '音楽情報メディア',
                'is_public' => true,
                'likes_count' => 7,
            ],
        ]);
    }
}
