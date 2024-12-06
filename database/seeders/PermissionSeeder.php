<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name'       => 'View Adds',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'View Templates',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'View Role',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'View Permission',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'View Users',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Create Adds',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Create Templates',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Create Role',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Create Permission',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Create Users',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Update Adds',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Update Templates',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Update Role',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Update Permission',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Update Users',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Delete Adds',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Delete Templates',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Delete Role',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Delete Permission',
                'guard_name' => 'web'
            ],
            [
                'name'       => 'Delete Users',
                'guard_name' => 'web'
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
