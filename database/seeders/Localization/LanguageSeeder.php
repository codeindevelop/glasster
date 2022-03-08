<?php

namespace Database\Seeders\Localization;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            "id" => 1,
            "name" => "English",
            "active" => true,
            "iso_coe" => "EN",
            "language_code" => "EN-US",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 2,
            "name" => "Persian",
            "active" => false,
            "iso_coe" => "FA",
            "language_code" => "FA-IR",
            "date_format_lite" => "Y/m/d",
            "date_format_full" => "Y/m/d H:m:s",
            "is_rtl" => true,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 3,
            "name" => "French",
            "active" => false,
            "iso_coe" => "FR",
            "language_code" => "FR-FA",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 4,
            "name" => "Russian",
            "active" => false,
            "iso_coe" => "RU",
            "language_code" => "RU-RU",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 5,
            "name" => "Chinese",
            "active" => false,
            "iso_coe" => "CH",
            "language_code" => "CH-CH",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 6,
            "name" => "German",
            "active" => false,
            "iso_coe" => "GR",
            "language_code" => "GE-GR",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 7,
            "name" => "Arabic",
            "active" => false,
            "iso_coe" => "AR",
            "language_code" => "AR-AR",
            "date_format_lite" => "Y/m/d",
            "date_format_full" => "Y/m/d H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 8,
            "name" => "Turkey",
            "active" => false,
            "iso_coe" => "TR",
            "language_code" => "TR",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
        DB::table('languages')->insert([
            "id" => 9,
            "name" => "China",
            "active" => false,
            "iso_coe" => "CH",
            "language_code" => "CH",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
        DB::table('languages')->insert([
            "id" => 10,
            "name" => "Spain",
            "active" => false,
            "iso_coe" => "SP",
            "language_code" => "SP",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
        DB::table('languages')->insert([
            "id" => 11,
            "name" => "Japan",
            "active" => false,
            "iso_coe" => "JP",
            "language_code" => "JP",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
        DB::table('languages')->insert([
            "id" => 12,
            "name" => "India",
            "active" => false,
            "iso_coe" => "IN",
            "language_code" => "IN",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
        DB::table('languages')->insert([
            "id" => 13,
            "name" => "Netherland",
            "active" => false,
            "iso_coe" => "NT",
            "language_code" => "NT",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
        DB::table('languages')->insert([
            "id" => 14,
            "name" => "Afghanistan",
            "active" => false,
            "iso_coe" => "AF",
            "language_code" => "AF",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
        DB::table('languages')->insert([
            "id" => 15,
            "name" => "Malaysia",
            "active" => false,
            "iso_coe" => "MA",
            "language_code" => "MA",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);

        DB::table('languages')->insert([
            "id" => 16,
            "name" => "Egypt",
            "active" => false,
            "iso_coe" => "EG",
            "language_code" => "EG",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
        DB::table('languages')->insert([
            "id" => 17,
            "name" => "Italia",
            "active" => false,
            "iso_coe" => "IT",
            "language_code" => "IT",
            "date_format_lite" => "m/d/Y",
            "date_format_full" => "m/d/Y H:m:s",
            "is_rtl" => false,
            "created_at" => Carbon::now()
        ]);
       
    }
}
