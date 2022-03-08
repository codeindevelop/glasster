<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\seo\SeoSettingsController;
use App\Http\Controllers\API\Settings\AuthSettingsController;
use App\Http\Controllers\API\Settings\EmailSettingsController;
use App\Http\Controllers\API\Settings\GeneralSettingsController;
use App\Http\Controllers\API\Settings\LocalizationSettingsController;
use App\Http\Controllers\API\Settings\SmsSettingsController;
use App\Http\Controllers\API\Settings\SocialSettingsController;

/*
|--------------------------------------------------------------------------
| Authentication API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Authentication API routes for your application.
*/


Route::prefix('v1')->group(function () {


    // Get SEO Settings
    Route::get('seo-settings', [SeoSettingsController::class, 'index']);

    // Get General Settings
    Route::get('general-settings', [GeneralSettingsController::class, 'index']);

    // Get Auth Settings
    Route::get('auth-settings', [AuthSettingsController::class, 'index']);

    // Get Localization Settings
    Route::get('localization-settings', [LocalizationSettingsController::class, 'index']);


    // Get Social Settings
    Route::get('social-settings', [SocialSettingsController::class, 'index']);

    Route::middleware("auth:api")->group(function () {

        // Modify SEO Settings
        Route::put('seo-settings', [SeoSettingsController::class, 'update']);

        // Modify General Settings
        Route::put('general-settings', [GeneralSettingsController::class, 'update']);

        // Modify Auth Settings
        Route::put('auth-settings', [AuthSettingsController::class, 'update']);

        // Get User Setting page datas
        Route::get('usersetting-page-count-data', [AuthSettingsController::class, 'GetUserSettingPageCountData']);

        // Modify Social Settings
        Route::put('social-settings', [SocialSettingsController::class, 'update']);

        // Modify Localization Settings
        Route::put('localization-settings', [LocalizationSettingsController::class, 'update']);

        // Modify SMS Settings
        Route::put('sms-settings', [SmsSettingsController::class, 'update']);

        // Get SMS Settings for Admins
        Route::get('sms-settings', [SmsSettingsController::class, 'index']);

        // Modify Email Settings
        Route::put('email-settings', [EmailSettingsController::class, 'update']);

        // Get Email Settings for Admins
        Route::get('email-settings', [EmailSettingsController::class, 'index']);
    });
});
