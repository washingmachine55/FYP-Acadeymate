<?php
// WORK IN PROGRESS

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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
			$table->string('guardian_relationship_with_user');
			$table->foreignId('guardian_user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('cascade');
			$table->foreignId('guardian_of_user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
