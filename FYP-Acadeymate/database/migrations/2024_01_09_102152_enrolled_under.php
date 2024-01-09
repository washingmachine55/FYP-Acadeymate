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
        Schema::create('enrolled_under', function (Blueprint $table) {
            $table->id()->onDelete('cascade');
			$table->foreignId('user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('cascade');
			$table->foreignId('educational_institute_id')->references('id')->on('educational_institutes')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolled_under');
    }
};
