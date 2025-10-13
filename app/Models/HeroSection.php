<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_identifier',
        'page_name',
        'title',
        'subtitle',
        'media_type',
        'background_image',
        'background_video',
        'background_color',
        'show_social_icons',
        'is_active',
    ];

    protected $casts = [
        'show_social_icons' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active hero sections
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for finding by page identifier
     */
    public function scopeForPage($query, string $pageIdentifier)
    {
        return $query->where('page_identifier', $pageIdentifier);
    }

    /**
     * Get hero section for a specific page
     */
    public static function getForPage(string $pageIdentifier)
    {
        return static::active()
            ->forPage($pageIdentifier)
            ->first();
    }
}
