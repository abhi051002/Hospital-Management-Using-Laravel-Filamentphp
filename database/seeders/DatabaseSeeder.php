<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name'=>'create-appointment']);
        Permission::create(['name'=>'edit-appointment']);
        Permission::create(['name'=>'delete-appointment']);

        Permission::create(['name'=>'create-doctor']);
        Permission::create(['name'=>'edit-doctor']);
        Permission::create(['name'=>'delete-doctor']);

        Permission::create(['name'=>'create-hospital']);
        Permission::create(['name'=>'edit-hospital']);
        Permission::create(['name'=>'delete-hospital']);

        Permission::create(['name'=>'create-patient']);
        Permission::create(['name'=>'edit-patient']);
        Permission::create(['name'=>'delete-patient']);

        $admin=User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user = User::first();

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'user']);


        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-appointment',
            'edit-appointment',
            'delete-appointment',
            'create-doctor',
            'edit-doctor',
            'delete-doctor',
            'create-hospital',
            'edit-hospital',
            'delete-hospital',
            'create-patient',
            'edit-patient',
            'delete-patient'
        ]);

        $userRole->givePermissionTo([
            'create-appointment',
        ]);
        // $user1Role->givePermissionTo([
        //     'create-appointment',
        // ]);

        $admin->assignRole('Admin');
        // $user->assignRole('sup');
        $user->assignRole('user');
    }
}
