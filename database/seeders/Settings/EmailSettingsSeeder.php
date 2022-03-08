<?php

namespace Database\Seeders\Settings;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_settings')->insert([
            'id' => 1,
            'email_protocol' => "SMTP",
            'email_encryption' => "SSL",
            'smtp_host' => "",
            'smtp_port' => "",
            'email' => "",
            'smtp_username' => "",
            'smtp_password' => "",
            'email_charset' => "UTF-8",
            'email_signature' => "Thanks Glasster system",
            'email_logo' => "/system/assets/img/email_logo.png",
            'email_header' => "",
            'email_footer' => "created with Love",
            'show_instagram' => true,
            'show_twitter' => true,
            'show_facebook' => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
