<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleandPermissionSeeder extends Seeder
{
    /**
     * Run the database seeder to create new roles and
     * permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'read-api']);
        Permission::create(['name' => 'edit-api']);
        Permission::create(['name' => 'manage-team']);

        // Create roles and assign permissions
        $role = Role::create(['name' => 'user'])
            ->givePermissionTo(['read-api']);

        $role = Role::create(['name' => 'developer'])
            ->givePermissionTo(['read-api', 'edit-api']);
        
        $role = Role::create(['name' => 'senior'])
            ->givePermissionTo(Permission::all());
        
        // Create admin permissions
        Permission::create(['name' => 'admin-manage-users']);
        Permission::create(['name' => 'admin-manage-apis']);

        // Create admin roles
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
    }
}
