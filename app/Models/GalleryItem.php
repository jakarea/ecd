<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'image',
        'before_image',
        'after_image',
        'video_url',
        'video_thumbnail',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Helper methods
    public function getVideoEmbedUrl()
    {
        if ($this->type !== 'video' || !$this->video_url) {
            return null;
        }

        // Extract YouTube video ID from various URL formats
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';

        if (preg_match($pattern, $this->video_url, $matches)) {
            // Use youtube-nocookie.com for privacy-enhanced mode (no cookies until play)
            return 'https://www.youtube-nocookie.com/embed/' . $matches[1];
        }

        return $this->video_url;
    }

    public function isVideo()
    {
        return $this->type === 'video';
    }

    public function isBeforeAfter()
    {
        return $this->type === 'before&after';
    }

    public function isInterior()
    {
        return $this->type === 'interior';
    }

    public function isExterior()
    {
        return $this->type === 'exterior';
    }
}
