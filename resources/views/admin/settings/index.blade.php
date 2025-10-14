@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Settings</h1>
            <p class="text-gray-600 mt-1">Manage tracking codes and site configuration</p>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            {{-- Tracking Settings --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Tracking & Analytics
                </h2>

                {{-- Facebook Pixel --}}
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Facebook Pixel</h3>
                            <p class="text-sm text-gray-600">Track conversions, optimize ads, and build targeted audiences
                                for your advertising campaigns.</p>
                        </div>
                        <label class="flex items-center cursor-pointer ml-4">
                            <input type="checkbox" name="fb_pixel_enabled" value="1"
                                {{ old('fb_pixel_enabled', $trackingSettings->get('fb_pixel_enabled')->value ?? false) ? 'checked' : '' }}
                                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm font-medium text-gray-700">Enable</span>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="fb_pixel_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Facebook Pixel ID
                            </label>
                            <input type="text" name="fb_pixel_id" id="fb_pixel_id"
                                value="{{ old('fb_pixel_id', $trackingSettings->get('fb_pixel_id')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('fb_pixel_id') border-red-500 @enderror"
                                placeholder="123456789012345">
                            <p class="text-xs text-gray-500 mt-1">Find your Pixel ID in Facebook Events Manager</p>
                            @error('fb_pixel_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-medium mb-1">How to find your Facebook Pixel ID:</p>
                                    <ol class="list-decimal list-inside space-y-1 text-xs">
                                        <li>Go to Facebook Events Manager</li>
                                        <li>Select your Pixel</li>
                                        <li>Copy the Pixel ID (15-digit number)</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Google Tag Manager --}}
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Google Tag Manager</h3>
                            <p class="text-sm text-gray-600">Manage all your website tags without editing code. Includes
                                support for Google Analytics, Google Ads, and more.</p>
                        </div>
                        <label class="flex items-center cursor-pointer ml-4">
                            <input type="checkbox" name="gtm_enabled" value="1"
                                {{ old('gtm_enabled', $trackingSettings->get('gtm_enabled')->value ?? false) ? 'checked' : '' }}
                                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm font-medium text-gray-700">Enable</span>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="gtm_id" class="block text-sm font-medium text-gray-700 mb-2">
                                GTM Container ID
                            </label>
                            <input type="text" name="gtm_id" id="gtm_id"
                                value="{{ old('gtm_id', $trackingSettings->get('gtm_id')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('gtm_id') border-red-500 @enderror"
                                placeholder="GTM-XXXXXXX">
                            <p class="text-xs text-gray-500 mt-1">Format: GTM-XXXXXXX</p>
                            @error('gtm_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-medium mb-1">Benefits of Google Tag Manager:</p>
                                    <ul class="list-disc list-inside space-y-1 text-xs">
                                        <li>Manage all tracking codes in one place</li>
                                        <li>Update tags without code deployment</li>
                                        <li>Built-in debugging and preview mode</li>
                                        <li>Version control and rollback capability</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Google Analytics 4 --}}
                <div class="mb-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Google Analytics 4</h3>
                            <p class="text-sm text-gray-600">Track website traffic, user behavior, and conversions with
                                Google's latest analytics platform.</p>
                        </div>
                        <label class="flex items-center cursor-pointer ml-4">
                            <input type="checkbox" name="ga4_enabled" value="1"
                                {{ old('ga4_enabled', $trackingSettings->get('ga4_enabled')->value ?? false) ? 'checked' : '' }}
                                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm font-medium text-gray-700">Enable</span>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="ga4_measurement_id" class="block text-sm font-medium text-gray-700 mb-2">
                                GA4 Measurement ID
                            </label>
                            <input type="text" name="ga4_measurement_id" id="ga4_measurement_id"
                                value="{{ old('ga4_measurement_id', $trackingSettings->get('ga4_measurement_id')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('ga4_measurement_id') border-red-500 @enderror"
                                placeholder="G-XXXXXXXXXX">
                            <p class="text-xs text-gray-500 mt-1">Format: G-XXXXXXXXXX</p>
                            @error('ga4_measurement_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-yellow-600 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm text-yellow-800">
                                    <p class="font-medium">Note: If you're using Google Tag Manager, you can configure GA4
                                        through GTM instead of adding it here directly.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Save Button --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
