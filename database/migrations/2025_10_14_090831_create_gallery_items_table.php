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
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['video', 'interior', 'exterior', 'before&after']); // Gallery item type
            $table->string('title')->nullable(); // Optional title
            $table->text('description')->nullable(); // Optional description

            // For single image types (interior, exterior)
            $table->string('image')->nullable(); // Single image path

            // For before&after type
            $table->string('before_image')->nullable(); // Before image path
            $table->string('after_image')->nullable(); // After image path

            // For video type
            $table->string('video_url')->nullable(); // YouTube video URL or embed code
            $table->string('video_thumbnail')->nullable(); // Video thumbnail image

            $table->integer('order')->default(0); // For manual ordering
            $table->boolean('is_active')->default(true); // Show/hide item
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
