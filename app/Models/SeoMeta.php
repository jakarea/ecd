<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeoMeta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'seo_meta';

    protected $fillable = [
        'page_url',
        'page_name',
        'page_type',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'og_locale',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'twitter_site',
        'twitter_creator',
        'index',
        'follow',
        'robots',
        'schema_markup',
        'focus_keyword',
        'seo_score',
        'author',
        'publisher',
        'published_at',
        'modified_at',
        'is_active',
        'priority',
        'notes',
    ];

    protected $casts = [
        'index' => 'boolean',
        'follow' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'modified_at' => 'datetime',
        'seo_score' => 'integer',
        'priority' => 'integer',
    ];

    /**
     * Get the robots meta content
     */
    public function getRobotsMetaAttribute(): string
    {
        if ($this->robots) {
            return $this->robots;
        }

        $parts = [];
        $parts[] = $this->index ? 'index' : 'noindex';
        $parts[] = $this->follow ? 'follow' : 'nofollow';

        return implode(', ', $parts);
    }

    /**
     * Get SEO score color for UI
     */
    public function getScoreColorAttribute(): string
    {
        if ($this->seo_score >= 80) return 'green';
        if ($this->seo_score >= 60) return 'yellow';
        if ($this->seo_score >= 40) return 'orange';
        return 'red';
    }

    /**
     * Get SEO score label
     */
    public function getScoreLabelAttribute(): string
    {
        if ($this->seo_score >= 80) return 'Excellent';
        if ($this->seo_score >= 60) return 'Good';
        if ($this->seo_score >= 40) return 'Average';
        return 'Poor';
    }

    /**
     * Calculate SEO score based on various factors
     */
    public function calculateSeoScore(): int
    {
        $score = 0;

        // Meta Title (20 points)
        if ($this->meta_title) {
            $titleLength = strlen($this->meta_title);
            if ($titleLength >= 50 && $titleLength <= 60) {
                $score += 20;
            } elseif ($titleLength >= 30 && $titleLength <= 70) {
                $score += 15;
            } elseif ($titleLength > 0) {
                $score += 10;
            }
        }

        // Meta Description (20 points)
        if ($this->meta_description) {
            $descLength = strlen($this->meta_description);
            if ($descLength >= 150 && $descLength <= 160) {
                $score += 20;
            } elseif ($descLength >= 120 && $descLength <= 180) {
                $score += 15;
            } elseif ($descLength > 0) {
                $score += 10;
            }
        }

        // Focus Keyword (15 points)
        if ($this->focus_keyword) {
            $score += 15;
        }

        // Canonical URL (10 points)
        if ($this->canonical_url) {
            $score += 10;
        }

        // Open Graph Tags (15 points)
        if ($this->og_title && $this->og_description) {
            $score += 10;
        }
        if ($this->og_image) {
            $score += 5;
        }

        // Twitter Card (10 points)
        if ($this->twitter_title && $this->twitter_description) {
            $score += 10;
        }

        // Schema Markup (10 points)
        if ($this->schema_markup) {
            $score += 10;
        }

        return min($score, 100);
    }

    /**
     * Update and save SEO score
     */
    public function updateSeoScore(): void
    {
        $this->seo_score = $this->calculateSeoScore();
        $this->save();
    }

    /**
     * Get active SEO meta
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get SEO by URL
     */
    public function scopeByUrl($query, string $url)
    {
        return $query->where('page_url', $url);
    }

    /**
     * Get SEO by type
     */
    public function scopeByType($query, string $type)
    {
        return $query->where('page_type', $type);
    }
}
