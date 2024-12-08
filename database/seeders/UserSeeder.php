<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $userData = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('superadmin'),
                'remember_token' => Str::random(10),
            ],
            ['name' => 'Admin',
             'email' => 'admin@gmail.com',
             'email_verified_at' => now(),
             'password' => Hash::make('admin'),
             'remember_token' => Str::random(10),
            ],
            ['name' => 'Editor',
             'email' => 'editor@gmail.com',
             'email_verified_at' => now(),
             'password' => Hash::make('password'),
             'remember_token' => Str::random(10),
            ],
            ['name' => 'Viewer',
             'email' => 'viewer@gmail.com',
             'email_verified_at' => now(),
             'password' => Hash::make('password'),
             'remember_token' => Str::random(10),
            ]
        ];

        /** @var User $user */
        foreach ($userData as $userDatum) {
            $user = User::create($userDatum);
            $user->assignRole($userDatum['name']);
        }
    }
}
