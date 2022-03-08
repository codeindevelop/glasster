<?php

namespace Database\Seeders\Settings;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalizationSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localization_settings')->insert([
            'country_id' => 101,
            'language_id' => 2,
            'timezone_id' => 295,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
