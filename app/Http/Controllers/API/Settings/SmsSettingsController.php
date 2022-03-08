<?php

namespace App\Http\Controllers\API\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\SmsSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmsSettingsController extends Controller
{
    // Get SMS Setting
    public function index()
    {
        $user = Auth::user();

        if ($user->can('modify sms settings')) {
            $settings = SmsSetting::all();

            return response()->json([
                'setting' => $settings
            ], 200);
        } else {
            return response()->json([
                'message' => 'you dont have permission to view sms settings'
            ], 401);
        }
    }

    // Update SMS Settings by admin
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->can('modify sms settings')) {

            SmsSetting::where('id', 1)->update($request->all());

            return response()->json([
                'message' => 'sms settings has ben updated seuccessful!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'you dont have permission to update sms settings'
            ], 401);
        }
    }
}
