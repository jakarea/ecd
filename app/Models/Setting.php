<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    public function scopeByKey($query, $key)
    {
        return $query->where('key', $key);
    }

    // Helper methods to get settings
    public static function get($key, $default = null)
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::active()->byKey($key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    public static function getByGroup($group)
    {
        return Cache::remember("settings_group_{$group}", 3600, function () use ($group) {
            return self::active()->byGroup($group)->pluck('value', 'key')->toArray();
        });
    }

    public static function set($key, $value, $group = 'general', $description = null)
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'description' => $description,
                'is_active' => true,
            ]
        );

        // Clear cache
        Cache::forget("setting_{$key}");
        Cache::forget("settings_group_{$group}");

        return $setting;
    }

    public static function clearCache()
    {
        Cache::flush();
    }

    // Boot method to clear cache on save/delete
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($setting) {
            Cache::forget("setting_{$setting->key}");
            Cache::forget("settings_group_{$setting->group}");
        });

        static::deleted(function ($setting) {
            Cache::forget("setting_{$setting->key}");
            Cache::forget("settings_group_{$setting->group}");
        });
    }
}
