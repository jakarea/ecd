<section class="py-8 md:pt-25">
    <div class="container">
        {{-- Mobile Pricing Cards (Visible on mobile only) --}}
        <div class="lg:hidden">
            <h3 class="text-black font-medium text-[20px] mb-6 text-center">
                {{ __('Choose Your Plan') }}
            </h3>
            <div class="flex items-center justify-center mb-6">
                <div class="flex items-center border border-[#D1D7DF] rounded-[60px] p-1.5">
                    <button data-type="single" class="mobile-pricing-opt bg-[var(--color-brand)] text-white text-base font-bold rounded-[60px] py-2 px-4 text-center uppercase inline-block cursor-pointer">{{ __('Single') }}</button>
                    <button data-type="monthly" class="mobile-pricing-opt text-[#8D8D8D] text-base font-bold rounded-[60px] py-2 px-4 text-center uppercase inline-block cursor-pointer">{{ __('Monthly') }}</button>
                </div>
            </div>

            {{-- Regular Card --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
                <div class="bg-[#003868] p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-[35px] h-[35px] bg-white rounded-[13px] flex justify-center items-center">
                            <svg width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_425_15641)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6697 1.93946C14.1018 0.380531 11.8983 0.380531 11.3304 1.93946L8.75361 9.02339L1.66968 11.6002C0.110756 12.168 0.110756 14.3716 1.66968 14.9395L8.75361 17.5162L11.3304 24.6002C11.8983 26.1591 14.1018 26.1591 14.6697 24.6002L17.2465 17.5162L24.3304 14.9395C25.8893 14.3716 25.8893 12.168 24.3304 11.6002L17.2465 9.02339L14.6697 1.93946Z" fill="#003868"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_425_15641">
                                        <rect width="25" height="25" fill="white" transform="translate(0.5 0.769775)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="text-[22px] font-medium text-white">{{ __('Regular Subscription') }}</h3>
                    </div>
                    <div class="mobile-price text-[36px] font-extrabold text-white" data-monthly="€79,95" data-single="€55">€55</div>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#003868] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Light vacuuming / Quick vacuum') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#003868] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Door jambs cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#003868] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Dashboard wiping') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#003868] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Streak-free window cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#003868] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Vacuuming (General/Thorough)') }}</span>
                        </li>
                    </ul>
                    <a href="{{ route('book-now', ['locale' => app()->getLocale()]) }}?package=Regular%20Subscription%20-%20%E2%82%AC55" class="mt-6 w-full bg-[#003868] text-white text-center py-3 rounded-lg font-semibold block hover:opacity-90 transition">
                        {{ __('Choose Regular') }}
                    </a>
                </div>
            </div>

            {{-- Premium Card --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
                <div class="bg-[var(--color-brand)] p-6 relative">
                    <div class="absolute top-4 right-4 bg-white text-[var(--color-brand)] text-xs font-bold px-3 py-1 rounded-full">
                        {{ __('Most Popular') }}
                    </div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-[35px] h-[35px] bg-white rounded-[13px] flex justify-center items-center">
                            <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_706_5175)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6697 3.93946C14.1018 2.38053 11.8983 2.38053 11.3304 3.93946L8.75361 11.0234L1.66968 13.6002C0.110756 14.168 0.110756 16.3716 1.66968 16.9395L8.75361 19.5162L11.3304 26.6002C11.8983 28.1591 14.1018 28.1591 14.6697 26.6002L17.2465 19.5162L24.3304 16.9395C25.8893 16.3716 25.8893 14.168 24.3304 13.6002L17.2465 11.0234L14.6697 3.93946Z" fill="#6ADBD9"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_706_5175">
                                        <rect width="25" height="25" fill="white" transform="translate(0.5 2.76978)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="text-[22px] font-medium text-white">{{ __('Premium Subscription') }}</h3>
                    </div>
                    <div class="mobile-price text-[36px] font-extrabold text-white" data-single="€84,45" data-monthly="€149,95">€84,45</div>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--color-brand)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('All Regular features plus:') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--color-brand)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Dashboard cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--color-brand)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Door panel cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--color-brand)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Compartment and cubby cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--color-brand)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Cleaning and conditioning of plastic parts') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--color-brand)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Floor mat treatment / Mat cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[var(--color-brand)] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Air freshener of choice') }}</span>
                        </li>
                    </ul>
                    <a href="{{ route('book-now', ['locale' => app()->getLocale()]) }}?package=Premium%20Subscription%20-%20%E2%82%AC84.45" class="mt-6 w-full bg-[var(--color-brand)] text-white text-center py-3 rounded-lg font-semibold block hover:opacity-90 transition">
                        {{ __('Choose Premium') }}
                    </a>
                </div>
            </div>

            {{-- Platinum Card --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-[#CBA328] p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-[35px] h-[35px] bg-white rounded-[13px] flex justify-center items-center">
                            <svg width="20" height="20" viewBox="0 0 31 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_707_5176)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6697 5.93946C15.1018 4.38053 12.8983 4.38053 12.3304 5.93946L9.75361 13.0234L2.66968 15.6002C1.11076 16.168 1.11076 18.3716 2.66968 18.9395L9.75361 21.5162L12.3304 28.6002C12.8983 30.1591 15.1018 30.1591 15.6697 28.6002L18.2465 21.5162L25.3304 18.9395C26.8893 18.3716 26.8893 16.168 25.3304 15.6002L18.2465 13.0234L15.6697 5.93946Z" fill="#CBA328"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_707_5176">
                                        <rect width="25" height="25" fill="white" transform="translate(1.5 4.76978)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="text-[22px] font-medium text-white">{{ __('Platinum Subscription') }}</h3>
                    </div>
                    <div class="mobile-price text-[36px] font-extrabold text-white" data-single="€274,45" data-monthly="€289,95">€274,45</div>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#CBA328] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('All Premium features plus:') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#CBA328] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Leather / fabric upholstery cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#CBA328] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Steam cleaning') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#CBA328] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Perfume of choice') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#CBA328] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">{{ __('Thorough wash rims') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#CBA328] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700 font-semibold">{{ __('Ceramic coating') }}</span>
                        </li>
                    </ul>
                    <a href="{{ route('book-now', ['locale' => app()->getLocale()]) }}?package=Platinum%20Subscription%20-%20%E2%82%AC274.45" class="mt-6 w-full bg-[#CBA328] text-white text-center py-3 rounded-lg font-semibold block hover:opacity-90 transition">
                        {{ __('Choose Platinum') }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Desktop Pricing Table (Hidden on mobile) --}}
        <div class="overflow-x-auto hidden lg:block">
            <div class="table w-full min-w-[980px]">
                <div class="table-header-group">
                    <div class="tr flex">
                        <div class="td max-w-[398px] w-full py-5 flex flex-col justify-center h-[206px]">
                            <h3 class="text-black font-medium text-[20px] whitespace-nowrap flex items-center gap-3">

                                <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.66485 2.66921C6.31132 2.66921 5.97228 2.80964 5.7223 3.05963C5.47232 3.30961 5.33188 3.64865 5.33188 4.00218C5.33188 4.3557 5.47232 4.69475 5.7223 4.94473C5.97228 5.19471 6.31132 5.33515 6.66485 5.33515C7.01837 5.33515 7.35742 5.19471 7.6074 4.94473C7.85738 4.69475 7.99782 4.3557 7.99782 4.00218C7.99782 3.64865 7.85738 3.30961 7.6074 3.05963C7.35742 2.80964 7.01837 2.66921 6.66485 2.66921ZM2.89254 2.66921C3.16794 1.88871 3.67865 1.21285 4.35428 0.734787C5.02991 0.256724 5.83719 0 6.66485 0C7.49251 0 8.29979 0.256724 8.97542 0.734787C9.65105 1.21285 10.1618 1.88871 10.4372 2.66921H19.9945C20.3481 2.66921 20.6871 2.80964 20.9371 3.05963C21.1871 3.30961 21.3275 3.64865 21.3275 4.00218C21.3275 4.3557 21.1871 4.69475 20.9371 4.94473C20.6871 5.19471 20.3481 5.33515 19.9945 5.33515H10.4372C10.1618 6.11565 9.65105 6.79151 8.97542 7.26957C8.29979 7.74763 7.49251 8.00436 6.66485 8.00436C5.83719 8.00436 5.02991 7.74763 4.35428 7.26957C3.67865 6.79151 3.16794 6.11565 2.89254 5.33515H1.33297C0.979444 5.33515 0.640398 5.19471 0.390418 4.94473C0.140438 4.69475 0 4.3557 0 4.00218C0 3.64865 0.140438 3.30961 0.390418 3.05963C0.640398 2.80964 0.979444 2.66921 1.33297 2.66921H2.89254ZM6.66485 18.6649C6.31132 18.6649 5.97228 18.8053 5.7223 19.0553C5.47232 19.3052 5.33188 19.6443 5.33188 19.9978C5.33188 20.3513 5.47232 20.6904 5.7223 20.9404C5.97228 21.1904 6.31132 21.3308 6.66485 21.3308C7.01837 21.3308 7.35742 21.1904 7.6074 20.9404C7.85738 20.6904 7.99782 20.3513 7.99782 19.9978C7.99782 19.6443 7.85738 19.3052 7.6074 19.0553C7.35742 18.8053 7.01837 18.6649 6.66485 18.6649ZM2.89254 18.6649C3.16794 17.8844 3.67865 17.2085 4.35428 16.7304C5.02991 16.2524 5.83719 15.9956 6.66485 15.9956C7.49251 15.9956 8.29979 16.2524 8.97542 16.7304C9.65105 17.2085 10.1618 17.8844 10.4372 18.6649H19.9945C20.3481 18.6649 20.6871 18.8053 20.9371 19.0553C21.1871 19.3052 21.3275 19.6443 21.3275 19.9978C21.3275 20.3513 21.1871 20.6904 20.9371 20.9404C20.6871 21.1904 20.3481 21.3308 19.9945 21.3308H10.4372C10.1618 22.1113 9.65105 22.7872 8.97542 23.2652C8.29979 23.7433 7.49251 24 6.66485 24C5.83719 24 5.02991 23.7433 4.35428 23.2652C3.67865 22.7872 3.16794 22.1113 2.89254 21.3308H1.33297C0.979444 21.3308 0.640398 21.1904 0.390418 20.9404C0.140438 20.6904 0 20.3513 0 19.9978C0 19.6443 0.140438 19.3052 0.390418 19.0553C0.640398 18.8053 0.979444 18.6649 1.33297 18.6649H2.89254Z"
                                        fill="#3ACBC6" />
                                    <path
                                        d="M14.6633 11.1309C15.0168 11.1309 15.3558 11.2713 15.6058 11.5213C15.8558 11.7713 15.9962 12.1103 15.9962 12.4638C15.9962 12.8174 15.8558 13.1564 15.6058 13.4064C15.3558 13.6564 15.0168 13.7968 14.6633 13.7968C14.3098 13.7968 13.9707 13.6564 13.7207 13.4064C13.4707 13.1564 13.3303 12.8174 13.3303 12.4638C13.3303 12.1103 13.4707 11.7713 13.7207 11.5213C13.9707 11.2713 14.3098 11.1309 14.6633 11.1309ZM18.4356 11.1309C18.1602 10.3504 17.6495 9.67452 16.9738 9.19646C16.2982 8.71839 15.4909 8.46167 14.6633 8.46167C13.8356 8.46167 13.0283 8.71839 12.3527 9.19646C11.6771 9.67452 11.1664 10.3504 10.891 11.1309H1.33358C0.980051 11.1309 0.641005 11.2713 0.391026 11.5213C0.141045 11.7713 0.000606537 12.1103 0.000606537 12.4638C0.000606537 12.8174 0.141045 13.1564 0.391026 13.4064C0.641005 13.6564 0.980051 13.7968 1.33358 13.7968H10.891C11.1664 14.5773 11.6771 15.2532 12.3527 15.7312C13.0283 16.2093 13.8356 16.466 14.6633 16.466C15.4909 16.466 16.2982 16.2093 16.9738 15.7312C17.6495 15.2532 18.1602 14.5773 18.4356 13.7968H19.9952C20.3487 13.7968 20.6877 13.6564 20.9377 13.4064C21.1877 13.1564 21.3281 12.8174 21.3281 12.4638C21.3281 12.1103 21.1877 11.7713 20.9377 11.5213C20.6877 11.2713 20.3487 11.1309 19.9952 11.1309H18.4356Z"
                                        fill="#3ACBC6" fill-opacity="0.6" />
                                </svg>

                                {{ __('Compare our plans') }}
                            </h3>
                            <div class="flex items-center mt-[35px]">
                                <div class="flex items-center border border-[#D1D7DF] rounded-[60px] p-1.5">
                                    <button data-type="single"
                                        class="pricing-opt bg-[var(--color-brand)] text-white text-base font-bold rounded-[60px] py-2.5 px-6 text-center uppercase inline-block cursor-pointer">{{ __('Single') }}</button>
                                    <button data-type="monthly"
                                        class="pricing-opt text-[#8D8D8D] text-base font-bold rounded-[60px] py-2.5 px-6 text-center uppercase inline-block cursor-pointer">{{ __('Monthly') }}</button>
                                </div>

                            </div>
                        </div>
                        <div class="td max-w-[267.33px] w-full p-5 bg-[#003868] rounded-tl-[16px]">
                            <div class="pricing-card-header flex flex-col gap-4">
                                <div class="w-[35px] h-[35px] bg-white rounded-[13px] flex justify-center items-center">
                                    <svg width="20" height="20" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_425_15641)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14.6697 1.93946C14.1018 0.380531 11.8983 0.380531 11.3304 1.93946L8.75361 9.02339L1.66968 11.6002C0.110756 12.168 0.110756 14.3716 1.66968 14.9395L8.75361 17.5162L11.3304 24.6002C11.8983 26.1591 14.1018 26.1591 14.6697 24.6002L17.2465 17.5162L24.3304 14.9395C25.8893 14.3716 25.8893 12.168 24.3304 11.6002L17.2465 9.02339L14.6697 1.93946Z"
                                                fill="#003868" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_425_15641">
                                                <rect width="25" height="25" fill="white"
                                                    transform="translate(0.5 0.769775)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="text-[22px] font-medium text-white tracking-[-0.44px]">{{ __('Regular
                                    Subscription') }}</h3>
                                <span class="price text-[36px] font-extrabold text-white" data-monthly="€79,95"
                                    data-single="€55">€55</span>
                            </div>
                        </div>
                        <div class="td max-w-[267.33px] w-full p-5 bg-[var(--color-brand)]">
                            <div class="pricing-card-header flex flex-col gap-4">
                                <div class="w-[35px] h-[35px] bg-white rounded-[13px] flex justify-center items-center">
                                    <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_706_5175)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14.6697 3.93946C14.1018 2.38053 11.8983 2.38053 11.3304 3.93946L8.75361 11.0234L1.66968 13.6002C0.110756 14.168 0.110756 16.3716 1.66968 16.9395L8.75361 19.5162L11.3304 26.6002C11.8983 28.1591 14.1018 28.1591 14.6697 26.6002L17.2465 19.5162L24.3304 16.9395C25.8893 16.3716 25.8893 14.168 24.3304 13.6002L17.2465 11.0234L14.6697 3.93946Z"
                                                fill="#6ADBD9" />
                                        </g>
                                        <g clip-path="url(#clip1_706_5175)">
                                            <path
                                                d="M18.0905 5.17814L21.079 4.09028L22.1662 1.10243C22.1911 1.03398 22.2365 0.974858 22.2962 0.933081C22.3558 0.891305 22.4269 0.868896 22.4997 0.868896C22.5726 0.868896 22.6437 0.891305 22.7033 0.933081C22.763 0.974858 22.8084 1.03398 22.8333 1.10243L23.9212 4.091L26.9097 5.17814C26.9782 5.20307 27.0373 5.24844 27.0791 5.30812C27.1209 5.36779 27.1433 5.43887 27.1433 5.51171C27.1433 5.58456 27.1209 5.65563 27.0791 5.71531C27.0373 5.77498 26.9782 5.82036 26.9097 5.84528L23.9205 6.93314L22.8333 9.92171C22.8084 9.99016 22.763 10.0493 22.7033 10.0911C22.6437 10.1328 22.5726 10.1552 22.4997 10.1552C22.4269 10.1552 22.3558 10.1328 22.2962 10.0911C22.2365 10.0493 22.1911 9.99016 22.1662 9.92171L21.0783 6.93243L18.0905 5.84528C18.022 5.82036 17.9629 5.77498 17.9211 5.71531C17.8793 5.65563 17.8569 5.58456 17.8569 5.51171C17.8569 5.43887 17.8793 5.36779 17.9211 5.30812C17.9629 5.24844 18.022 5.20307 18.0905 5.17814Z"
                                                fill="#6ADBD9" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_706_5175">
                                                <rect width="25" height="25" fill="white"
                                                    transform="translate(0.5 2.76978)" />
                                            </clipPath>
                                            <clipPath id="clip1_706_5175">
                                                <rect width="10" height="10" fill="white"
                                                    transform="translate(17.5 0.511719)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="text-[22px] font-medium text-white tracking-[-0.44px]">{{ __('Premium
                                    Subscription') }}</h3>
                                <span class="price text-[36px] font-extrabold text-white" data-single="€84,45"
                                    data-monthly="€149,95">€84,45</span>
                            </div>
                        </div>
                        {{-- #FDF6E4 --}}
                        <div class="td max-w-[267.33px] w-full p-5 bg-[#CBA328]">
                            <div class="pricing-card-header flex flex-col gap-4">
                                <div class="w-[35px] h-[35px] bg-white rounded-[13px] flex justify-center items-center">
                                    <svg width="20" height="20" viewBox="0 0 31 34" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_707_5176)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.6697 5.93946C15.1018 4.38053 12.8983 4.38053 12.3304 5.93946L9.75361 13.0234L2.66968 15.6002C1.11076 16.168 1.11076 18.3716 2.66968 18.9395L9.75361 21.5162L12.3304 28.6002C12.8983 30.1591 15.1018 30.1591 15.6697 28.6002L18.2465 21.5162L25.3304 18.9395C26.8893 18.3716 26.8893 16.168 25.3304 15.6002L18.2465 13.0234L15.6697 5.93946Z"
                                                fill="#CBA328" />
                                        </g>
                                        <g clip-path="url(#clip1_707_5176)">
                                            <path
                                                d="M19.2089 6.11152L22.7952 4.80609L24.0998 1.22067C24.1297 1.13853 24.1842 1.06758 24.2558 1.01745C24.3274 0.96732 24.4127 0.94043 24.5001 0.94043C24.5875 0.94043 24.6728 0.96732 24.7444 1.01745C24.816 1.06758 24.8705 1.13853 24.9004 1.22067L26.2058 4.80695L29.7921 6.11152C29.8742 6.14143 29.9452 6.19589 29.9953 6.26749C30.0454 6.3391 30.0723 6.4244 30.0723 6.51181C30.0723 6.59922 30.0454 6.68452 29.9953 6.75612C29.9452 6.82773 29.8742 6.88218 29.7921 6.91209L26.2049 8.21752L24.9004 11.8038C24.8705 11.8859 24.816 11.9569 24.7444 12.007C24.6728 12.0572 24.5875 12.084 24.5001 12.084C24.4127 12.084 24.3274 12.0572 24.2558 12.007C24.1842 11.9569 24.1297 11.8859 24.0998 11.8038L22.7944 8.21667L19.2089 6.91209C19.1268 6.88218 19.0559 6.82773 19.0057 6.75612C18.9556 6.68452 18.9287 6.59922 18.9287 6.51181C18.9287 6.4244 18.9556 6.3391 19.0057 6.26749C19.0559 6.19589 19.1268 6.14143 19.2089 6.11152Z"
                                                fill="#CBA328" />
                                        </g>
                                        <g clip-path="url(#clip2_707_5176)">
                                            <path
                                                d="M0.913471 26.2665L3.00547 25.505L3.76647 23.4135C3.78392 23.3656 3.81568 23.3242 3.85745 23.2949C3.89922 23.2657 3.94898 23.25 3.99997 23.25C4.05096 23.25 4.10072 23.2657 4.14249 23.2949C4.18426 23.3242 4.21602 23.3656 4.23347 23.4135L4.99497 25.5055L7.08697 26.2665C7.13488 26.2839 7.17627 26.3157 7.20551 26.3575C7.23476 26.3992 7.25044 26.449 7.25044 26.5C7.25044 26.551 7.23476 26.6007 7.20551 26.6425C7.17627 26.6843 7.13488 26.716 7.08697 26.7335L4.99447 27.495L4.23347 29.587C4.21602 29.6349 4.18426 29.6763 4.14249 29.7055C4.10072 29.7348 4.05096 29.7504 3.99997 29.7504C3.94898 29.7504 3.89922 29.7348 3.85745 29.7055C3.81568 29.6763 3.78392 29.6349 3.76647 29.587L3.00497 27.4945L0.913471 26.7335C0.865558 26.716 0.824173 26.6843 0.794929 26.6425C0.765686 26.6007 0.75 26.551 0.75 26.5C0.75 26.449 0.765686 26.3992 0.794929 26.3575C0.824173 26.3157 0.865558 26.2839 0.913471 26.2665Z"
                                                fill="#CBA328" />
                                        </g>
                                        <g clip-path="url(#clip3_707_5176)">
                                            <path
                                                d="M18.8545 30.7999L20.6476 30.1472L21.2999 28.3545C21.3149 28.3134 21.3421 28.2779 21.3779 28.2529C21.4137 28.2278 21.4563 28.2144 21.5 28.2144C21.5438 28.2144 21.5864 28.2278 21.6222 28.2529C21.658 28.2779 21.6852 28.3134 21.7002 28.3545L22.3529 30.1476L24.146 30.7999C24.1871 30.8149 24.2226 30.8421 24.2477 30.8779C24.2727 30.9137 24.2862 30.9563 24.2862 31C24.2862 31.0438 24.2727 31.0864 24.2477 31.1222C24.2226 31.158 24.1871 31.1852 24.146 31.2002L22.3525 31.8529L21.7002 33.646C21.6852 33.6871 21.658 33.7226 21.6222 33.7477C21.5864 33.7727 21.5438 33.7862 21.5 33.7862C21.4563 33.7862 21.4137 33.7727 21.3779 33.7477C21.3421 33.7226 21.3149 33.6871 21.2999 33.646L20.6472 31.8525L18.8545 31.2002C18.8134 31.1852 18.7779 31.158 18.7529 31.1222C18.7278 31.0864 18.7144 31.0438 18.7144 31C18.7144 30.9563 18.7278 30.9137 18.7529 30.8779C18.7779 30.8421 18.8134 30.8149 18.8545 30.7999Z"
                                                fill="#CBA328" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_707_5176">
                                                <rect width="25" height="25" fill="white"
                                                    transform="translate(1.5 4.76978)" />
                                            </clipPath>
                                            <clipPath id="clip1_707_5176">
                                                <rect width="12" height="12" fill="white"
                                                    transform="translate(18.5 0.511719)" />
                                            </clipPath>
                                            <clipPath id="clip2_707_5176">
                                                <rect width="7" height="7" fill="white" transform="translate(0.5 23)" />
                                            </clipPath>
                                            <clipPath id="clip3_707_5176">
                                                <rect width="6" height="6" fill="white"
                                                    transform="translate(18.5 28)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="text-[22px] font-medium text-white tracking-[-0.44px]">{{ __('Platinum
                                    Subscription') }}</h3>
                                <span class="price text-[36px] font-extrabold text-white" data-single="€274,45"
                                    data-monthly="€289,95">€274,45</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbody">
                    <div class="tr flex border-l border-t border-b border-[#CBD6E9] rounded-tl-[16px]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Discount') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">{{ __('10% discount per
                                treatment') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">{{ __('15% discount per
                                treatment') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">{{ __('20% discount per
                                treatment') }}</span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Service') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center">
                            <span
                                class="text-[16px] text-[var(--color-text)] text-left font-sf">{{ __('1x per month') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center">
                            <span
                                class="text-[16px] text-[var(--color-text)] text-left font-sf">{{ __('2x per month') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span
                                class="text-[16px] text-[var(--color-text)] text-left font-sf">{{ __('4x per month') }}</span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Weekly') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">-</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">{{ __('Every other
                                week') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">{{ __('Weekly') }}</span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9] bg-[#F6F9FF]">
                        <div class="td max-w-[398px] w-full py-2 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[18px] font-bold text-[var(--color-text)] font-sf uppercase">{{ __('Interior') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                    </div>

                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Light vacuuming / Quick vacuum') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Door jambs cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Dashboard wiping / Dashboard dusting') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Streak-free window cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Vacuuming (General/Thorough)') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Dashboard cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Door panel cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Compartment and cubby cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Cleaning and conditioning of plastic parts') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Floor mat treatment / Mat cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Air freshener of choice / Scent selection') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Leather / fabric upholstery cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Steam cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>


                    <div class="tr flex border-l border-b border-[#CBD6E9] bg-[#F6F9FF]">
                        <div class="td max-w-[398px] w-full py-2 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[18px] font-bold text-[var(--color-heading)] font-sf uppercase">{{ __('Exterior') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Wheel detailing') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Foam wash') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Details treating') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Tire dressing') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Details cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Paint sealant') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Engine bay cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Undercarriage cleaning') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Hybrid Ceramic') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('6-month coating') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                -
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="tr flex border-l border-b border-[#CBD6E9] bg-[#F6F9FF]">
                        <div class="td max-w-[398px] w-full py-2 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[18px] font-bold text-[var(--color-heading)] font-sf uppercase">{{ __('Extra') }}</span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                        <div class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf"></span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span
                                class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Perfume of choice') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-[#CBA328]">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="tr flex border-l border-b border-[#CBD6E9]">
                        <div class="td max-w-[398px] w-full py-5 px-[30px] border-r border-[#CBD6E9]">
                            <span class="text-[16px] text-[var(--color-heading)] font-sf">{{ __('Choice of one extra
                                option') }}</span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBD6E9] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">

                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.667 0.5C5.98128 0.5 0.666992 5.81429 0.666992 12.5C0.666992 19.1857 5.98128 24.5 12.667 24.5C19.3527 24.5 24.667 19.1857 24.667 12.5C24.667 5.81429 19.3527 0.5 12.667 0.5ZM17.2956 18.5L12.667 13.8714L8.03842 18.5L6.66699 17.1286L11.2956 12.5L6.66699 7.87143L8.03842 6.5L12.667 11.1286L17.2956 6.5L18.667 7.87143L14.0384 12.5L18.667 17.1286L17.2956 18.5Z"
                                        fill="#FF383C" />
                                </svg>

                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] border-r border-[#CBA328] text-center flex justify-center items-center">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">

                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.667 0.5C5.98128 0.5 0.666992 5.81429 0.666992 12.5C0.666992 19.1857 5.98128 24.5 12.667 24.5C19.3527 24.5 24.667 19.1857 24.667 12.5C24.667 5.81429 19.3527 0.5 12.667 0.5ZM17.2956 18.5L12.667 13.8714L8.03842 18.5L6.66699 17.1286L11.2956 12.5L6.66699 7.87143L8.03842 6.5L12.667 11.1286L17.2956 6.5L18.667 7.87143L14.0384 12.5L18.667 17.1286L17.2956 18.5Z"
                                        fill="#FF383C" />
                                </svg>

                            </span>
                        </div>
                        <div
                            class="td max-w-[267.33px] w-full py-5 px-[30px] text-center flex justify-center items-center bg-[#CBA32810] border-r border-b border-[#CBA328] ">
                            <span class="text-[16px] text-[var(--color-text)] font-sf">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12.667" cy="12.4999" rx="12" ry="12.0001" fill="#34C759" />
                                    <path
                                        d="M10.7052 14.6448L8.12057 12.0602L7.01074 13.17L10.7052 16.8645L18.3241 9.24557L17.2142 8.13574L10.7052 14.6448Z"
                                        fill="white" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Desktop pricing buttons
        const buttons = document.querySelectorAll('.pricing-opt');

        // Mobile pricing buttons
        const mobileButtons = document.querySelectorAll('.mobile-pricing-opt');

        function updatePrices(type) {
            // Update desktop prices
            const allPrices = document.querySelectorAll('.price');
            allPrices.forEach(priceEl => {
                const newPrice = priceEl.dataset[type];
                if (newPrice) {
                    priceEl.textContent = newPrice;
                }
            });

            // Update mobile prices
            const mobilePrices = document.querySelectorAll('.mobile-price');
            mobilePrices.forEach(priceEl => {
                const newPrice = priceEl.dataset[type];
                if (newPrice) {
                    priceEl.textContent = newPrice;
                }
            });
        }

        function setActive(button, isMobile = false) {
            const selector = isMobile ? '.mobile-pricing-opt' : '.pricing-opt';
            const allBtns = document.querySelectorAll(selector);

            allBtns.forEach(btn => {
                btn.classList.remove('bg-[var(--color-brand)]', 'text-white');
                btn.classList.add('text-[#8D8D8D]');
            });

            button.classList.add('bg-[var(--color-brand)]', 'text-white');
            button.classList.remove('text-[#8D8D8D]');
        }

        // Desktop buttons event listeners
        buttons.forEach(button => {
            button.addEventListener('click', function () {
                setActive(this, false);
                const selectedType = this.dataset.type;
                updatePrices(selectedType);
            });
        });

        // Mobile buttons event listeners
        mobileButtons.forEach(button => {
            button.addEventListener('click', function () {
                setActive(this, true);
                const selectedType = this.dataset.type;
                updatePrices(selectedType);
            });
        });

        // ✅ Detect which button is already active (via class in HTML) - Desktop
        const defaultBtn = [...buttons].find(btn => btn.classList.contains('bg-[var(--color-brand)]'));

        if (defaultBtn) {
            // Only call updatePrices — don't re-style
            const selectedType = defaultBtn.dataset.type;
            updatePrices(selectedType);
        }

        // ✅ Detect which button is already active (via class in HTML) - Mobile
        const defaultMobileBtn = [...mobileButtons].find(btn => btn.classList.contains('bg-[var(--color-brand)]'));

        if (defaultMobileBtn) {
            // Only call updatePrices — don't re-style
            const selectedType = defaultMobileBtn.dataset.type;
            updatePrices(selectedType);
        }
    });
</script>