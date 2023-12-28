<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\DevAdmin::factory()->create();
        \App\Models\User::factory(2)->create();
        // \App\Models\UserRole::factory()->createMany([
        //     ['user_role' => 'DevAdmin'],
        //     ['user_role' => 'EducationalInstitutionAdmin'],
        //     ['user_role' => 'Lecturer'],
        //     ['user_role' => 'Guardian'],
        //     ['user_role' => 'Student'],
        // ]);

        $this->call([
            RoleAndPermissionSeeder::class,
        ]);
    }
}
