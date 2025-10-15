{{-- reCAPTCHA Script --}}
@if(config('services.recaptcha.site_key'))
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endif

<div class="modal" id="heroModal">
    <div class="modal-content relative max-h-[90vh] overflow-y-auto">
        <div class="close-modal bg-white w-[28px] h-[28px] rounded-full flex items-center justify-center absolute top-[-14px] right-[-14px] cursor-pointer z-10"
            onClick="closeHeroModal()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="#EA6216"
                    d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z" />
                <path fill="#EA6216"
                    d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l.001-.001l-3.855 3.855l-3.855-3.855A1.091 1.091 0 0 0 6.6 8.145l-.001-.001l3.855 3.855l-3.855 3.855a1.091 1.091 0 1 0 1.541 1.542l.001-.001l3.855-3.855l3.855 3.855a1.091 1.091 0 1 0 1.542-1.541l-.001-.001z" />
            </svg>
        </div>

        {{-- Success/Error Messages --}}
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
            @csrf
            {{-- Hidden fields for selected package --}}
            <input type="hidden" name="package_name" id="formPlanName">
            <input type="hidden" name="package_price" id="formPlanPrice">
            <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">

            {{-- Step 1: Select Package --}}
            <div class="step-1">
                <div class="flex items-center gap-4 px-5 py-5 border border-[#C8CEDD] rounded-[16px] mb-6">
                    <div class="w-[50px] h-[50px] rounded-[16px] bg-[#E7F1FF] flex items-center justify-center flex-shrink-0">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.37473 0.8125C7.62337 0.8125 7.86182 0.911272 8.03764 1.08709C8.21345 1.2629 8.31223 1.50136 8.31223 1.75V2.06625C8.74139 2.06292 9.20764 2.06167 9.71098 2.0625H16.2885C16.7918 2.0625 17.2581 2.06375 17.6872 2.06625V1.75C17.6872 1.50136 17.786 1.2629 17.9618 1.08709C18.1376 0.911272 18.3761 0.8125 18.6247 0.8125C18.8734 0.8125 19.1118 0.911272 19.2876 1.08709C19.4635 1.2629 19.5622 1.50136 19.5622 1.75V2.12625C19.5772 2.12625 19.5918 2.1275 19.606 2.13C20.4935 2.1975 21.2422 2.34125 21.926 2.67C23.0316 3.1961 23.9428 4.05791 24.5297 5.1325C24.8885 5.7975 25.0422 6.52375 25.116 7.37375C25.1872 8.20125 25.1872 9.22625 25.1872 10.5112V16.7375C25.1872 18.0238 25.1872 19.05 25.116 19.8762C25.041 20.7262 24.8885 21.4525 24.5297 22.1162C23.943 23.1913 23.0318 24.0536 21.926 24.58C21.2422 24.9088 20.4935 25.0525 19.606 25.12C18.736 25.1875 17.656 25.1875 16.2885 25.1875H9.71223C8.34473 25.1875 7.26473 25.1875 6.39473 25.12C5.50723 25.0512 4.75848 24.9088 4.07473 24.58C2.96911 24.0539 2.05787 23.1921 1.47098 22.1175C1.11223 21.4525 0.958477 20.7262 0.884727 19.8762C0.813477 19.0487 0.813477 18.0238 0.813477 16.7388V10.5125C0.813477 9.22625 0.813477 8.2 0.884727 7.37375C0.959727 6.52375 1.11223 5.7975 1.47098 5.13375C2.05766 4.0587 2.96892 3.19643 4.07473 2.67C4.75848 2.34125 5.50723 2.1975 6.39473 2.13L6.43723 2.125V1.75C6.43723 1.50136 6.536 1.2629 6.71181 1.08709C6.88763 0.911272 7.12609 0.8125 7.37473 0.8125ZM6.43723 4.0075C5.71598 4.07 5.25473 4.1825 4.88723 4.36C4.13774 4.71428 3.51919 5.29609 3.11973 6.0225C2.97723 6.2875 2.87473 6.605 2.80723 7.0625H23.1935C23.1247 6.605 23.0222 6.2875 22.8797 6.02375C22.4808 5.29706 21.8627 4.71483 21.1135 4.36C20.7447 4.1825 20.2835 4.07 19.5622 4.0075V4.25C19.5622 4.49864 19.4635 4.7371 19.2876 4.91291C19.1118 5.08873 18.8734 5.1875 18.6247 5.1875C18.3761 5.1875 18.1376 5.08873 17.9618 4.91291C17.786 4.7371 17.6872 4.49864 17.6872 4.25V3.94125C17.2614 3.93792 16.7822 3.93667 16.2497 3.9375H9.74973C9.21723 3.9375 8.73806 3.93875 8.31223 3.94125V4.25C8.31223 4.49864 8.21345 4.7371 8.03764 4.91291C7.86182 5.08873 7.62337 5.1875 7.37473 5.1875C7.12609 5.1875 6.88763 5.08873 6.71181 4.91291C6.536 4.7371 6.43723 4.49864 6.43723 4.25V4.0075Z" fill="#0088FF" />
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-[20px] md:text-[24px] font-bold text-[var(--color-heading)] leading-[1.4]">Book your service</h4>
                        <p class="text-[14px] md:text-[16px] font-medium text-[var(--color-text)] leading-[1.4] font-sf">
                            For your service, share your details, and we'll take care of the rest.
                        </p>
                    </div>
                </div>

                @include('partials.home-pricing')

                <div id="selectedInfo" class="text-sm text-gray-600 mb-4"></div>

                <div class="flex justify-end gap-3">
                    <button type="button" id="clearSelection"
                        class="px-4 py-3 bg-[#F2F2F7] text-base text-[var(--color-text)] font-medium tracking-[0.02px] rounded-[60px] w-[110px] flex justify-center items-center cursor-pointer">
                        Cancel
                    </button>
                    <button type="button" id="nextStepBtn" disabled
                        class="px-4 py-3 bg-gray-400 text-base text-white font-medium tracking-[0.02px] rounded-[60px] w-[135px] flex justify-center items-center cursor-not-allowed">
                        Next
                    </button>
                </div>
            </div>

            {{-- Step 2: Fill Details --}}
            <div class="step-2 hidden" aria-hidden="true">
                <div class="flex items-center gap-4 px-5 py-5 border border-[#C8CEDD] rounded-[16px] mb-6">
                    <div class="w-[50px] h-[50px] rounded-[16px] bg-[#E7F1FF] flex items-center justify-center flex-shrink-0">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.37473 0.8125C7.62337 0.8125 7.86182 0.911272 8.03764 1.08709C8.21345 1.2629 8.31223 1.50136 8.31223 1.75V2.06625C8.74139 2.06292 9.20764 2.06167 9.71098 2.0625H16.2885C16.7918 2.0625 17.2581 2.06375 17.6872 2.06625V1.75C17.6872 1.50136 17.786 1.2629 17.9618 1.08709C18.1376 0.911272 18.3761 0.8125 18.6247 0.8125C18.8734 0.8125 19.1118 0.911272 19.2876 1.08709C19.4635 1.2629 19.5622 1.50136 19.5622 1.75V2.12625C19.5772 2.12625 19.5918 2.1275 19.606 2.13C20.4935 2.1975 21.2422 2.34125 21.926 2.67C23.0316 3.1961 23.9428 4.05791 24.5297 5.1325C24.8885 5.7975 25.0422 6.52375 25.116 7.37375C25.1872 8.20125 25.1872 9.22625 25.1872 10.5112V16.7375C25.1872 18.0238 25.1872 19.05 25.116 19.8762C25.041 20.7262 24.8885 21.4525 24.5297 22.1162C23.943 23.1913 23.0318 24.0536 21.926 24.58C21.2422 24.9088 20.4935 25.0525 19.606 25.12C18.736 25.1875 17.656 25.1875 16.2885 25.1875H9.71223C8.34473 25.1875 7.26473 25.1875 6.39473 25.12C5.50723 25.0512 4.75848 24.9088 4.07473 24.58C2.96911 24.0539 2.05787 23.1921 1.47098 22.1175C1.11223 21.4525 0.958477 20.7262 0.884727 19.8762C0.813477 19.0487 0.813477 18.0238 0.813477 16.7388V10.5125C0.813477 9.22625 0.813477 8.2 0.884727 7.37375C0.959727 6.52375 1.11223 5.7975 1.47098 5.13375C2.05766 4.0587 2.96892 3.19643 4.07473 2.67C4.75848 2.34125 5.50723 2.1975 6.39473 2.13L6.43723 2.125V1.75C6.43723 1.50136 6.536 1.2629 6.71181 1.08709C6.88763 0.911272 7.12609 0.8125 7.37473 0.8125ZM6.43723 4.0075C5.71598 4.07 5.25473 4.1825 4.88723 4.36C4.13774 4.71428 3.51919 5.29609 3.11973 6.0225C2.97723 6.2875 2.87473 6.605 2.80723 7.0625H23.1935C23.1247 6.605 23.0222 6.2875 22.8797 6.02375C22.4808 5.29706 21.8627 4.71483 21.1135 4.36C20.7447 4.1825 20.2835 4.07 19.5622 4.0075V4.25C19.5622 4.49864 19.4635 4.7371 19.2876 4.91291C19.1118 5.08873 18.8734 5.1875 18.6247 5.1875C18.3761 5.1875 18.1376 5.08873 17.9618 4.91291C17.786 4.7371 17.6872 4.49864 17.6872 4.25V3.94125C17.2614 3.93792 16.7822 3.93667 16.2497 3.9375H9.74973C9.21723 3.9375 8.73806 3.93875 8.31223 3.94125V4.25C8.31223 4.49864 8.21345 4.7371 8.03764 4.91291C7.86182 5.08873 7.62337 5.1875 7.37473 5.1875C7.12609 5.1875 6.88763 5.08873 6.71181 4.91291C6.536 4.7371 6.43723 4.49864 6.43723 4.25V4.0075Z" fill="#0088FF" />
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-[20px] md:text-[24px] font-bold text-[var(--color-heading)] leading-[1.4]">
                            Your Details
                        </h4>
                        <p class="text-[14px] md:text-[16px] font-medium text-[var(--color-text)] leading-[1.4] font-sf">
                            Please provide your information for the booking
                        </p>
                    </div>
                </div>

                {{-- Selected Package Display --}}
                <div id="selectedPackageDisplay" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-semibold text-green-800">Selected Package</span>
                    </div>
                    <div class="text-base font-bold text-green-900" id="packageDisplayName">—</div>
                    <div class="text-sm text-green-700" id="packageDisplayPrice">—</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="">
                        <label class="block text-sm md:text-base font-medium text-[var(--color-text)] mb-2">
                            First Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="first_name" required
                            class="block w-full rounded-lg border border-[#AEAEB2] h-10 md:h-12 focus:outline-none focus:border-[#0088FF] px-3 md:px-4 text-sm md:text-base @error('first_name') border-red-500 @enderror"
                            placeholder="Enter first name" value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label class="block text-sm md:text-base font-medium text-[var(--color-text)] mb-2">
                            Last Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="last_name" required
                            class="block w-full rounded-lg border border-[#AEAEB2] h-10 md:h-12 focus:outline-none focus:border-[#0088FF] px-3 md:px-4 text-sm md:text-base @error('last_name') border-red-500 @enderror"
                            placeholder="Enter last name" value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm md:text-base font-medium text-[var(--color-text)] mb-2">
                            Address <span class="text-red-500">*</span>
                        </label>
                        <textarea name="address" required rows="3"
                            class="block w-full rounded-lg border border-[#AEAEB2] focus:outline-none focus:border-[#0088FF] px-3 md:px-4 py-2 text-sm md:text-base @error('address') border-red-500 @enderror"
                            placeholder="Enter your address">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm md:text-base font-medium text-[var(--color-text)] mb-2">
                            Preferred Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="preferred_date" required
                            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                            class="block w-full rounded-lg border border-[#AEAEB2] h-10 md:h-12 focus:outline-none focus:border-[#0088FF] px-3 md:px-4 text-sm md:text-base @error('preferred_date') border-red-500 @enderror"
                            value="{{ old('preferred_date') }}">
                        @error('preferred_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="text-xs text-gray-500 mt-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Protected by reCAPTCHA
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" id="backToStep1"
                        class="px-4 py-3 bg-[#F2F2F7] text-sm md:text-base text-[var(--color-text)] font-medium tracking-[0.02px] rounded-[60px] w-[100px] md:w-[110px] flex justify-center items-center cursor-pointer">
                        Back
                    </button>
                    <button type="submit" id="bookNowBtn"
                        class="px-4 py-3 bg-[var(--color-brand)] text-sm md:text-base text-white font-medium tracking-[0.02px] rounded-[60px] w-[120px] md:w-[135px] flex justify-center items-center cursor-pointer">
                        Book Now
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.modal-content {
    background: white;
    border-radius: 16px;
    max-width: 90vw;
    width: 100%;
    padding: 20px;
    margin: 20px;
}

@media (min-width: 768px) {
    .modal-content {
        max-width: 900px;
        padding: 30px;
    }
}

@media (min-width: 1024px) {
    .modal-content {
        max-width: 1000px;
    }
}
</style>

@push('scripts')
<script>
// reCAPTCHA v3 Integration
@if(config('services.recaptcha.site_key'))
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;

    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'booking'}).then(function(token) {
            document.getElementById('recaptchaResponse').value = token;
            form.submit();
        });
    });
});
@endif

// Modal Management
function openHeroModal() {
    const modal = document.querySelector('#heroModal');
    modal.classList.add('show');
    document.body.classList.add('modal-open');
}

function closeHeroModal() {
    const modal = document.querySelector('#heroModal');
    modal.classList.remove('show');
    document.body.classList.remove('modal-open');
}

document.addEventListener('DOMContentLoaded', function() {
    // Step management
    const step1 = document.querySelector('.step-1');
    const step2 = document.querySelector('.step-2');
    const nextBtn = document.getElementById('nextStepBtn');
    const backBtn = document.getElementById('backToStep1');
    const clearBtn = document.getElementById('clearSelection');
    const selectedInfo = document.getElementById('selectedInfo');

    const formPlanName = document.getElementById('formPlanName');
    const formPlanPrice = document.getElementById('formPlanPrice');

    let selectedCard = null;
    let selectedPricingType = 'single'; // Track if 'single' or 'monthly' is selected

    // Helper functions
    function enableNextBtn() {
        nextBtn.disabled = false;
        nextBtn.classList.remove('cursor-not-allowed', 'bg-gray-400');
        nextBtn.classList.add('bg-[var(--color-brand)]', 'cursor-pointer');
    }

    function disableNextBtn() {
        nextBtn.disabled = true;
        nextBtn.classList.add('cursor-not-allowed', 'bg-gray-400');
        nextBtn.classList.remove('bg-[var(--color-brand)]');
    }

    function setSelected(card) {
        if (selectedCard === card) {
            selectedCard.classList.remove('border-[#34C759]');
            const check = selectedCard.querySelector('.checkmark');
            if (check) check.classList.add('hidden');
            selectedCard = null;
            selectedInfo.textContent = '';
            disableNextBtn();
            return;
        }

        if (selectedCard) {
            selectedCard.classList.remove('border-[#34C759]');
            const prevCheck = selectedCard.querySelector('.checkmark');
            if (prevCheck) prevCheck.classList.add('hidden');
        }

        selectedCard = card;
        selectedCard.classList.add('border-[#34C759]');
        const check = selectedCard.querySelector('.checkmark');
        if (check) check.classList.remove('hidden');

        const name = card.dataset.planName || '—';
        // Get the correct price based on selected pricing type
        const priceKey = selectedPricingType === 'single' ? 'planPriceSingle' : 'planPriceMonthly';
        const price = card.dataset[priceKey] || '—';
        const pricingLabel = selectedPricingType === 'single' ? 'Single' : 'Monthly';
        selectedInfo.textContent = `Selected: ${name} - ${price} (${pricingLabel})`;

        enableNextBtn();
    }

    // Detect selected pricing type (single/monthly) from home-pricing buttons
    const detectPricingType = () => {
        const activeBtn = document.querySelector('.pricing-opt.bg-white');
        if (activeBtn) {
            const btnText = activeBtn.textContent.trim().toLowerCase();
            selectedPricingType = btnText; // Will be 'single' or 'monthly'
        }
    };

    // Watch for pricing type changes
    document.querySelectorAll('.pricing-opt').forEach(btn => {
        btn.addEventListener('click', () => {
            setTimeout(detectPricingType, 100); // Small delay to ensure classes updated
            // Update selected info if a card is already selected
            if (selectedCard) {
                const name = selectedCard.dataset.planName || '—';
                const priceKey = selectedPricingType === 'single' ? 'planPriceSingle' : 'planPriceMonthly';
                const price = selectedCard.dataset[priceKey] || '—';
                const pricingLabel = selectedPricingType === 'single' ? 'Single' : 'Monthly';
                selectedInfo.textContent = `Selected: ${name} - ${price} (${pricingLabel})`;
            }
        });
    });

    // Initial detection
    detectPricingType();

    // Pricing card handlers
    document.querySelectorAll('.pricing-card').forEach(card => {
        card.addEventListener('click', () => setSelected(card));
    });

    // Clear button
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            if (selectedCard) {
                selectedCard.classList.remove('border-[#34C759]');
                const check = selectedCard.querySelector('.checkmark');
                if (check) check.classList.add('hidden');
            }
            selectedCard = null;
            selectedInfo.textContent = '';
            disableNextBtn();
            closeHeroModal();
        });
    }

    // Next button
    nextBtn.addEventListener('click', () => {
        if (!selectedCard) return;

        if (formPlanName && formPlanPrice) {
            const name = selectedCard.dataset.planName || '';
            const priceKey = selectedPricingType === 'single' ? 'planPriceSingle' : 'planPriceMonthly';
            const price = selectedCard.dataset[priceKey] || '';
            const pricingLabel = selectedPricingType === 'single' ? 'Single' : 'Monthly';

            formPlanName.value = `${name} - ${pricingLabel}`;
            formPlanPrice.value = price;

            // Update the visual package display in step 2
            const displayName = document.getElementById('packageDisplayName');
            const displayPrice = document.getElementById('packageDisplayPrice');
            if (displayName && displayPrice) {
                displayName.textContent = `${name} - ${pricingLabel}`;
                displayPrice.textContent = price;
            }
        }

        step1.classList.add('hidden');
        step2.classList.remove('hidden');
    });

    // Back button
    if (backBtn) {
        backBtn.addEventListener('click', () => {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
        });
    }

    // Modal close handlers
    document.querySelector('#heroModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeHeroModal();
        }
    });
});
</script>
@endpush
