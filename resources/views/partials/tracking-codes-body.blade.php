@php
    use App\Models\Setting;

    // Get GTM setting for noscript tag
    $gtmEnabled = Setting::get('gtm_enabled', '0') === '1';
    $gtmId = Setting::get('gtm_id');
@endphp

{{-- Google Tag Manager (noscript) - Should be placed immediately after opening <body> tag --}}
@if($gtmEnabled && $gtmId)
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@endif
