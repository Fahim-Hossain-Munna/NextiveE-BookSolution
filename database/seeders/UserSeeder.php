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
        User::updateOrCreate(
            [
                'email' => 'admin@fhmbookstore.dev',
            ],
            [
                'name' => 'Administrator',
                'type' => 'admin',
                'is_admin' => true,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(10),
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'user@fhmbookstore.dev',
            ],
            [
                'name' => 'Fahim Hossain Munna',
                'type' => 'user',
                'is_admin' => true,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
