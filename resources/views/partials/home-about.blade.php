{{-- Home About --}}
@php
    $features = [
        [
            'icon' => 'assets/img/about-icon1.svg',
            'title' => 'Expert Team',
            'description' =>
                'Our skilled professionals bring years of hands-on experience, delivering precise, high-quality results every single time.',
        ],
        [
            'icon' => 'assets/img/about-icon2.svg',
            'title' => 'Premium-Grade Products',
            'description' =>
                'We use only top-tier, industry-approved products to ensure a spotless shine and long-lasting protection for your vehicle.',
        ],
        [
            'icon' => 'assets/img/about-icon3.svg',
            'title' => 'Eco-Friendly Cleaning',
            'description' =>
                'We care about both your car and the planet. That’s why we use eco-friendly solutions that are tough on dirt but gentle on the environment.',
        ],
        [
            'icon' => 'assets/img/about-icon4.svg',
            'title' => 'Service at Your Doorstep',
            'description' =>
                'Skip the hassle of driving to a car wash—our mobile service brings premium car care directly to your home or workplace.',
        ],

        [
            'icon' => 'assets/img/about-icon1.svg',
            'title' => 'Expert Team',
            'description' =>
                'Our skilled professionals bring years of hands-on experience, delivering precise, high-quality results every single time.',
        ],
        [
            'icon' => 'assets/img/about-icon2.svg',
            'title' => 'Premium-Grade Products',
            'description' =>
                'We use only top-tier, industry-approved products to ensure a spotless shine and long-lasting protection for your vehicle.',
        ],
        [
            'icon' => 'assets/img/about-icon3.svg',
            'title' => 'Eco-Friendly Cleaning',
            'description' =>
                'We care about both your car and the planet. That’s why we use eco-friendly solutions that are tough on dirt but gentle on the environment.',
        ],
        [
            'icon' => 'assets/img/about-icon4.svg',
            'title' => 'Service at Your Doorstep',
            'description' =>
                'Skip the hassle of driving to a car wash—our mobile service brings premium car care directly to your home or workplace.',
        ],
    ];
@endphp

<section class="pt-8 md:pt-25 pb-8 md:pb-[50px]">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="w-full md:w-1/2 md:pr-[50px] lg:pr-[100px]">
                <div
                    class="py-2 px-4 inline-flex items-center gap-2 mb-4 text-[var(--color-heading)] bg-[#6ADBD926] rounded-[60px]">

                    <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.50968 14.3632C3.45521 14.3632 3.40009 14.3523 3.34743 14.3296C3.1631 14.2501 3.06341 14.0489 3.11181 13.8541L4.49878 8.27114H0.761729C0.62646 8.27114 0.499886 8.20445 0.423406 8.09286C0.346925 7.98127 0.330383 7.83916 0.379191 7.713L3.12072 0.625418C3.18183 0.467399 3.33381 0.36322 3.50323 0.36322H7.27559C7.41419 0.36322 7.54342 0.43322 7.61916 0.549321C7.69485 0.665422 7.70682 0.811902 7.65093 0.938749L6.02757 4.62358H9.23826C9.38827 4.62358 9.5263 4.70547 9.59821 4.83713C9.67012 4.96876 9.66444 5.12916 9.58336 5.25538L3.85498 14.1747C3.77751 14.2953 3.64577 14.3632 3.50968 14.3632Z"
                            fill="#124846" />
                    </svg>

                    <h3 class="text-[11px] font-semibold uppercase text-[var(--color-heading)]">Super Staff. Super
                        Service.
                    </h3>
                </div>
                <h2 class="text-[32px] font-extrabold mb-8 text-[var(--color-heading)] leading-[1.2] tracking-[0.02px]">
                    Premium car care expert
                    <br />detailing
                    straight to your door
                </h2>
                <p class="text-base leading-[1.5] text-[var(--color-text)] mb-8">
                    We believe every vehicle deserves the highest standard of care. With years of experience in
                    professional car washing and detailing, our mission is to provide a seamless, reliable, and premium
                    service that restores both the look and value of your vehicle. <br />
                    Our team of trained specialists uses advanced techniques, industry-grade products, and eco-friendly
                    solutions to deliver exceptional results—whether it’s a quick wash, deep interior cleaning, or full
                    detailing service.
                </p>
                <div class="inline-flex">
                    <a href="{{ route('about') }}" class="btn-brand"><span>About Us</span>
                        <svg width="25" height="11" viewBox="0 0 25 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 5.5H1M24 5.5L19.5 1M24 5.5L19.5 10" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ asset('assets/img/home-about.webp') }}" alt="About Us"
                    class="w-full max-w-[587px]max-h-[410px] rounded-[16px]">
            </div>
        </div>

        <!-- Swiper Slider -->

        <div class="relative swiper-container">
            <div class="swiper mySwiper mt-10">
                <div class="swiper-wrapper items-stretch">
                    @foreach ($features as $feature)
                        <div class="swiper-slide flex h-[288px]">
                            <div
                                class="flex flex-col justify-between h-full w-full p-8 border border-[#D1D7DF] rounded-[20px] bg-white">
                                <div>
                                    <div class="inline-block mb-6">
                                        <img src="{{ asset($feature['icon']) }}" alt="icon" class="w-10 h-10">
                                    </div>
                                    <h3 class="text-[20px] font-semibold mb-4 text-[var(--color-heading)] leading-[24px]">
                                        {{ $feature['title'] }}
                                    </h3>
                                    <div class="text-base text-[var(--color-text)] leading-[1.5] font-sf">
                                        {{ $feature['description'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>




            </div>
            <!-- Navigation Buttons -->
            <div class="swiper-button-next swiper-btn"></div>
            <div class="swiper-button-prev swiper-btn"></div>
        </div>

    </div>
</section>