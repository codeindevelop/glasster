<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\auth\AuthController;
use App\Http\Controllers\API\auth\OtpAuthController;
use App\Http\Controllers\API\auth\PasswordResetController;
use App\Http\Controllers\API\Auth\PermissionController;
use App\Http\Controllers\API\Auth\RoleController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Authentication API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Authentication API routes for your application.
*/


Route::prefix('v1')->group(function () {


    if (DB::table('auth_settings')->where('id', 1)->value('register_type') == 'otp-mobile') {
        // Public APIS
        Route::post('check-user-register', [OtpAuthController::class, 'checkUserRegister']);
        Route::post('otp', [OtpAuthController::class, 'OTP']);
        Route::post('verify-otp', [OtpAuthController::class, 'verifyOTP']);
    }


    Route::post('register', [AuthController::class, 'register']);
    Route::get('register/activation/{token}', [AuthController::class, 'signupActive']);

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');


    Route::middleware("auth:api")->group(function () {




        Route::post('get-verification-sms', [AuthController::class, 'getMobileCode']);
        Route::post('verification-sms', [AuthController::class, 'storeMobileVerification']);
        Route::post('change-mobile-number', [AuthController::class, 'changeMobileNumber']);




        // Get User Profile
        Route::get('profile', [AuthController::class, 'profile']);

        // Upload User document
        Route::post('verification-account', [PersonalUserInfoController::class, 'storeVerificationByUser']);

        // Users API Route
        Route::post('create-user', [AuthController::class, 'createUser']);
        Route::get('users', [AuthController::class, 'getAllUsers']);
        Route::get('trashed-users', [AuthController::class, 'getTrashedUsers']);
        Route::put('trashed-user/{id}', [AuthController::class, 'restoreTrashedUsers']);
        Route::get('getuser/{id}', [AuthController::class, 'getUserById']);
        Route::delete('user/{id}', [AuthController::class, 'destroy']);
        // important this api updated user by admin
        Route::put('update-user/{id}', [AuthController::class, 'update']);
        // important this api updated profile by ownuser
        Route::post('update-profile', [AuthController::class, 'UpdateProfile']);
        Route::get('users', [AuthController::class, 'getAllUsers']);
        Route::get('profile', [AuthController::class, 'profile']);


        // Roles Routes API
        Route::get('roles', [RoleController::class, 'index']);
        Route::post('role', [RoleController::class, 'store']);
        Route::get('role-permission/{id}', [RoleController::class, 'getRolesPermissionsById']);
        Route::delete('role/{id}', [RoleController::class, 'destroy']);
        Route::put('user-role/{id}',  [RoleController::class, 'changeUserRole']);
        Route::post('role-giv-permission', [RoleController::class, 'roleGivPermission']);
        Route::post('role-revoke-permission', [RoleController::class, 'roleRevokePermission']);
        Route::get('user-roles', [RoleController::class, 'getUsersByRoles']);
        Route::post('role-to-user', [RoleController::class, 'assignRoleToUser']);
        Route::post('role-remove-user', [RoleController::class, 'removeRoleToUser']);
        Route::get('role-permissions', [RoleController::class, 'getRolesPermission']);

        // Permissions Routes API
        Route::get('permissions', [PermissionController::class, 'index']);
        Route::post('permission', [PermissionController::class, 'store']);
        Route::delete('permission/{id}', [PermissionController::class, 'destroy']);
        Route::get('user-permissions', [PermissionController::class, 'getUsersByPermission']);
        Route::get('get-user-permission/{id}', [PermissionController::class, 'getUserPermissionById']);
    });


    //     Forgot password route group
    Route::group([
        'middleware' => 'api',
        'prefix' => 'password'
    ], function () {
        Route::post('create', [PasswordResetController::class, 'create']);
        Route::get('find/{token}', [PasswordResetController::class, 'find']);
        Route::post('reset', [PasswordResetController::class, 'reset']);
    });
});
