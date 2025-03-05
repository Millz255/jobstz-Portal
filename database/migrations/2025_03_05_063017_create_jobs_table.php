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
        Schema::dropIfExists('jobs'); // Add this line to drop the table first if it exists

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('company');
            $table->unsignedBigInteger('location_id')->nullable(); // Foreign key for location
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key for category
            $table->date('deadline');
            $table->timestamp('date_posted')->nullable();
            $table->boolean('is_expired')->default(false);
            $table->string('application_link')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('SET NULL'); // or 'CASCADE' depending on your needs
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL'); // or 'CASCADE' depending on your needs
        });

    }

    
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};