<?php

namespace App\Http\Controllers\API\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\AuthSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = AuthSetting::all();

        return response()->json([
            'setting' => $settings
        ], 200);
    }

    public function GetUserSettingPageCountData()
    {
        $user = Auth::user();

        if ($user->can('view users')) {

            $userTable = User::all();
            $roleTable = Role::all()->pluck('name');
            $permissionTable = Permission::all()->pluck('name');

            return response()->json([
                // 'users' => $userTable,
                // 'roles' => $roleTable,
                // 'permissions' => $permissionTable,
                'usersCount' => $userTable->count(),
                'rolesCount' => $roleTable->count(),
                'permissionCount' => $permissionTable->count(),
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->can('modify auth settings')) {

            AuthSetting::where('id', 1)->update($request->all());



            return response()->json([
                'message' => 'Auth settings has ben updated seuccessful!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'you dont have permission to update Auth settings'
            ], 401);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
