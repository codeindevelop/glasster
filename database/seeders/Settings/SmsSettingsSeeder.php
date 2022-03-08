<?php

namespace Database\Seeders\Settings;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_settings')->insert([
            'id' => 1,
            'sms_gateway_name' => "فراز اس ام اس",
            'gateway_send_url' => "http://rest.ippanel.com/v1/messages/patterns/send",
            'gateway_api_key' => "",
            'gateway_send_number' => "+983000505",
            'gateway_receive_number' => "",
            'active' => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table('sms_settings')->insert([
            'id' => 2,
            'sms_gateway_name' => "ملی پیامک",
            'gateway_send_url' => "",
            'gateway_api_key' => "",
            'gateway_send_number' => "",
            'gateway_receive_number' => "",
            'active' => false,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table('sms_settings')->insert([
            'id' => 3,
            'sms_gateway_name' => "کاوه نگار",
            'gateway_send_url' => "",
            'gateway_api_key' => "",
            'gateway_send_number' => "",
            'gateway_receive_number' => "",
            'active' => false,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
