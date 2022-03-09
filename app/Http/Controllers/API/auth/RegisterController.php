<?php

namespace App\Http\Controllers\API\auth;

use App\Http\Controllers\Controller;
use App\Jobs\Auth\ProcessUserRegister;
use App\Jobs\User\ProcessUserActive;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    // Register User in system
    public function register(Request $request): JsonResponse
    {
        // check can register users from auth settings - if can not !
        if (DB::table('auth_settings')->where('id', 1)->value('can_register') != 1) {
            return response()->json(['message' => 'Register Has ben disabled by admin.'], 200);

            // If users can be register
        } else {

            // Check auth setting for register type - full
            if (DB::table('auth_settings')->where('id', 1)->value('register_type') == 'full') {

                // Validate Requested fields
                $validate = Validator::make($request->all(), [

                    'first_name' => ['required', 'string'],
                    'last_name' => ['required', 'string'],
                    'mobile_number' => ['required', 'string', 'unique:users'],
                    'email' => ['required', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed'],
                ]);

                // Create user with Requests
                $user = new User([

                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'mobile_number' => $request->mobile_number,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'activation_token' => Str::random(60),
                    'mobile_token' => "",
                    'register_ip' => $request->ip()
                ]);


                // Check auth setting for register type - Email
            } elseif (DB::table('auth_settings')->where('id', 1)->value('register_type') == 'email') {

                // Validate Requested fields
                $validate = Validator::make($request->all(), [

                    'email' => ['required', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', 'min:8'],
                ]);

                // Create user with Requests
                $user = new User([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'activation_token' => Str::random(60),
                    'register_ip' => $request->ip()
                ]);

                // Check auth setting for register type - Mobile
            }

            // Check Validator Error
            if ($validate->fails()) {
                return response()->json(['message' => $validate->errors()->first(), 'status' => false], 500);

                // If Validator Has No Error
            } else {

                // Save User Data
                $user->save();


                // Dispatch User Process job for create some tables for user
                ProcessUserRegister::dispatchAfterResponse($user);

                // set log for user
                activity()
                    ->withProperties(['user_id' => $user->id, 'ip' => $request->getClientIp()])
                    ->log('Signup user');

                // Assign Registered User Role
                $user->assignRole('user');


                return response()->json(['message' => 'User has ben registered successful'], 201);
            }
        }
    }


    // Active user after click on email activation
    public function signupActive($token, Request $request): JsonResponse
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->email_verified_at = Carbon::now();
        $user->activation_token = '';
        $user->save();

        $ip = $request->ip();

        // Dispatch Process User Active Job
        ProcessUserActive::dispatchSync($user, $ip);

        return response()->json(['message' => 'User has ben activate!'], 200);
    }
}
