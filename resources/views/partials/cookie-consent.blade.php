{{-- Cookie Consent Banner - GDPR/CCPA Compliant --}}
<div id="cookie-consent-banner" class="cookie-consent-banner" style="display: none;">
    <div class="cookie-consent-container">
        <div class="cookie-consent-content">
            <h3 class="cookie-consent-title">{{ __('We value your privacy') }}</h3>
            <p class="cookie-consent-text">
                {{ __('We use cookies to improve your experience, analyze site traffic, and personalize content. You can choose which cookies to accept.') }}
                <a href="/{{ app()->getLocale() }}/privacy" class="cookie-consent-link">{{ __('Learn more') }}</a>
            </p>
        </div>
        <div class="cookie-consent-buttons">
            <button id="cookie-accept-all" class="cookie-btn cookie-btn-accept">
                {{ __('Accept All') }}
            </button>
            <button id="cookie-accept-necessary" class="cookie-btn cookie-btn-necessary">
                {{ __('Necessary Only') }}
            </button>
            <button id="cookie-settings" class="cookie-btn cookie-btn-settings">
                {{ __('Settings') }}
            </button>
        </div>
    </div>
</div>

{{-- Cookie Settings Modal --}}
<div id="cookie-settings-modal" class="cookie-modal" style="display: none;">
    <div class="cookie-modal-content">
        <div class="cookie-modal-header">
            <h2>{{ __('Cookie Settings') }}</h2>
            <button id="cookie-modal-close" class="cookie-modal-close" aria-label="{{ __('Close cookie settings') }}">&times;</button>
        </div>
        <div class="cookie-modal-body">
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <label class="cookie-switch">
                        <input type="checkbox" id="cookie-necessary" checked disabled>
                        <span class="cookie-slider"></span>
                    </label>
                    <h3>{{ __('Necessary Cookies') }} <span class="cookie-required">{{ __('(Required)') }}</span></h3>
                </div>
                <p class="cookie-category-desc">
                    {{ __('Essential cookies for the website to function properly. These cannot be disabled.') }}
                </p>
            </div>

            <div class="cookie-category">
                <div class="cookie-category-header">
                    <label class="cookie-switch">
                        <input type="checkbox" id="cookie-analytics">
                        <span class="cookie-slider"></span>
                    </label>
                    <h3>{{ __('Analytics Cookies') }}</h3>
                </div>
                <p class="cookie-category-desc">
                    {{ __('Help us understand how visitors use our website through Google Analytics and Tag Manager.') }}
                </p>
            </div>

            <div class="cookie-category">
                <div class="cookie-category-header">
                    <label class="cookie-switch">
                        <input type="checkbox" id="cookie-marketing">
                        <span class="cookie-slider"></span>
                    </label>
                    <h3>{{ __('Marketing Cookies') }}</h3>
                </div>
                <p class="cookie-category-desc">
                    {{ __('Used to track visitors across websites for advertising purposes (Facebook Pixel).') }}
                </p>
            </div>
        </div>
        <div class="cookie-modal-footer">
            <button id="cookie-save-settings" class="cookie-btn cookie-btn-accept">
                {{ __('Save Settings') }}
            </button>
            <button id="cookie-accept-all-modal" class="cookie-btn cookie-btn-secondary">
                {{ __('Accept All') }}
            </button>
        </div>
    </div>
</div>

<style>
    /* Cookie Consent Banner */
    .cookie-consent-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(10px);
        color: white;
        padding: 20px;
        z-index: 9999;
        box-shadow: 0 -2px 20px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
        from { transform: translateY(100%); }
        to { transform: translateY(0); }
    }

    .cookie-consent-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        flex-wrap: wrap;
    }

    .cookie-consent-content {
        flex: 1;
        min-width: 300px;
    }

    .cookie-consent-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 8px 0;
        color: white;
    }

    .cookie-consent-text {
        font-size: 14px;
        line-height: 1.6;
        margin: 0;
        color: rgba(255, 255, 255, 0.9);
    }

    .cookie-consent-link {
        color: var(--color-brand, #00d4aa);
        text-decoration: underline;
        margin-left: 4px;
    }

    .cookie-consent-link:hover {
        color: var(--color-brand-light, #00ffcc);
    }

    .cookie-consent-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .cookie-btn {
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .cookie-btn-accept {
        background: var(--color-brand, #00d4aa);
        color: white;
    }

    .cookie-btn-accept:hover {
        background: var(--color-brand-dark, #00b894);
        transform: translateY(-1px);
    }

    .cookie-btn-necessary {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .cookie-btn-necessary:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .cookie-btn-settings {
        background: transparent;
        color: white;
        text-decoration: underline;
    }

    .cookie-btn-settings:hover {
        color: var(--color-brand, #00d4aa);
    }

    /* Cookie Settings Modal */
    .cookie-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        animation: fadeIn 0.2s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .cookie-modal-content {
        background: white;
        border-radius: 12px;
        max-width: 600px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from { transform: scale(0.9) translateY(20px); opacity: 0; }
        to { transform: scale(1) translateY(0); opacity: 1; }
    }

    .cookie-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 24px;
        border-bottom: 1px solid #eee;
    }

    .cookie-modal-header h2 {
        margin: 0;
        font-size: 24px;
        color: #333;
    }

    .cookie-modal-close {
        background: none;
        border: none;
        font-size: 32px;
        color: #999;
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s;
    }

    .cookie-modal-close:hover {
        background: #f0f0f0;
        color: #333;
    }

    .cookie-modal-body {
        padding: 24px;
    }

    .cookie-category {
        margin-bottom: 24px;
        padding-bottom: 24px;
        border-bottom: 1px solid #eee;
    }

    .cookie-category:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .cookie-category-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 8px;
    }

    .cookie-category-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    .cookie-required {
        font-size: 12px;
        color: #999;
        font-weight: normal;
    }

    .cookie-category-desc {
        margin: 0;
        font-size: 14px;
        color: #666;
        line-height: 1.6;
        padding-left: 52px;
    }

    /* Toggle Switch */
    .cookie-switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }

    .cookie-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .cookie-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.3s;
        border-radius: 24px;
    }

    .cookie-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }

    input:checked + .cookie-slider {
        background-color: var(--color-brand, #00d4aa);
    }

    input:checked + .cookie-slider:before {
        transform: translateX(20px);
    }

    input:disabled + .cookie-slider {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .cookie-modal-footer {
        padding: 24px;
        border-top: 1px solid #eee;
        display: flex;
        gap: 12px;
        justify-content: flex-end;
    }

    .cookie-btn-secondary {
        background: #f0f0f0;
        color: #333;
    }

    .cookie-btn-secondary:hover {
        background: #e0e0e0;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .cookie-consent-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .cookie-consent-buttons {
            width: 100%;
        }

        .cookie-btn {
            flex: 1;
            min-width: 0;
        }

        .cookie-category-desc {
            padding-left: 0;
            margin-top: 8px;
        }

        .cookie-modal-footer {
            flex-direction: column;
        }

        .cookie-modal-footer .cookie-btn {
            width: 100%;
        }
    }
</style>

<script>
(function() {
    'use strict';

    const COOKIE_NAME = 'cookie_consent';
    const COOKIE_EXPIRY_DAYS = 365;

    // Check if consent already given
    const consent = getCookie(COOKIE_NAME);

    if (!consent) {
        // Show banner after a short delay
        setTimeout(() => {
            document.getElementById('cookie-consent-banner').style.display = 'block';
        }, 1000);
    } else {
        // Load tracking scripts based on consent
        loadTrackingScripts(JSON.parse(consent));
    }

    // Event listeners
    document.getElementById('cookie-accept-all')?.addEventListener('click', function() {
        acceptAll();
    });

    document.getElementById('cookie-accept-necessary')?.addEventListener('click', function() {
        acceptNecessary();
    });

    document.getElementById('cookie-settings')?.addEventListener('click', function() {
        showSettings();
    });

    document.getElementById('cookie-modal-close')?.addEventListener('click', function() {
        hideSettings();
    });

    document.getElementById('cookie-save-settings')?.addEventListener('click', function() {
        saveSettings();
    });

    document.getElementById('cookie-accept-all-modal')?.addEventListener('click', function() {
        acceptAll();
        hideSettings();
    });

    // Functions
    function acceptAll() {
        const consent = {
            necessary: true,
            analytics: true,
            marketing: true
        };
        saveConsent(consent);
        hideBanner();
        loadTrackingScripts(consent);
    }

    function acceptNecessary() {
        const consent = {
            necessary: true,
            analytics: false,
            marketing: false
        };
        saveConsent(consent);
        hideBanner();
    }

    function showSettings() {
        document.getElementById('cookie-settings-modal').style.display = 'flex';
    }

    function hideSettings() {
        document.getElementById('cookie-settings-modal').style.display = 'none';
    }

    function saveSettings() {
        const consent = {
            necessary: true,
            analytics: document.getElementById('cookie-analytics').checked,
            marketing: document.getElementById('cookie-marketing').checked
        };
        saveConsent(consent);
        hideBanner();
        hideSettings();
        loadTrackingScripts(consent);
    }

    function saveConsent(consent) {
        setCookie(COOKIE_NAME, JSON.stringify(consent), COOKIE_EXPIRY_DAYS);
    }

    function hideBanner() {
        const banner = document.getElementById('cookie-consent-banner');
        banner.style.animation = 'slideDown 0.3s ease-out';
        setTimeout(() => {
            banner.style.display = 'none';
        }, 300);
    }

    function loadTrackingScripts(consent) {
        // Dispatch event for tracking codes to listen to
        window.dispatchEvent(new CustomEvent('cookieConsentGiven', {
            detail: consent
        }));

        // Store consent globally for tracking codes to check
        window.cookieConsent = consent;
    }

    // Cookie helper functions
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/;SameSite=Lax";
    }

    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
})();
</script>

<style>
@keyframes slideDown {
    from { transform: translateY(0); }
    to { transform: translateY(100%); }
}
</style>
