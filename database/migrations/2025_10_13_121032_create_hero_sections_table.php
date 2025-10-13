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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_identifier')->unique(); // e.g., 'home', 'about', 'services', 'contact'
            $table->string('page_name'); // Display name: "Home Page", "About Us", etc.
            $table->string('title'); // Hero title text
            $table->string('subtitle')->nullable(); // Optional subtitle
            $table->enum('media_type', ['image', 'video'])->default('image'); // Type of background
            $table->string('background_image')->nullable(); // Path to background image
            $table->string('background_video')->nullable(); // YouTube/Vimeo video URL or video file path
            $table->string('background_color')->default('bg-transparent'); // Tailwind class or hex color
            $table->boolean('show_social_icons')->default(true); // Show/hide social icons
            $table->boolean('is_active')->default(true); // Enable/disable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
