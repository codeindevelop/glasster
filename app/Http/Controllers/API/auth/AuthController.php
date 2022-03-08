<?php

namespace App\Http\Controllers\API\auth;

use App\Http\Controllers\Controller;
use App\Jobs\Auth\ProcessUserRegister;
use App\Jobs\User\ProcessUserActive;
use App\Jobs\User\ProcessUserLogin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
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



    // Login to system function
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
            '2fa_code' => 'sometimes|numeric'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email not verified'], 401);
        }


        $tokenResult = $user->createToken('Login Token');
        $token = $tokenResult->token;
        $userIp = $request->getClientIp();

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        } else {
            $token->expires_at = Carbon::now()->addSeconds(config("auth.password_timeout"));
        }
        $token->save();

        ProcessUserLogin::dispatchAfterResponse($user, $userIp);


        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user' => $user,
            'role' => $user->getRoleNames()
        ]);
    }

    // get user profile
    public function profile(): JsonResponse
    {
        $user = Auth::user();
        $role = $user->getRoleNames();
        $personalInfo = $user->personalInfos()->get();

        return response()->json([
            'user' => $user,
            'personalInfo' => $personalInfo,
            'role' => $role,
        ]);
    }


    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return JsonResponse [string] message
     */
    public function logout(Request $request): JsonResponse
    {
        $user = Auth::user();

        $nowTime = Verta(Carbon::now())->format('H:i');
        $nowDate = Verta(Carbon::now())->format('j-m-Y');

        $request->user()->token()->revoke();

        activity()
            ->withProperties(['ip' => $request->ip()])
            ->log('logout from system');


        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }



    // Create user by admin
    public function createUser(Request $request)
    {

        $user = Auth::user();
        if ($user->can('create user')) {

            $validate = Validator::make($request->all(), [

                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'mobile_number' => ['required', 'string', 'unique:users'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed'],
            ]);
            if ($validate->fails()) {
                return response()->json(['message' => $validate->errors()->first(), 'status' => false], 500);
            }

            $newuser = new User([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'activation_token' => '',
                'active' => true,

            ]);

            if ($user->can('create user')) {
                $newuser->email_verified_at = Carbon::now();
                $newuser->save();

                $newuser->assignRole('user');

                return response()->json(['message' => 'User has ben Created succsessful!']);
            }
            // If admin dos not permission to create usre
        } else {
            return response()->json([
                'message' => 'You don have permission to Create User'
            ], 500);
        }
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $targetUser = User::findOrFail($id);


        if ($user->can('deactivate user')) {

            $targetUser->update([
                'first_name' => $request->has('first_name') ? $request->first_name : $targetUser->first_name,
                'last_name' => $request->has('last_name') ? $request->last_name : $targetUser->last_name,
                'email' => $request->has('email') ? $request->email : $targetUser->email,
                'mobile_number' => $request->has('mobile_number') ? $request->mobile_number : $targetUser->mobile_number,
                'active' => $request->active,
                'password' => $request->password !=  ""  ? bcrypt($request->password) : $targetUser->password
            ]);

            return response()->json([
                'message' => 'User has ben Updated!',
                'updated_user' => $targetUser
            ], 202);
        } else {
            return response()->json([
                'message' => 'you dont have permission',

            ], 500);
        }
    }


    // Get All !not trashed users List
    public function getAllUsers(): JsonResponse
    {
        $user = Auth::user();

        $users = User::all();

        if ($user->can('view users')) {

            $users = User::with('roles')->get();
            $usersCount = $users->count();


            return response()->json([
                'users' => $users,
                'usersCounts' => $usersCount,

            ], 200);
        } else {
            return response()->json([
                'message' => 'You don have permission to see all Users'
            ], 500);
        }
    }

    // Get User By Id
    public function getUserById($id): JsonResponse
    {
        $user = Auth::user();

        $targetUser = User::where('id', $id)->get();
        if ($user->can('view users')) {

            return response()->json([
                'user' => $targetUser
            ], 200);
        } else {
            return response()->json([
                'message' => 'You don have permission'
            ], 500);
        }
    }
    // Get All trashed users List
    public function getTrashedUsers(): JsonResponse
    {
        $user = Auth::user();

        // Check Deleted Users
        $users = User::onlyTrashed()->get();

        if ($user->can('view users')) {

            $trashedUsersCount = $users->count();

            return response()->json([
                'users' => $users,
                'trashedUsersCount' => $trashedUsersCount,
            ], 200);
        } else {
            return response()->json([
                'message' => 'You don have permission to see Trashed Users'
            ], 500);
        }
    }
    // restore trashed user by ID
    public function restoreTrashedUsers($id): JsonResponse
    {
        $user = Auth::user();

        // Check Deleted User
        $targetUser = User::withTrashed()->find($id);

        if ($user->can('active user')) {

            $targetUser->restore();

            return response()->json([
                'message' => 'user has ben restored successful'
            ], 200);
        } else {
            return response()->json([
                'message' => 'You dont have permission'
            ], 500);
        }
    }

    // Delete User By Id
    public function destroy($id): JsonResponse
    {
        $user = Auth::user();

        if ($user->can('delete user')) {
            $targeted = User::findOrFail($id);
            $targeted->delete();

            return response()->json(['message' => 'User has ben Deleted!'], 200);
        } else {
            return response()->json([
                'message' => 'You don have permission to Delete User'
            ], 500);
        }
    }
}
