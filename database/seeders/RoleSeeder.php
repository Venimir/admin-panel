<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Roles;
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
                        'View Adds', 'View Templates', 'View Users', 'View Roles', 'View Permissions',
                        'Create Adds', 'Create Templates', 'Create Users', 'Create Roles', 'Create Permissions',
                        'Update Adds', 'Update Templates', 'Update Users', 'Update Roles', 'Update Permissions',
                        'Delete Adds', 'Delete Templates', 'Delete Users', 'Delete Roles', 'Delete Permissions',
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
                $role = Roles::create([
                    'name' => $roleName,
                    'guard_name' => 'web'
                ]);

                $permissions = Permissions::query()->whereIn('name',  $permissionNames)->pluck('name', 'id');
                $role->syncPermissions($permissions);
            }
        }
    }
}
