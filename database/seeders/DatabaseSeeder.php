<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\curriculum;
use App\Models\Lead;
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


        // Make User Role User
        $this->create_user_with_role('SuperAdmin', 'Super Admin', 'superadmin@mail.com');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@mail.com');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@mail.com');
        $teacher = $this->create_user_with_role('Leads', 'Leads', 'lead@mail.com');


        // Make Leads for testing
        Lead::factory(50)->create();

        // Create Course
        $course = Course::create([
            'name' => 'PHP',
            'description' => 'PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.',
            'image' => 'https://www.php.net/images/logos/new-php-logo.svg',
            'user_id' => $teacher->id,
        ]);

        // Create Curriculum
        curriculum::factory(10)->create();
    }

    // Custom Private Function
    private function create_user_with_role($type, $name, $email){
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make('password'),
        ]);

        $role = Role::create(['name' => $type]);
        $user->assignRole($role);

        if ($type == 'SuperAdmin') {
            $permission = Permission::create(['name' => 'create-admin']);
            $permission->assignRole($role);
            $user->givePermissionTo($permission);
        }
        return $user;
    }
}
