<?php

namespace Database\Seeders\Settings;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auth_settings')->insert([
            'id' => 1,
            'register_type' => "full",
            'email_verification' => true,
            'otp_login' => "disable",
            'can_register' => true,
            'facebook_login' => true,
            'google_login' => true,
            'twitter_login' => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
