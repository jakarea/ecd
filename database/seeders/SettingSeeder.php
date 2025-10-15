<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Social Media Links
            [
                'key' => 'facebook_url',
                'value' => '',
                'group' => 'social',
                'description' => 'Facebook page URL',
                'is_active' => true,
            ],
            [
                'key' => 'linkedin_url',
                'value' => '',
                'group' => 'social',
                'description' => 'LinkedIn profile URL',
                'is_active' => true,
            ],
            [
                'key' => 'twitter_url',
                'value' => '',
                'group' => 'social',
                'description' => 'Twitter/X profile URL',
                'is_active' => true,
            ],
            [
                'key' => 'instagram_url',
                'value' => '',
                'group' => 'social',
                'description' => 'Instagram profile URL',
                'is_active' => true,
            ],
            [
                'key' => 'youtube_url',
                'value' => '',
                'group' => 'social',
                'description' => 'YouTube channel URL',
                'is_active' => true,
            ],

            // Contact Information
            [
                'key' => 'contact_phone',
                'value' => '',
                'group' => 'contact',
                'description' => 'Contact phone number (will be used for WhatsApp)',
                'is_active' => true,
            ],
            [
                'key' => 'contact_email',
                'value' => '',
                'group' => 'contact',
                'description' => 'Contact email address',
                'is_active' => true,
            ],
            [
                'key' => 'contact_address',
                'value' => '',
                'group' => 'contact',
                'description' => 'Contact address',
                'is_active' => true,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
