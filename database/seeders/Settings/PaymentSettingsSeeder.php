<?php

namespace Database\Seeders\Settings;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_settings')->insert([
            'id' => 1,
            'gateway_name' => 'زرین پال',
            'gatevay_merchant_id' => '',
            'request_url' => 'https://api.zarinpal.com/pg/v4/payment/request.json',
            'currency' => 'IRT',
            'active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
