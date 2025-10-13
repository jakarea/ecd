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
        Schema::create('seo_meta', function (Blueprint $table) {
            $table->id();

            // Page Identification
            $table->string('page_url')->unique()->comment('URL path of the page (e.g., /, /about, /contact)');
            $table->string('page_name')->comment('Display name for admin panel');
            $table->enum('page_type', ['home', 'page', 'blog', 'custom'])->default('page');

            // Basic SEO Meta Tags
            $table->string('meta_title', 60)->nullable()->comment('Page title (50-60 chars recommended)');
            $table->text('meta_description')->nullable()->comment('Meta description (150-160 chars recommended)');
            $table->string('meta_keywords')->nullable()->comment('Comma-separated keywords');
            $table->string('canonical_url')->nullable()->comment('Canonical URL to prevent duplicate content');

            // Open Graph (Facebook) Meta Tags
            $table->string('og_title', 95)->nullable()->comment('OG title (recommended 95 chars)');
            $table->text('og_description')->nullable()->comment('OG description');
            $table->string('og_image')->nullable()->comment('OG image URL (1200x630px recommended)');
            $table->string('og_type')->default('website')->comment('OG type (website, article, etc)');
            $table->string('og_locale')->default('en_US')->comment('Content locale');

            // Twitter Card Meta Tags
            $table->enum('twitter_card', ['summary', 'summary_large_image', 'app', 'player'])->default('summary_large_image');
            $table->string('twitter_title', 70)->nullable()->comment('Twitter title (recommended 70 chars)');
            $table->text('twitter_description')->nullable()->comment('Twitter description');
            $table->string('twitter_image')->nullable()->comment('Twitter image URL (1200x600px recommended)');
            $table->string('twitter_site')->nullable()->comment('Twitter @username');
            $table->string('twitter_creator')->nullable()->comment('Content creator @username');

            // Robots & Indexing
            $table->boolean('index')->default(true)->comment('Allow search engines to index');
            $table->boolean('follow')->default(true)->comment('Allow search engines to follow links');
            $table->string('robots')->nullable()->comment('Custom robots meta content');

            // Advanced SEO
            $table->text('schema_markup')->nullable()->comment('JSON-LD structured data');
            $table->string('focus_keyword')->nullable()->comment('Primary focus keyword');
            $table->integer('seo_score')->default(0)->comment('SEO score (0-100)');

            // Additional Meta
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('modified_at')->nullable();

            // Status & Management
            $table->boolean('is_active')->default(true);
            $table->integer('priority')->default(0)->comment('Display priority in lists');
            $table->text('notes')->nullable()->comment('Internal notes for admins');

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('page_url');
            $table->index('page_type');
            $table->index('is_active');
            $table->index('seo_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_meta');
    }
};
