<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Amal Shekhdaher', 
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $user = User::create([
            'name' => 'Yusuf', 
            'email' => 'yusuf@gmail.com',
            'password' => Hash::make('yusuf1234')
        ]);
        $user->assignRole('User');
    }
}