<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing users
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Create regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        // Create additional test users
        User::create([
            'name' => 'Test User 1',
            'email' => 'test1@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Test User 2', 
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}