<?php

namespace Database\Seeders\Auth;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Create Some Default Permissions

        // Post permissions
        Permission::create(['guard_name' => 'api', 'name' => 'create post']);
        Permission::create(['guard_name' => 'api', 'name' => 'view post']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit post']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete post']);


        // Users Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create user']);
        Permission::create(['guard_name' => 'api', 'name' => 'view user']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit user']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete user']);



        Permission::create(['guard_name' => 'api', 'name' => 'access to panel']);

        // Email Templates Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create email templates']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit email templates']);
        Permission::create(['guard_name' => 'api', 'name' => 'view email templates']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete email templates']);


        // Settings
        Permission::create(['guard_name' => 'api', 'name' => 'modify general settings']);
        Permission::create(['guard_name' => 'api', 'name' => 'modify seo settings']);
        Permission::create(['guard_name' => 'api', 'name' => 'modify auth settings']);
        Permission::create(['guard_name' => 'api', 'name' => 'modify social settings']);
        Permission::create(['guard_name' => 'api', 'name' => 'modify localization settings']);
        Permission::create(['guard_name' => 'api', 'name' => 'modify sms settings']);
        Permission::create(['guard_name' => 'api', 'name' => 'modify email settings']);


        // Create Supper Admin Role
        $superadminrole = Role::create(['guard_name' => 'api', 'name' => 'super-admin']);

        // Admin Role
        $roleAdmin = Role::create(['guard_name' => 'api', 'name' => 'admin']);
        // you can assign any default permission to admin role
        // $roleAdmin->givePermissionTo('access to panel');


        // Create Writer Role and assign permission to modify posts
        $roleWriter = Role::create(['guard_name' => 'api', 'name' => 'writer']);
        $roleWriter->givePermissionTo('access to panel');
        $roleWriter->givePermissionTo('create post');
        $roleWriter->givePermissionTo('view post');
        $roleWriter->givePermissionTo('edit post');
        $roleWriter->givePermissionTo('delete post');


        // Create User Registred Role and assign ' access to panel' permission
        $userrole = Role::create(['guard_name' => 'api', 'name' => 'user']);
        $userrole->givePermissionTo('access to panel');




        //create super admin
        $superAdmin = \App\Models\User::factory()->create([

            "first_name" => "Super",
            "last_name" => "Admin",
            "email" => "super@admin.com",
            "email_verified_at" => Carbon::now(),
            "mobile_verified_at" => Carbon::now(),
            "password" => bcrypt("supersuper"),
            "active" => true,
            "activation_token" => "",
            "sms_token" => "",
            "mobile_number" => "0",
            "created_at" => Carbon::now()
        ]);
        $superAdmin->assignRole($superadminrole);
    }
}
