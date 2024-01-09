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
			// create a name with faker that ends with University, school, college, institute, academy, etc.
			'name' => $this->faker->company . ' University',
			'email' => $this->faker->unique()->safeEmail,
			'phone' => $this->faker->unique()->phoneNumber,
			'address' => $this->faker->address,
			'city' => $this->faker->city,
			'country' => $this->faker->country,
			'website' => $this->faker->url,
			'logo' => $this->faker->imageUrl($width = 640, $height = 480),
			'cover_photo' => $this->faker->imageUrl($width = 640, $height = 480),
			'about' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
			'created_at' => Carbon::now()->subDays($this->faker->numberBetween(1, 90)),
			'updated_at' => Carbon::now()->subDays($this->faker->numberBetween(1, 90)),
        ];
    }
}
