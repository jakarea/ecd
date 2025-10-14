@php
    use App\Models\Setting;

    // Get tracking settings
    $fbPixelEnabled = Setting::get('fb_pixel_enabled', '0') === '1';
    $fbPixelId = Setting::get('fb_pixel_id');

    $gtmEnabled = Setting::get('gtm_enabled', '0') === '1';
    $gtmId = Setting::get('gtm_id');

    $ga4Enabled = Setting::get('ga4_enabled', '0') === '1';
    $ga4MeasurementId = Setting::get('ga4_measurement_id');
@endphp

{{-- Google Tag Manager (Head) --}}
@if($gtmEnabled && $gtmId)
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ $gtmId }}');</script>
<!-- End Google Tag Manager -->
@endif

{{-- Facebook Pixel --}}
@if($fbPixelEnabled && $fbPixelId)
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '{{ $fbPixelId }}');
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" style="display:none"
       src="https://www.facebook.com/tr?id={{ $fbPixelId }}&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
@endif

{{-- Google Analytics 4 --}}
@if($ga4Enabled && $ga4MeasurementId)
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $ga4MeasurementId }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{{ $ga4MeasurementId }}');
</script>
<!-- End Google Analytics 4 -->
@endif
