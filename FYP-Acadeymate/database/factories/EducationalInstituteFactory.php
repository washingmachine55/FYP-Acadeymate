<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationalInstitute>
 */
class EducationalInstituteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
			'email' => $this->faker->unique()->safeEmail,
			'created_at' => Carbon::now()->subDays($this->faker->numberBetween(1, 90)),
			'updated_at' => Carbon::now()->subDays($this->faker->numberBetween(1, 90)),
        ];
    }
}
