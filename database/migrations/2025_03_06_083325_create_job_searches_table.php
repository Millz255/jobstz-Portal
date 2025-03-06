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
        Schema::create('job_searches', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('category_id')->constrained('categories'); // Foreign key to categories table
            $table->timestamps(); // created_at and updated_at columns
            // Add any other columns you need for job searches here
            // e.g., $table->string('search_keyword')->nullable();
            //       $table->unsignedBigInteger('user_id')->nullable(); // If you want to track users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_searches');
    }
};