<?php

namespace Database\Seeders\Email;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->insert([
            "id" => 1,
            "language_id" => 2,
            "template_name" => "ثبت نام کاربر",
            "subject" => "ثبت نام در سامانه",
            "from_name" => "hi@company.com",

            "email_text" => "ثبت نام شما با موفقیت انجام شد",
            "active" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table('email_templates')->insert([
            "id" => 2,
            "language_id" => 2,
            "template_name" => "فعالسازی ایمیل",
            "subject" => "فعالسازی ایمیل",
            "from_name" => "hi@company.com",

            "email_text" => "ایمیل شما با موفقیت فعال گردید",
            "active" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
