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

        // START Create Basic Permissions
        Permission::create(['name' => 'can_list_users']);
        Permission::create(['name' => 'can_create_user']);
        Permission::create(['name' => 'can_edit_user']);
        Permission::create(['name' => 'can_delete_user']);

        Permission::create(['name' => 'can_list_patients']);
        Permission::create(['name' => 'can_create_patient']);
        Permission::create(['name' => 'can_edit_patient']);
        Permission::create(['name' => 'can_delete_patient']);

        Permission::create(['name' => 'can_list_diagnosis']);
        Permission::create(['name' => 'can_create_diagnosis']);
        Permission::create(['name' => 'can_edit_diagnosis']);
        Permission::create(['name' => 'can_delete_diagnosis']);

        Permission::create(['name' => 'can_list_symptoms']);
        Permission::create(['name' => 'can_create_symptoms']);
        Permission::create(['name' => 'can_edit_symptoms']);
        Permission::create(['name' => 'can_delete_symptoms']);

        Permission::create(['name' => 'can_list_drugs']);
        Permission::create(['name' => 'can_create_drugs']);
        Permission::create(['name' => 'can_edit_drugs']);
        Permission::create(['name' => 'can_delete_drugs']);

        Permission::create(['name' => 'can_list_medical_lab_tests']);
        Permission::create(['name' => 'can_create_medical_lab_test']);
        Permission::create(['name' => 'can_edit_medical_lab_test']);
        Permission::create(['name' => 'can_delete_medical_lab_test']);

        Permission::create(['name' => 'can_list_pharmacy']);
        Permission::create(['name' => 'can_create_pharmacy']);
        Permission::create(['name' => 'can_edit_pharmacy']);
        Permission::create(['name' => 'can_delete_pharmacy']);

        Permission::create(['name' => 'can_list_inventory']);
        Permission::create(['name' => 'can_create_inventory']);
        Permission::create(['name' => 'can_edit_inventory']);
        Permission::create(['name' => 'can_delete_inventory']);

        Permission::create(['name' => 'can_list_providers']);
        Permission::create(['name' => 'can_create_providers']);
        Permission::create(['name' => 'can_edit_providers']);
        Permission::create(['name' => 'can_delete_providers']);

        Permission::create(['name' => 'can_access_reception_department']);
        Permission::create(['name' => 'can_access_antho_department']);
        Permission::create(['name' => 'can_access_doctor_department']);
        Permission::create(['name' => 'can_access_medical_lab_department']);
        Permission::create(['name' => 'can_access_pharmacy_department']);
        Permission::create(['name' => 'can_access_dashboard']);
        Permission::create(['name' => 'can_access_log']);
        // END Create Basic Permissions
    }
}
