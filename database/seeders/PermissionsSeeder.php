<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
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
        // Truncate permissions tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('model_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Reset cached roles and permissions
        App()[PermissionRegistrar::class]->forgetCachedPermissions();

        // START Permissions
        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'list patients']);
        Permission::create(['name' => 'create patient']);
        Permission::create(['name' => 'edit patient']);
        Permission::create(['name' => 'delete patient']);

        Permission::create(['name' => 'list diagnosis']);
        Permission::create(['name' => 'create diagnosis']);
        Permission::create(['name' => 'edit diagnosis']);
        Permission::create(['name' => 'delete diagnosis']);

        Permission::create(['name' => 'list symptoms type']);
        Permission::create(['name' => 'create symptoms type']);
        Permission::create(['name' => 'edit symptoms type']);
        Permission::create(['name' => 'delete symptoms type']);

        Permission::create(['name' => 'list drugs']);
        Permission::create(['name' => 'create drugs']);
        Permission::create(['name' => 'edit drugs']);
        Permission::create(['name' => 'delete drugs']);

        Permission::create(['name' => 'list medical lab tests']);
        Permission::create(['name' => 'create medical lab test']);
        Permission::create(['name' => 'edit medical lab test']);
        Permission::create(['name' => 'delete medical lab test']);

        Permission::create(['name' => 'list pharmacy']);
        Permission::create(['name' => 'create pharmacy']);
        Permission::create(['name' => 'edit pharmacy']);
        Permission::create(['name' => 'delete pharmacy']);

        Permission::create(['name' => 'list inventory']);
        Permission::create(['name' => 'create inventory']);
        Permission::create(['name' => 'edit inventory']);
        Permission::create(['name' => 'delete inventory']);

        Permission::create(['name' => 'list providers']);
        Permission::create(['name' => 'create providers']);
        Permission::create(['name' => 'edit providers']);
        Permission::create(['name' => 'delete providers']);

        Permission::create(['name' => 'access reception department']);
        Permission::create(['name' => 'access antho department']);
        Permission::create(['name' => 'access doctor department']);
        Permission::create(['name' => 'access medical lab department']);
        Permission::create(['name' => 'access pharmacy department']);
        Permission::create(['name' => 'access committee approval']);
        Permission::create(['name' => 'access dashboard']);
        Permission::create(['name' => 'access log']);
        // END Permissions
    }
}
