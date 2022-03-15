<?php

use App\Http\Controllers\API\custom\CustomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Get Some Data for pages like Dashboard page and etc...
Route::prefix('v1')->group(function () {


    Route::middleware("auth:api")->group(function () {

        // Get Dashboard Data
        Route::get('dashboard-data', [CustomController::class, 'dashboardData']);
    });
});
