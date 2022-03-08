<?php

namespace Database\Seeders\Settings;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            "id" => 1,
            "website_name" => "Glasster",
            "company_name" => "Luxiloom Studio",
            "main_domain" => "http://localhost",
            "rtl_admin" => true,
            "rtl_userpanel" => true,
            "rtl_site" => true,
            "favicon_file" => "/img/favicon/favicon.png",
            "main_logo_light" => "/img/logo/main_logo_light.svg",
            "main_logo_dark" => "/img/logo/main_logo_dark.svg",
            "footer_logo" => "/img/logo/footer_logo.svg",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
