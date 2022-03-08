<?php

namespace Database\Seeders;

use Database\Seeders\Auth\PermissionsSeeder;
use Database\Seeders\Blog\PostsCategorySeeder;
use Database\Seeders\Blog\PostStatusSeeder;
use Database\Seeders\Email\AuthEmailSeeder;
use Database\Seeders\Localization\CountrySeeder;
use Database\Seeders\Localization\LanguageSeeder;
use Database\Seeders\Localization\TimeZoneSeeder;
use Database\Seeders\Settings\AuthSettingsSeeder;
use Database\Seeders\Settings\EmailSettingsSeeder;
use Database\Seeders\Settings\GeneralSettingsSeeder;
use Database\Seeders\Settings\LocalizationSettingsSeeder;
use Database\Seeders\Settings\PaymentSettingsSeeder;
use Database\Seeders\Settings\SeoSettingsSeeder;
use Database\Seeders\Settings\SmsSettingsSeeder;
use Database\Seeders\Settings\SocialSettingsSeeder;
use Database\Seeders\States\US;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Seed Languages
        $this->call(LanguageSeeder::class);

        // Seed Countries
        $this->call(CountrySeeder::class);

        // Seed USA States
        $this->call(US::class);

        // Timezone Seeder
        $this->call(TimeZoneSeeder::class);

        // General Settings Seeder
        $this->call(GeneralSettingsSeeder::class);

        // Localization Settings Seeder
        $this->call(LocalizationSettingsSeeder::class);

        // Auth Settings Seeder
        $this->call(AuthSettingsSeeder::class);

        // SEO Settings Seeder
        $this->call(SeoSettingsSeeder::class);

        // Payment Settings Seeder
        $this->call(PaymentSettingsSeeder::class);

        // Social Settings Seeder
        $this->call(SocialSettingsSeeder::class);

        // SMS Settings Seeder
        $this->call(SmsSettingsSeeder::class);

        // Email Settings Seeder
        $this->call(EmailSettingsSeeder::class);

        // Roles , Permissions and default admin seeder
        $this->call(PermissionsSeeder::class);

        
        // Auth Email Templates Seeder
        $this->call(AuthEmailSeeder::class);

        // Post Default Category Seeder
        $this->call(PostsCategorySeeder::class);

        // Post Publish status Seeder
        $this->call(PostStatusSeeder::class);
    }
}
