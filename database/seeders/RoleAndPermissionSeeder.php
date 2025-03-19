<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            // User Management
            'manage_users',
            'manage_roles',
            'manage_permissions',
            'configure_system_settings',
            // Customer
            'create_account',
            'view_account',
        ];

        // Create permissions in the database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Define roles and assign permissions
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleCustomer = Role::create(['name' => 'Customer']);

        // Assign permissions to roles
        $roleAdmin->givePermissionTo(Permission::all());

        $roleCustomer->givePermissionTo([
            'create_account',
            'view_account',
        ]);

        // Print success message
        $this->command->info('Roles and permissions seeded successfully!');
    }
}
