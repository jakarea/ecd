@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    {{-- Hero Section --}}
    <x-hero-section pageId="home" />

    {{-- Home About --}}
    @include('partials.home-about')

    {{-- Working steps --}}
    @include('partials.working-steps')
    @include('partials.home-pricing')
    @include('partials.benefits')
    @include('partials.showcase')
    @include('partials.cta')
    @include('partials.testimonials')


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const heroModal = document.getElementById('heroModal');
    if (!heroModal) return;

    const step1 = heroModal.querySelector('.step-1');
    const step2 = heroModal.querySelector('.step-2');
    const nextBtn = heroModal.querySelector('#nextStepBtn');
    const backBtn = heroModal.querySelector('#backToStep1');
    const heroBookingForm = document.getElementById('heroBookingForm');
    const selectedInfo = heroModal.querySelector('#selectedInfo');
    const formPlanName = heroModal.querySelector('#formPlanName');
    const formPlanPrice = heroModal.querySelector('#formPlanPrice');
    const packageDisplayName = heroModal.querySelector('#packageDisplayName');
    const packageDisplayPrice = heroModal.querySelector('#packageDisplayPrice');

    let selectedCard = null;
    let selectedPricingType = 'single';

    // Function to switch between steps
    function goToStep(step) {
        if (step === 1) {
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
        } else {
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
            const firstFocusable = step2.querySelector('input, button, select, textarea, a[href]');
            if (firstFocusable) {
                firstFocusable.focus();
            }
        }
    }

    // Next button click
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            if (!selectedCard) return;

            const name = selectedCard.dataset.planName || '—';
            const priceKey = selectedPricingType === 'single' ? 'planPriceSingle' : 'planPriceMonthly';
            const price = selectedCard.dataset[priceKey] || '—';
            const pricingLabel = selectedPricingType === 'single' ? 'Single' : 'Monthly';

            if (formPlanName) formPlanName.value = `${name} - ${pricingLabel}`;
            if (formPlanPrice) formPlanPrice.value = price;
            if (packageDisplayName) packageDisplayName.textContent = `${name} - ${pricingLabel}`;
            if (packageDisplayPrice) packageDisplayPrice.textContent = price;

            goToStep(2);
        });
    }

    // Back button click
    if (backBtn) {
        backBtn.addEventListener('click', () => {
            goToStep(1);
        });
    }

    // Handle pricing card selection
    heroModal.querySelectorAll('.pricing-card').forEach(card => {
        card.addEventListener('click', () => {
            if (selectedCard) {
                selectedCard.classList.remove('border-[#34C759]');
            }
            selectedCard = card;
            selectedCard.classList.add('border-[#34C759]');
            if(nextBtn) nextBtn.disabled = false;
        });
    });

    // Form submission
    if (heroBookingForm) {
        heroBookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('heroBookingForm submission started.');

            const form = this;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('#bookNowBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const spinner = submitBtn.querySelector('.spinner');
            const formMessage = heroModal.querySelector('#formMessage');

            // Disable button and show spinner
            if(submitBtn) submitBtn.disabled = true;
            if(btnText) btnText.classList.add('hidden');
            if(spinner) spinner.classList.remove('hidden');
            if(formMessage) formMessage.classList.add('hidden');

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response data:', data);
                if (data.success) {
                    form.reset();
                    form.classList.add('hidden');
                    if(formMessage) {
                        formMessage.innerHTML = `<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">${data.message}</div>`;
                        formMessage.classList.remove('hidden');
                    }
                    setTimeout(() => {
                        if (typeof closeHeroModal === 'function') {
                            closeHeroModal();
                        }
                    }, 5000);
                } else {
                    let errorMessage = 'Something went wrong. Please try again.';
                    if (data && data.message) {
                        errorMessage = data.message;
                    }
                    if(formMessage) {
                        formMessage.innerHTML = `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">${errorMessage}</div>`;
                        formMessage.classList.remove('hidden');
                    }
                }
            })
            .catch(error => {
                console.error('Error during form submission:', error);
                if(formMessage) {
                    formMessage.innerHTML = `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">An unexpected error occurred. Please try again.</div>`;
                    formMessage.classList.remove('hidden');
                }
            })
            .finally(() => {
                console.log('Form submission finished.');
                if(submitBtn) submitBtn.disabled = false;
                if(btnText) btnText.classList.remove('hidden');
                if(spinner) spinner.classList.add('hidden');
            });
        });
    }
});
</script>
@endpush