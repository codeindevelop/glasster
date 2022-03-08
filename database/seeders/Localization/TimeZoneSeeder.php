<?php

namespace Database\Seeders\Localization;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/timezones.json'), true);




        foreach ($data as $tzs) {
            foreach ($tzs as $offset => $timezones) {
                foreach ($timezones as $timezone) {

                    DB::table('time_zones')->insert(array(

                        'label' => $timezone['label'],
                        'value' => $timezone['value'],
                        'offset' => $offset,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ));
                }
            }
        }
    }
}
