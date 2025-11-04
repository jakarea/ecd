@extends('layouts.app')

@section('title', __('Privacy Policy'))

@section('content')
    <x-hero-section
        pageId="privacy"
        :title="__('Privacy Policy')"
        bgImage="assets/img/bg-hero.png"
    />

    <section class="py-16 md:py-20">
        <div class="container mx-auto max-w-4xl">
            <div class="prose prose-lg max-w-none">
                <h1 class="text-3xl md:text-4xl font-bold text-[var(--color-heading)] mb-8">{{ __('Privacy Policy') }}</h1>

                <p class="text-[var(--color-text)] mb-6">
                    {{ __('privacy_intro') }}
                </p>

                <div class="space-y-8">
                    <!-- Information We Collect -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Information We Collect') }}</h2>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_info_collect') }}</p>

                        <h3 class="text-xl font-semibold text-[var(--color-heading)] mt-6 mb-3">{{ __('Personal Information:') }}</h3>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li>{{ __('Name and contact details') }}</li>
                            <li>{{ __('Address') }}</li>
                            <li>{{ __('Phone number (WhatsApp)') }}</li>
                            <li>{{ __('Vehicle information (license plate, number of cars)') }}</li>
                            <li>{{ __('Preferred service date') }}</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-[var(--color-heading)] mt-6 mb-3">{{ __('Automatically Collected Information:') }}</h3>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li>{{ __('IP address') }}</li>
                            <li>{{ __('Browser type and version') }}</li>
                            <li>{{ __('Device information') }}</li>
                            <li>{{ __('Pages visited and time spent') }}</li>
                            <li>{{ __('Referral source') }}</li>
                        </ul>
                    </div>

                    <!-- How We Use Your Information -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('How We Use Your Information') }}</h2>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li>{{ __('To provide and deliver car detailing services') }}</li>
                            <li>{{ __('To communicate with you about your booking') }}</li>
                            <li>{{ __('To improve our website and services') }}</li>
                            <li>{{ __('To send you marketing communications (with your consent)') }}</li>
                            <li>{{ __('To analyze website usage and performance') }}</li>
                            <li>{{ __('To comply with legal obligations') }}</li>
                        </ul>
                    </div>

                    <!-- Cookies and Tracking -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Cookies and Tracking Technologies') }}</h2>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_cookies_intro') }}</p>

                        <h3 class="text-xl font-semibold text-[var(--color-heading)] mt-6 mb-3">{{ __('Necessary Cookies') }}</h3>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_necessary_cookies') }}</p>

                        <h3 class="text-xl font-semibold text-[var(--color-heading)] mt-6 mb-3">{{ __('Analytics Cookies') }}</h3>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_analytics_cookies') }}</p>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li><strong>Google Analytics:</strong> {{ __('Tracks website usage and performance') }}</li>
                            <li><strong>Google Tag Manager:</strong> {{ __('Manages tracking codes') }}</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-[var(--color-heading)] mt-6 mb-3">{{ __('Marketing Cookies') }}</h3>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_marketing_cookies') }}</p>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li><strong>Facebook Pixel:</strong> {{ __('For advertising and retargeting') }}</li>
                        </ul>

                        <p class="text-[var(--color-text)] mt-4">
                            {{ __('privacy_manage_cookies') }}
                        </p>
                    </div>

                    <!-- Third-Party Services -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Third-Party Services') }}</h2>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_third_party_intro') }}</p>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li><strong>Google Analytics:</strong> <a href="https://policies.google.com/privacy" target="_blank" class="text-[var(--color-brand)] hover:underline">{{ __('Privacy Policy') }}</a></li>
                            <li><strong>Google Tag Manager:</strong> <a href="https://policies.google.com/privacy" target="_blank" class="text-[var(--color-brand)] hover:underline">{{ __('Privacy Policy') }}</a></li>
                            <li><strong>Facebook:</strong> <a href="https://www.facebook.com/privacy/explanation" target="_blank" class="text-[var(--color-brand)] hover:underline">{{ __('Privacy Policy') }}</a></li>
                            <li><strong>YouTube:</strong> <a href="https://policies.google.com/privacy" target="_blank" class="text-[var(--color-brand)] hover:underline">{{ __('Privacy Policy') }}</a></li>
                        </ul>
                    </div>

                    <!-- Your Rights (GDPR) -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Your Rights Under GDPR') }}</h2>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_gdpr_intro') }}</p>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li><strong>{{ __('Right to Access:') }}</strong> {{ __('Request a copy of your personal data') }}</li>
                            <li><strong>{{ __('Right to Rectification:') }}</strong> {{ __('Correct inaccurate or incomplete data') }}</li>
                            <li><strong>{{ __('Right to Erasure:') }}</strong> {{ __('Request deletion of your data') }}</li>
                            <li><strong>{{ __('Right to Restriction:') }}</strong> {{ __('Limit how we use your data') }}</li>
                            <li><strong>{{ __('Right to Data Portability:') }}</strong> {{ __('Receive your data in a structured format') }}</li>
                            <li><strong>{{ __('Right to Object:') }}</strong> {{ __('Object to processing of your data') }}</li>
                            <li><strong>{{ __('Right to Withdraw Consent:') }}</strong> {{ __('Withdraw consent at any time') }}</li>
                        </ul>
                    </div>

                    <!-- Data Retention -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Data Retention') }}</h2>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_retention') }}</p>
                        <ul class="list-disc pl-6 text-[var(--color-text)] space-y-2">
                            <li>{{ __('Booking information: 7 years (tax requirements)') }}</li>
                            <li>{{ __('Marketing consent: Until withdrawn') }}</li>
                            <li>{{ __('Website analytics: 26 months (Google Analytics default)') }}</li>
                            <li>{{ __('Cookie consent: 1 year') }}</li>
                        </ul>
                    </div>

                    <!-- Data Security -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Data Security') }}</h2>
                        <p class="text-[var(--color-text)]">{{ __('privacy_security') }}</p>
                    </div>

                    <!-- Children's Privacy -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Children\'s Privacy') }}</h2>
                        <p class="text-[var(--color-text)]">{{ __('privacy_children') }}</p>
                    </div>

                    <!-- Changes to Policy -->
                    <div>
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Changes to This Privacy Policy') }}</h2>
                        <p class="text-[var(--color-text)]">{{ __('privacy_changes') }}</p>
                    </div>

                    <!-- Contact -->
                    <div class="bg-gray-50 p-6 rounded-lg mt-8">
                        <h2 class="text-2xl font-bold text-[var(--color-heading)] mb-4">{{ __('Contact Us') }}</h2>
                        <p class="text-[var(--color-text)] mb-4">{{ __('privacy_contact_intro') }}</p>

                        @php
                            $contactEmail = \App\Models\Setting::get('contact_email');
                            $contactPhone = \App\Models\Setting::get('contact_phone');
                            $contactAddress = \App\Models\Setting::get('contact_address');
                        @endphp

                        <div class="space-y-2 text-[var(--color-text)]">
                            <p><strong>{{ __('Email:') }}</strong>
                                @if($contactEmail)
                                    <a href="mailto:{{ $contactEmail }}" class="text-[var(--color-brand)] hover:underline">{{ $contactEmail }}</a>
                                @endif
                            </p>
                            @if($contactPhone)
                                <p><strong>{{ __('Phone:') }}</strong> {{ $contactPhone }}</p>
                            @endif
                            @if($contactAddress)
                                <p><strong>{{ __('Address:') }}</strong> {{ $contactAddress }}</p>
                            @endif
                        </div>

                        <p class="text-[var(--color-text)] mt-4">
                            <strong>{{ __('Last Updated:') }}</strong> {{ date('F d, Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
