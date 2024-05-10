<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'user']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-book',
            'edit-book',
            'delete-book',
            'create-category',
            'edit-category',
            'delete-category'
        ]);

        $user->givePermissionTo([
            'create-book',
            'edit-book',
            'delete-book',
            'create-category',
            'edit-category',
            'delete-category'
        ]);
    }
}