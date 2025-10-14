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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Setting key (e.g., 'fb_pixel_id', 'gtm_id')
            $table->text('value')->nullable(); // Setting value
            $table->string('group')->default('general'); // Group settings (e.g., 'tracking', 'general', 'social')
            $table->text('description')->nullable(); // Description of the setting
            $table->boolean('is_active')->default(true); // Enable/disable setting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
