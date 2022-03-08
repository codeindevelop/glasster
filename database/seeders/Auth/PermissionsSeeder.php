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


        // Post permissions
        Permission::create(['guard_name' => 'api', 'name' => 'create post']);
        Permission::create(['guard_name' => 'api', 'name' => 'view post']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit post']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete post']);

        // Digital Products Category permissions
        Permission::create(['guard_name' => 'api', 'name' => 'create digital product']);
        Permission::create(['guard_name' => 'api', 'name' => 'view digital product']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit digital product']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete digital product']);


        // GiftCards Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create giftcards']);
        Permission::create(['guard_name' => 'api', 'name' => 'view giftcards']);
        Permission::create(['guard_name' => 'api', 'name' => 'edite giftcards']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete giftcards']);

        // Product Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create product']);
        Permission::create(['guard_name' => 'api', 'name' => 'view product']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit product']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete product']);

        // Support Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create tickets']);
        Permission::create(['guard_name' => 'api', 'name' => 'view tickets']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit tickets']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete tickets']);

        //Invoice Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create invoice']);
        Permission::create(['guard_name' => 'api', 'name' => 'view invoice']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit invoice']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete invoice']);

        // Users Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create user']);
        Permission::create(['guard_name' => 'api', 'name' => 'view user']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit user']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete user']);

        // Portals Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create portal']);
        Permission::create(['guard_name' => 'api', 'name' => 'view portal']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit portal']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete portal']);

        // Pages Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create pages']);
        Permission::create(['guard_name' => 'api', 'name' => 'view pages']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit pages']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete pages']);

        Permission::create(['guard_name' => 'api', 'name' => 'access to panel']);

        // Email Templates Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create email templates']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit email templates']);
        Permission::create(['guard_name' => 'api', 'name' => 'view email templates']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete email templates']);

        // Resellers Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create reseller']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit reseller']);
        Permission::create(['guard_name' => 'api', 'name' => 'view reseller']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete reseller']);

        // Withdraw Permission
        Permission::create(['guard_name' => 'api', 'name' => 'create withdraw']);
        Permission::create(['guard_name' => 'api', 'name' => 'edit withdraw']);
        Permission::create(['guard_name' => 'api', 'name' => 'virw withdraw']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete withdraw']);

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
        // $superadminrole->givePermissionTo('create post category');
        // $superadminrole->givePermissionTo('edit post category');
        // $superadminrole->givePermissionTo('delete post category');
        // $superadminrole->givePermissionTo('update post category');
        // $superadminrole->givePermissionTo('unpublished post category');

        // $superadminrole->givePermissionTo('create post');
        // $superadminrole->givePermissionTo('edit post');
        // $superadminrole->givePermissionTo('delete post');
        // $superadminrole->givePermissionTo('publish post');
        // $superadminrole->givePermissionTo('unpublished post');


        // $superadminrole->givePermissionTo('modify general settings');
        // $superadminrole->givePermissionTo('modify seo settings');
        // $superadminrole->givePermissionTo('modify auth settings');
        // $superadminrole->givePermissionTo('modify social settings');
        // $superadminrole->givePermissionTo('modify localization settings');
        // $superadminrole->givePermissionTo('modify sms settings');
        // $superadminrole->givePermissionTo('modify email settings');


        // $superadminrole->givePermissionTo('create digital product category');
        // $superadminrole->givePermissionTo('edit digital product category');
        // $superadminrole->givePermissionTo('delete digital product category');
        // $superadminrole->givePermissionTo('update digital product category');
        // $superadminrole->givePermissionTo('unpublished digital product category');

        // $superadminrole->givePermissionTo('create digital product');
        // $superadminrole->givePermissionTo('edit digital product');
        // $superadminrole->givePermissionTo('delete digital product');
        // $superadminrole->givePermissionTo('update digital product');
        // $superadminrole->givePermissionTo('unpublished digital product');

        // $superadminrole->givePermissionTo('edit products');
        // $superadminrole->givePermissionTo('delete products');
        // $superadminrole->givePermissionTo('publish products');
        // $superadminrole->givePermissionTo('unpublished products');
        // $superadminrole->givePermissionTo('edit tickets');
        // $superadminrole->givePermissionTo('delete tickets');
        // $superadminrole->givePermissionTo('response tickets');
        // $superadminrole->givePermissionTo('close tickets');
        // $superadminrole->givePermissionTo('edit invoice');
        // $superadminrole->givePermissionTo('delete invoice');
        // $superadminrole->givePermissionTo('create invoice');
        // $superadminrole->givePermissionTo('close invoice');
        // $superadminrole->givePermissionTo('create user');
        // $superadminrole->givePermissionTo('active user');
        // $superadminrole->givePermissionTo('deactivate user');
        // $superadminrole->givePermissionTo('delete user');
        // $superadminrole->givePermissionTo('view users');
        // $superadminrole->givePermissionTo('manage portal');
        // $superadminrole->givePermissionTo('manage pages');
        // $superadminrole->givePermissionTo('manage eshop');
        // $superadminrole->givePermissionTo('manage email templates');
        // $superadminrole->givePermissionTo('view reseller');
        // $superadminrole->givePermissionTo('create reseller package');
        // $superadminrole->givePermissionTo('manage reseller package');
        // $superadminrole->givePermissionTo('delete reseller package');
        // $superadminrole->givePermissionTo('create reseller');
        // $superadminrole->givePermissionTo('manage reseller');
        // $superadminrole->givePermissionTo('delete reseller');
        // $superadminrole->givePermissionTo('edit withdraw');
        // $superadminrole->givePermissionTo('confirm withdraw');
        // $superadminrole->givePermissionTo('verify document');

        // Admin Role
        $roleAdmin = Role::create(['guard_name' => 'api', 'name' => 'admin']);




        // Create Writer Role
        $roleWriter = Role::create(['guard_name' => 'api', 'name' => 'writer']);


        // Create User Registred Role
        $userrole = Role::create(['guard_name' => 'api', 'name' => 'user']);
        $userrole->givePermissionTo('access to panel');


        // Create Support Role
        $supportRole = Role::create(['guard_name' => 'api', 'name' => 'support']);







        //create super admin
        $user = \App\Models\User::factory()->create([

            // "user_name" => "super admin",
            "first_name" => "super",
            "last_name" => "admin",
            "email" => "super@admin.com",
            "email_verified_at" => Carbon::now(),
            "mobile_verified_at" => Carbon::now(),
            "password" => bcrypt("supersuper"),
            "active" => true,
            "activation_token" => "",
            "mobile_token" => "",
            "mobile_number" => "0912",
            "created_at" => Carbon::now()
        ]);
        $user->assignRole($superadminrole);



        // create demo users
        $user = \App\Models\User::factory()->create([
            // "user_name" => "userexample",
            "first_name" => "user",
            "last_name" => "example",
            "email" => "user@example.com",
            "email_verified_at" => Carbon::now(),
            "mobile_verified_at" => Carbon::now(),
            "password" => bcrypt("useruser"),
            "active" => true,
            "activation_token" => "",
            "mobile_token" => "",
            "mobile_number" => "090509",
            "created_at" => Carbon::now()
        ]);
        $user->assignRole($userrole);
    }
}
