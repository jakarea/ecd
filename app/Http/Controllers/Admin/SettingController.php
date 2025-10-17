<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $trackingSettings = Setting::byGroup('tracking')->get()->keyBy('key');
        $generalSettings = Setting::byGroup('general')->get()->keyBy('key');
        $socialSettings = Setting::byGroup('social')->get()->keyBy('key');
        $contactSettings = Setting::byGroup('contact')->get()->keyBy('key');

        return view('admin.settings.index', compact('trackingSettings', 'generalSettings', 'socialSettings', 'contactSettings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'fb_pixel_id' => 'nullable|string|max:255',
            'gtm_id' => 'nullable|string|max:255',
            'gtm_noscript' => 'nullable|string',
            'ga4_measurement_id' => 'nullable|string|max:255',
            'fb_pixel_enabled' => 'nullable|boolean',
            'gtm_enabled' => 'nullable|boolean',
            'ga4_enabled' => 'nullable|boolean',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_address' => 'nullable|string|max:500',
            'facebook_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'favicon_path' => 'nullable|image|mimes:ico,png,svg|max:2048',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        // Logo handling logic
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            Setting::set('logo', 'storage/' . $path, 'general', 'Website logo');
        } else if ($request->input('logo_clear')) {
            Setting::set('logo', null, 'general', 'Website logo');
        } else if ($request->input('existing_logo')) {
            Setting::set('logo', $request->input('existing_logo'), 'general', 'Website logo');
        }

        // Favicon handling logic
        if ($request->hasFile('favicon_path')) {
            $path = $request->file('favicon_path')->store('favicons', 'public');
            Setting::set('favicon_path', 'storage/' . $path, 'general', 'Website favicon path');
        } else if ($request->input('favicon_path_clear')) {
            // If a hidden field indicates to clear the favicon
            Setting::set('favicon_path', null, 'general', 'Website favicon path');
        } else if ($request->input('existing_favicon_path')) {
            // If there's an existing favicon and no new one is uploaded, keep the old one
            Setting::set('favicon_path', $request->input('existing_favicon_path'), 'general', 'Website favicon path');
        }

        // Facebook Pixel settings
        Setting::set(
            'fb_pixel_id',
            $request->input('fb_pixel_id'),
            'tracking',
            'Facebook Pixel ID for tracking conversions and events'
        );

        Setting::updateOrCreate(
            ['key' => 'fb_pixel_enabled'],
            [
                'value' => $request->has('fb_pixel_enabled') ? '1' : '0',
                'group' => 'tracking',
                'description' => 'Enable/disable Facebook Pixel tracking',
                'is_active' => true,
            ]
        );

        // Google Tag Manager settings
        Setting::set(
            'gtm_id',
            $request->input('gtm_id'),
            'tracking',
            'Google Tag Manager Container ID (e.g., GTM-XXXXXXX)'
        );

        Setting::updateOrCreate(
            ['key' => 'gtm_enabled'],
            [
                'value' => $request->has('gtm_enabled') ? '1' : '0',
                'group' => 'tracking',
                'description' => 'Enable/disable Google Tag Manager',
                'is_active' => true,
            ]
        );

        // Google Analytics 4 settings
        Setting::set(
            'ga4_measurement_id',
            $request->input('ga4_measurement_id'),
            'tracking',
            'Google Analytics 4 Measurement ID (e.g., G-XXXXXXXXXX)'
        );

        Setting::updateOrCreate(
            ['key' => 'ga4_enabled'],
            [
                'value' => $request->has('ga4_enabled') ? '1' : '0',
                'group' => 'tracking',
                'description' => 'Enable/disable Google Analytics 4',
                'is_active' => true,
            ]
        );

        // Contact Information
        Setting::set(
            'contact_phone',
            $request->input('contact_phone'),
            'contact',
            'Contact phone number (used for WhatsApp)'
        );

        Setting::set(
            'contact_email',
            $request->input('contact_email'),
            'contact',
            'Contact email address'
        );

        Setting::set(
            'contact_address',
            $request->input('contact_address'),
            'contact',
            'Contact address'
        );

        // Social Media Links
        Setting::set(
            'facebook_url',
            $request->input('facebook_url'),
            'social',
            'Facebook page URL'
        );

        Setting::set(
            'linkedin_url',
            $request->input('linkedin_url'),
            'social',
            'LinkedIn profile URL'
        );

        Setting::set(
            'twitter_url',
            $request->input('twitter_url'),
            'social',
            'Twitter/X profile URL'
        );

        Setting::set(
            'instagram_url',
            $request->input('instagram_url'),
            'social',
            'Instagram profile URL'
        );

        Setting::set(
            'youtube_url',
            $request->input('youtube_url'),
            'social',
            'YouTube channel URL'
        );

        // Clear all settings cache
        Setting::clearCache();

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
