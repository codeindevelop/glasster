<?php

namespace Database\Seeders\Settings;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_settings')->insert([

            'id' => 1,
            'instagram' => "",
            'telegram' => "",
            'whatsapp' => "",
            'whatsapp_business' => "",
            'facebook_user' => "",
            'facebook_page' => "",
            'twitter' => "",
            'skype' => "",
            'youtube' => "",
            'aparat' => "",
            'tiktok' => "",
            'pintrest' => "",
            'linkdin' => "",
            'dribbble' => "",
            'snapchat' => "",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
