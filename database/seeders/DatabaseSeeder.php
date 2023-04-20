<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
//        Create Role
        $role = Role::create(['name' => 'SuperAdmin']);
        $permission = Permission::create(['name' => 'create-admin']);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);


        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role);
        $user->givePermissionTo($permission);
    }
}
