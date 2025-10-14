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

        return view('admin.settings.index', compact('trackingSettings', 'generalSettings'));
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
        ]);

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

        // Clear all settings cache
        Setting::clearCache();

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
