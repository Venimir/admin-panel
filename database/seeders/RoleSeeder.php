<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'Super Admin' =>
                    [
                        'View Adds', 'View Templates', 'View Users', 'View Role', 'View Permission',
                        'Create Adds', 'Create Templates', 'Create Users', 'Create Role', 'Create Permission',
                        'Update Adds', 'Update Templates', 'Update Users', 'Update Role', 'Update Permission',
                        'Delete Adds', 'Delete Templates', 'Delete Users', 'Delete Role', 'Delete Permission',
                    ]
            ],
            [
                'Admin' =>
                    [
                        'View Adds', 'View Templates', 'View Users',
                        'Create Adds', 'Create Templates', 'Create Users',
                        'Update Adds', 'Update Templates', 'Update Users',
                        'Delete Adds', 'Delete Templates', 'Delete Users',
                    ]
            ],
            [
                'Editor' =>
                    [
                        'Create Adds', 'Create Templates',
                        'View Adds', 'View Templates', 'View Users',
                        'Update Adds', 'Update Templates',
                    ]
            ],
            [
                'Viewer' => [
                    'View Adds', 'View Templates',
                ]
            ],
        ];

        foreach ($roles as $roleAndPermissions) {
            foreach ($roleAndPermissions as $roleName => $permissionNames) {
                $role = Role::create([
                    'name' => $roleName,
                    'guard_name' => 'web'
                ]);

                $permissions = Permission::query()->whereIn('name',  $permissionNames)->pluck('name', 'id');
                $role->syncPermissions($permissions);
            }
        }
    }
}
