<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\LinkTag;

class LinkTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('link_tag')->insert([
            ['link_id' => 1, 'tag_id' => 1],
            ['link_id' => 1, 'tag_id' => 2],
            ['link_id' => 2, 'tag_id' => 3],
        ]);
    }
}
