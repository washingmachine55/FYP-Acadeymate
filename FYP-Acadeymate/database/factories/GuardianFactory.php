<?php
// WORK IN PROGRESS

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;
// use \App\Models\User;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
//  */
// class GuardianFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         $user = User::factory();

// 		return [
// 			'guardian_relationship_with_user' => $this->faker->randomElement([
// 				'Father', 'Mother', 'Brother', 'Sister', 'Uncle', 'Aunt', 'Grandfather', 'Grandmother', 'Other'
// 			]),
// 			'user_id' => function (array $attributes) use ($user) {
// 				if ($attributes['guardian_relationship_with_user'] === 'Father') {
// 					return $user;
// 				}

// 				return User::factory();
// 			},
// 			'guardian_user_id' => User::factory(),
//             'guardian_of_user_id' => User::factory(),
//         ];
//     }
// }
