<?php

namespace App\Http\Controllers\API\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\LocalizationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalizationSettingsController extends Controller
{
    // Get Localization Setting
    public function index()
    {
        $settings = LocalizationSetting::all();

        return response()->json([
            'setting' => $settings
        ], 200);
    }

    // Update Localization Settings by admin
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->can('modify localization settings')) {

            LocalizationSetting::where('id', 1)->update($request->all());

           

            return response()->json([
                'message' => 'Localization settings has ben updated seuccessful!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'you dont have permission to update Localization settings'
            ], 401);
        }
    }

}
