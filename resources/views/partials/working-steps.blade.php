    @php
    $workingSteps = [
        [
            'step' => '01',
            'icon' => 'assets/img/step-1.png',
            'title' => __('Book Online'),
            'description' => __('Schedule your service in just a few clicks—fast, easy, and hassle-free'),
        ],
        [
            'step' => '02',
            'icon' => 'assets/img/step-2.png',
            'title' => __('We come to you'),
            'description' => __('Our team arrives at your location, fully equipped and ready to get to work.'),
        ],
        [
            'step' => '03',
            'icon' => 'assets/img/step-3.png',
            'title' => __('Enjoy the shine'),
            'description' => __('Sit back, relax, and admire your spotless, sparkling results.'),
        ],
    ];
@endphp

<section class="py-12">
    <div class="container">
        <x-section-heading pretitle="{{ __('How it works') }}" title="{{ __('Sparkling clean in 3 easy steps') }}"
            description="{{ __('Our team of trained specialists uses advanced techniques, industry-grade products, and eco-friendly solutions to deliver exceptional results—whether it’s a quick wash, deep interior cleaning, or full detailing service.') }}"
            width="max-w-[900px]">
            <x-slot name="icon">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.2044 13.3933L4.9432 11.3037C4.80172 11.2492 4.6685 11.1839 4.54356 11.1078C4.41862 11.0316 4.29608 10.9499 4.17593 10.8629L2.23325 11.6791L0.4375 8.57738L2.11898 7.30403C2.10809 7.22784 2.10265 7.15449 2.10265 7.08397V6.64319C2.10265 6.57223 2.10809 6.49866 2.11898 6.42248L0.4375 5.14913L2.23325 2.04738L4.17593 2.86363C4.29564 2.77656 4.4208 2.69494 4.5514 2.61875C4.682 2.54257 4.8126 2.47727 4.9432 2.42285L5.2044 0.333252H8.7959L9.0571 2.42285C9.19858 2.47727 9.33201 2.54257 9.45739 2.61875C9.58276 2.69494 9.70509 2.77656 9.82438 2.86363L11.767 2.04738L13.5628 5.14913L11.8813 6.42248C11.8922 6.49866 11.8976 6.57223 11.8976 6.64319V7.08331C11.8976 7.15427 11.8868 7.22784 11.865 7.30403L13.5465 8.57738L11.7507 11.6791L9.82438 10.8629C9.70466 10.9499 9.5795 11.0316 9.4489 11.1078C9.3183 11.1839 9.1877 11.2492 9.0571 11.3037L8.7959 13.3933H5.2044ZM7.0328 9.14875C7.66403 9.14875 8.20276 8.92564 8.64897 8.47943C9.09519 8.03321 9.3183 7.49449 9.3183 6.86325C9.3183 6.23202 9.09519 5.69329 8.64897 5.24708C8.20276 4.80086 7.66403 4.57775 7.0328 4.57775C6.39068 4.57775 5.84913 4.80086 5.40814 5.24708C4.96714 5.69329 4.74686 6.23202 4.7473 6.86325C4.74774 7.49449 4.96823 8.03321 5.40879 8.47943C5.84935 8.92564 6.39068 9.14875 7.0328 9.14875Z"
                        fill="#124846" />
                </svg>
            </x-slot>
        </x-section-heading>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-20">
            <div
                class="flex flex-col items-center text-center bg-[var(--color-black)] rounded-[16px] pt-[60px] pb-[10px] px-[10px] relative">
                <div class="max-w-[284px] w-full relative mb-10">
                    <span
                        class="text-[50px] font-black text-[#6ADBD926] block absolute left-0 top-[-30px] w-full ">01</span>
                    <h4 class="text-[28px] font-semibold text-white mb-4">{{ __('Book online') }}</h4>
                    <p class="text-sm leading-[1.5] text-[#787878]">{{ __('Schedule your service in just a few clicks—fast, easy, and hassle-free') }}</p>
                </div>
                <img src="{{ asset('assets/img/step-1.png') }}" alt="step-1" class="h-[253px] object-cover block">
                <div
                    class="absolute bottom-[-35px] md:top-[50%] md:translate-y-[-50%] md:right-[-35px] md:translate-x-none w-[70px] h-[70px] p-2 bg-[#303030] flex items-center justify-center rounded-full z-9">
                    <div
                        class="w-[37px] h-[37px] bg-[var(--color-brand)] rounded-full flex items-center justify-center">

                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="rotate-90 md:rotate-0">
                            <path
                                d="M15.1465 5.86334H0.8535M15.1465 5.86334L10.1989 0.915771M15.1465 5.86334L10.1989 10.8109"
                                stroke="white" stroke-width="1.64919" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                </div>
            </div>

            <div
                class="flex flex-col items-center text-center bg-[var(--color-black)] rounded-[16px] pt-[60px] pb-[10px] px-[10px] relative">
                <div class="max-w-[284px] w-full relative mb-10">
                    <span
                        class="text-[50px] font-black text-[#6ADBD926] block absolute left-0 top-[-30px] w-full ">02</span>
                    <h4 class="text-[28px] font-semibold text-white mb-4">{{ __('We come to you') }}</h4>
                    <p class="text-sm leading-[1.5] text-[#787878]">{{ __('Our team arrives at your location, fully equipped and ready to get to work.') }}</p>
                </div>
                <img src="{{ asset('assets/img/step-2.png') }}" alt="step-1" class="h-[253px] object-cover block">
                <div
                    class="absolute bottom-[-35px] md:top-[50%] md:translate-y-[-50%] md:right-[-35px] md:translate-x-none w-[70px] h-[70px] p-2 bg-[#303030] flex items-center justify-center rounded-full z-9">
                    <div
                        class="w-[37px] h-[37px] bg-[var(--color-brand)] rounded-full flex items-center justify-center">

                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="rotate-90 md:rotate-0">
                            <path
                                d="M15.1465 5.86334H0.8535M15.1465 5.86334L10.1989 0.915771M15.1465 5.86334L10.1989 10.8109"
                                stroke="white" stroke-width="1.64919" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                </div>
            </div>
            <div
                class="flex flex-col items-center text-center bg-[var(--color-black)] rounded-[16px] pt-[60px] pb-[10px] px-[10px]">
                <div class="max-w-[284px] w-full relative mb-10">
                    <span
                        class="text-[50px] font-black text-[#6ADBD926] block absolute left-0 top-[-30px] w-full ">03</span>
                    <h4 class="text-[28px] font-semibold text-white mb-4">{{ __('Enjoy the shine') }}</h4>
                    <p class="text-sm leading-[1.5] text-[#787878]">{{ __('Sit back, relax, and admire your spotless, sparkling results.') }}</p>
                </div>
                <img src="{{ asset('assets/img/step-3.png') }}" alt="step-1" class="h-[253px] object-cover block">
            </div>
        </div>
    </div>
</section>