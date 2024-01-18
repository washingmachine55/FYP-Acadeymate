<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\EducationalInstitute;
use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EnrolledUnder>
 */
class EnrolledUnderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$user = User::whereDoesntHave('educationalInstitutes')->inRandomOrder()->first();
		$educationalInstitute = EducationalInstitute::inRandomOrder()->first();

        if ($user && $educationalInstitute) {
			return [
				'user_id' => $user->id,
				'educational_institute_id' => $educationalInstitute->id,
				'created_at' => now(),
				'updated_at' => now(),
			];
		}

		return [];
    }
}
