<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
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

        // Permission::create(['name' => 'edit articles']);

        Role::create(['name' => 'user']);
            // ->givePermissionTo(['edit articles']);

        Role::create(['name' => 'admin']);
            // ->givePermissionTo(Permission::all());
    }
}