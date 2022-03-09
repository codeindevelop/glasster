<?php

namespace App\Http\Controllers\API\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    // Loockup and check exist account
    public function accountLookup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err' => $validator->errors()->first()
            ], 400);
        } else {

            $targetUser =  User::where('email', $request->email)->first();

            if ($targetUser === null) {
                return response()->json([
                    'message' => "couldn't find user account"
                ], 404);
            } else {
                return response()->json([
                    'message' => "user has exist"
                ], 200);
            }
        }
    }
}
