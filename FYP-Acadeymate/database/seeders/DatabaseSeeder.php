<?php

namespace Database\Seeders;

use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;



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

		$this->call([
            RoleAndPermissionSeeder::class,
        ]);

		\App\Models\User::factory(100)->create()->each(function ($user) {
			$user->assignRole($user->user_role);

			$role = \Spatie\Permission\Models\Role::where('name', $user->user_role)->first();

				// Assign the role to the user
			if ($role == 'Developer/Super Admin')
			{
				// $user = \App\Models\User::where('id', $user->id)->first();
				$user->assignRole('Developer/Super Admin');
			}
			else if ($role == 'Educational Institute Admin')
			{
				// $user = \App\Models\User::where('id', $user->id)->first();
				$user->assignRole('Educational Institute Admin');
			}
			else if ($role == 'Lecturer')
			{
				// $user = \App\Models\User::where('id', $user->id)->first();
				$user->assignRole('Lecturer');
			}
			else if ($role == 'Guardian')
			{
				// $user = \App\Models\User::where('id', $user->id)->first();
				$user->assignRole('Guardian');
			}
			else if ($role == 'Student')
			{
				// $user = \App\Models\User::where('id', $user->id)->first();
				$user->assignRole('Student');
			} else {
				return;
			}
		});

		// $this->call([
        //     EducationalInstituteSeeder::class,
        // \App\Models\UserRole::factory()->createMany([
        //     ['user_role' => 'DevAdmin'],
        //     ['user_role' => 'EducationalInstitutionAdmin'],
        //     ['user_role' => 'Lecturer'],
        //     ['user_role' => 'Guardian'],
        //     ['user_role' => 'Student'],
        // ]);

		\App\Models\EducationalInstitute::factory(50)->create();

		// \App\Models\EnrolledUnder::factory(15)->create();
		for ($i = 0; $i < 75; $i++) {
			\App\Models\EnrolledUnder::factory()->create();
		}

		$this->call([
            GuardianSeeder::class,
        ]);

    }
}
