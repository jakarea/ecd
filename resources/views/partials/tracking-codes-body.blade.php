@php
    use App\Models\Setting;

    // Get GTM setting for noscript tag
    $gtmEnabled = Setting::get('gtm_enabled', '0') === '1';
    $gtmId = Setting::get('gtm_id');
@endphp

{{-- Google Tag Manager (noscript) - Only loads if consent given --}}
@if($gtmEnabled && $gtmId)
<script>
// Only show GTM noscript if analytics consent given
if (window.cookieConsent && window.cookieConsent.analytics) {
    document.write('<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}" height="0" width="0" style="display:none;visibility:hidden" title="Google Tag Manager"></iframe></noscript>');
}
</script>
@endif
