<?php

namespace Database\Seeders\Blog;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_publish_statuses')->insert([
            "id" => 1,
            "mode" => 'published',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table('post_publish_statuses')->insert([
            "id" => 2,
            "mode" => 'draft',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        DB::table('post_publish_statuses')->insert([
            "id" => 3,
            "mode" => 'archive',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
