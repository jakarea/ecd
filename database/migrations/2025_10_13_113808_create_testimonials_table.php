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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Customer name
            $table->string('role')->nullable(); // e.g., "CEO, Company XYZ"
            $table->text('review'); // The testimonial text
            $table->string('vehicle_image')->nullable(); // Path to vehicle image
            $table->string('profile_image')->nullable(); // Path to customer profile image
            $table->integer('order')->default(0); // For ordering testimonials
            $table->boolean('is_active')->default(true); // Show/hide testimonial
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
