<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory; // Add this import statement
class GuardianSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Factory::factoryForModel(\App\Models\Guardian::class)->times(15)->create(); // Use Factory::factory instead of factory
	}
}
