<?php
// WORK IN PROGRESS

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

		// $user = User::whereDoesntHave('Guardian.users')->inRandomOrder()->first();
		$guardian_user_id = User::where('user_role', 'Guardian')->inRandomOrder()->first();
		$guardian_of_user_id = User::where('user_role', 'Student')
			->whereDoesntHave('guardians')
			->inRandomOrder()
			->first();

		return [
			'guardian_relationship_with_user' => $this->faker->randomElement([
				'Father', 'Mother', 'Brother', 'Sister', 'Uncle', 'Aunt', 'Grandfather', 'Grandmother', 'Other'
			]),
			'guardian_user_id' => $guardian_user_id->id,
			'guardian_of_user_id' => $guardian_of_user_id->id,
			'created_at' => now(),
			'updated_at' => now(),
		];
	}

	// 	return [
	// 		'guardian_relationship_with_user' => $this->faker->randomElement([
	// 			'Father', 'Mother', 'Brother', 'Sister', 'Uncle', 'Aunt', 'Grandfather', 'Grandmother', 'Other'
	// 		]),
	// 		'user_id' => function (array $attributes) use ($user) {
	// 			if ($attributes['guardian_relationship_with_user'] === 'Father') {
	// 				return $user;
	// 			}

	// 			return User::factory();
	// 		},
	// 		'guardian_user_id' => User::factory(),
    //         'guardian_of_user_id' => User::factory(),
    //     ];


    //     if ($user && $educationalInstitute) {
	// 		return [
	// 			'user_id' => $user->id,
	// 			'educational_institute_id' => $educationalInstitute->id,
	// 			'created_at' => now(),
	// 			'updated_at' => now(),
	// 		];
	// 	}

	// 	return [];
    // }
}
