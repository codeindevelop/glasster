<?php

namespace App\Http\Controllers\API\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailSettingsController extends Controller
{
    // Get Email Setting
    public function index()
    {
        $user = Auth::user();

        if ($user->can('modify email settings')) {
            $settings = EmailSetting::all();

            return response()->json([
                'setting' => $settings
            ], 200);
        } else {
            return response()->json([
                'message' => 'you dont have permission to view Email settings'
            ], 401);
        }
    }

    // Update Email Settings by admin
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->can('modify email settings')) {

            EmailSetting::where('id', 1)->update($request->all());

            return response()->json([
                'message' => 'Email settings has ben updated seuccessful!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'you dont have permission to update Email settings'
            ], 401);
        }
    }
}
