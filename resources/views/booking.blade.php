@extends('layouts.app')

@section('title', __('Book Now'))

@section('content')
    <x-hero-section
        pageId="booking"
        title="{{ __('Book Your Service') }}"
        subtitle="{{ __('Schedule your car wash service in just a few clicks') }}"
        :showSocialIcons="false"
    />

    <section class="bg-gray-50 py-16 md:py-24">
        <div class="container">
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                    {{-- Form Header --}}
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-[var(--color-brand)] rounded-2xl mb-4">
                            <svg width="32" height="32" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.37473 0.8125C7.62337 0.8125 7.86182 0.911272 8.03764 1.08709C8.21345 1.2629 8.31223 1.50136 8.31223 1.75V2.06625C8.74139 2.06292 9.20764 2.06167 9.71098 2.0625H16.2885C16.7918 2.0625 17.2581 2.06375 17.6872 2.06625V1.75C17.6872 1.50136 17.786 1.2629 17.9618 1.08709C18.1376 0.911272 18.3761 0.8125 18.6247 0.8125C18.8734 0.8125 19.1118 0.911272 19.2876 1.08709C19.4635 1.2629 19.5622 1.50136 19.5622 1.75V2.12625C19.5772 2.12625 19.5918 2.1275 19.606 2.13C20.4935 2.1975 21.2422 2.34125 21.926 2.67C23.0316 3.1961 23.9428 4.05791 24.5297 5.1325C24.8885 5.7975 25.0422 6.52375 25.116 7.37375C25.1872 8.20125 25.1872 9.22625 25.1872 10.5112V16.7375C25.1872 18.0238 25.1872 19.05 25.116 19.8762C25.041 20.7262 24.8885 21.4525 24.5297 22.1162C23.943 23.1913 23.0318 24.0536 21.926 24.58C21.2422 24.9088 20.4935 25.0525 19.606 25.12C18.736 25.1875 17.656 25.1875 16.2885 25.1875H9.71223C8.34473 25.1875 7.26473 25.1875 6.39473 25.12C5.50723 25.0512 4.75848 24.9088 4.07473 24.58C2.96911 24.0539 2.05787 23.1921 1.47098 22.1175C1.11223 21.4525 0.958477 20.7262 0.884727 19.8762C0.813477 19.0487 0.813477 18.0238 0.813477 16.7388V10.5125C0.813477 9.22625 0.813477 8.2 0.884727 7.37375C0.959727 6.52375 1.11223 5.7975 1.47098 5.13375C2.05766 4.0587 2.96892 3.19643 4.07473 2.67C4.75848 2.34125 5.50723 2.1975 6.39473 2.13L6.43723 2.125V1.75C6.43723 1.50136 6.536 1.2629 6.71181 1.08709C6.88763 0.911272 7.12609 0.8125 7.37473 0.8125ZM6.43723 4.0075C5.71598 4.07 5.25473 4.1825 4.88723 4.36C4.13774 4.71428 3.51919 5.29609 3.11973 6.0225C2.97723 6.2875 2.87473 6.605 2.80723 7.0625H23.1935C23.1247 6.605 23.0222 6.2875 22.8797 6.02375C22.4808 5.29706 21.8627 4.71483 21.1135 4.36C20.7447 4.1825 20.2835 4.07 19.5622 4.0075V4.25C19.5622 4.49864 19.4635 4.7371 19.2876 4.91291C19.1118 5.08873 18.8734 5.1875 18.6247 5.1875C18.3761 5.1875 18.1376 5.08873 17.9618 4.91291C17.786 4.7371 17.6872 4.49864 17.6872 4.25V3.94125C17.2614 3.93792 16.7822 3.93667 16.2497 3.9375H9.74973C9.21723 3.9375 8.73806 3.93875 8.31223 3.94125V4.25C8.31223 4.49864 8.21345 4.7371 8.03764 4.91291C7.86182 5.08873 7.62337 5.1875 7.37473 5.1875C7.12609 5.1875 6.88763 5.08873 6.71181 4.91291C6.536 4.7371 6.43723 4.49864 6.43723 4.25V4.0075Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ __('Book Your Service') }}</h2>
                        <p class="text-gray-600">{{ __('Fill out the form below and we\'ll take care of the rest') }}</p>
                    </div>

                    {{-- Booking Form --}}
                    <form id="bookingPageForm" method="POST" action="{{ route('booking.store', ['locale' => app()->getLocale()]) }}">
                        @csrf

                        {{-- Success/Error Message --}}
                        <div id="pageFormMessage" class="hidden mb-4 p-4 rounded-lg"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('First Name') }}</label>
                                <input type="text" name="first_name" required
                                    class="block w-full rounded-lg border border-gray-300 h-12 focus:outline-none focus:ring-[var(--color-brand)] focus:border-[var(--color-brand)] px-4"
                                    placeholder="{{ __('Enter first name') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Last Name') }}</label>
                                <input type="text" name="last_name" required
                                    class="block w-full rounded-lg border border-gray-300 h-12 focus:outline-none focus:ring-[var(--color-brand)] focus:border-[var(--color-brand)] px-4"
                                    placeholder="{{ __('Enter last name') }}">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Address') }}</label>
                                <textarea name="address" required
                                    class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                                    rows="3" placeholder="{{ __('Your address') }}"></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Number of Cars') }}</label>
                                <input type="number" name="number_of_cars" required
                                    class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                                    placeholder="{{ __('Enter number of cars') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Licence Plate') }}</label>
                                <input type="text" name="licence_plate" required
                                    class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                                    placeholder="{{ __('Enter licence plate') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('WhatsApp Number') }}</label>
                                <input type="text" name="whatsapp" required
                                    class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                                    placeholder="{{ __('Enter WhatsApp number') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Package Choice') }}</label>
                                <select id="pagePackageSelect" name="package" required
                                    class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]">
                                    <option value="">{{ __('Select a package') }}</option>
                                    <option value="Regular Subscription - €55">{{ __('Regular Subscription - €55') }}</option>
                                    <option value="Regular Subscription Monthly - €79,95">
                                        {{ __('Regular Subscription Monthly - €79,95') }}
                                    </option>
                                    <option value="Premium Subscription - €84,45">{{ __('Premium Subscription - €84,45') }}</option>
                                    <option value="Premium Subscription Monthly - €149,95">
                                        {{ __('Premium Subscription Monthly - €149,95') }}
                                    </option>
                                    <option value="Platinum Subscription - €274,45">{{ __('Platinum Subscription - €274,45') }}</option>
                                    <option value="Platinum Subscription Monthly - €289,95">
                                        {{ __('Platinum Subscription Monthly - €289,95') }}
                                    </option>
                                </select>
                                <input type="hidden" name="package_name" id="page_package_name">
                                <input type="hidden" name="package_price" id="page_package_price">
                            </div>

                            <div>
                                <label class="block text-base font-medium text-gray-700 mb-2">{{ __('Preferred Date') }}</label>
                                <input type="date" name="preferred_date" required
                                    class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]">
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="mt-8">
                            <button type="submit" id="pageBookNowBtn"
                                class="w-full inline-flex justify-center px-6 py-4 text-base font-semibold text-white bg-[var(--color-brand)] border border-transparent rounded-lg shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-brand)] transition-all duration-300 cursor-pointer">
                                <span class="btn-text flex items-center justify-center gap-2">
                                    {{ __('Book Now') }}
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                                <span class="btn-spinner hidden flex items-center justify-center">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const bookingForm = document.getElementById('bookingPageForm');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function (e) {
            e.preventDefault();
            console.log('bookingPageForm submission started.');

            const form = this;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('#pageBookNowBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const spinner = submitBtn.querySelector('.btn-spinner');

            // Disable button and show spinner
            if (submitBtn) {
                submitBtn.disabled = true;
            }
            if (btnText) {
                btnText.classList.add('hidden');
            }
            if (spinner) {
                spinner.classList.remove('hidden');
            }

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
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: `${data.message}`,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        customClass: {
                            popup: 'animate-fade-in'
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: `${data.message}`,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        customClass: {
                            popup: 'animate-fade-in'
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error during form submission:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'animate-fade-in'
                    }
                });
            })
            .finally(() => {
                console.log('Form submission finished.');
                // Re-enable button and hide spinner
                if (submitBtn) {
                    submitBtn.disabled = false;
                }
                if (btnText) {
                    btnText.classList.remove('hidden');
                }
                if (spinner) {
                    spinner.classList.add('hidden');
                }
            });
        });
    }

    // Pre-select package if provided in URL
    const urlParams = new URLSearchParams(window.location.search);
    const packageParam = urlParams.get('package');
    if (packageParam) {
        const packageSelect = document.getElementById('pagePackageSelect');
        if (packageSelect) {
            packageSelect.value = packageParam;
        }
    }
});
</script>
@endpush
