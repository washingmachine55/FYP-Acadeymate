<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('educational_institutes', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email');
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('country')->nullable();
			$table->string('website')->nullable();
			$table->string('logo')->nullable();
			$table->string('cover_photo')->nullable();
			$table->text('about')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('educational_institutes');
	}
};
