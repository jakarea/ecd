@php
    $testimonials = [
        [
            'image' => 'assets/img/testimonial-1.png',
            'name' => 'Theresa Webb',
            'role' => 'CEO, Company XYZ',
            'profile-img' => 'assets/img/profile-1.png',
            'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam...',
        ],
        [
            'image' => 'assets/img/testimonial-1.png',
            'name' => 'Theresa Webb',
            'role' => 'CEO, Company XYZ',
            'profile-img' => 'assets/img/profile-1.png',
            'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam...',
        ],
        [
            'image' => 'assets/img/testimonial-1.png',
            'name' => 'Theresa Webb',
            'role' => 'CEO, Company XYZ',
            'profile-img' => 'assets/img/profile-1.png',
            'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam...',
        ],
    ];
@endphp

<section class="bg-[#F9F9F9] py-16 relative" id="testimonials">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="max-w-[948px] mx-auto text-center mb-12">
            <div
                class="py-2 px-4 inline-flex items-center gap-2 mb-4 bg-[#6ADBD926] rounded-[60px] text-[var(--color-heading)]">
                <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.5 0.137207L0.25 2.47054V5.97054C0.25 9.20804 2.49 12.2355 5.5 12.9705C8.51 12.2355 10.75 9.20804 10.75 5.97054V2.47054L5.5 0.137207ZM7.29667 8.88721L5.5 7.80804L3.70917 8.88721L4.18167 6.84554L2.60083 5.48054L4.68917 5.29971L5.5 3.37471L6.31083 5.29387L8.39917 5.47471L6.81833 6.84554L7.29667 8.88721Z"
                        fill="#124846" />
                </svg>
                <h3 class="text-[11px] font-semibold uppercase">Testimonials</h3>
            </div>
            <h2 class="text-[34px] font-extrabold leading-[1.2] tracking-[0.02px] text-[var(--color-heading)] mb-4">
                Our Reviews
            </h2>
            <p class="text-[16px] text-[var(--color-text)] leading-[1.5]">
                Hear what our satisfied customers have to say!
            </p>
        </div>

        <!-- Swiper Slider -->
        <div class="relative max-w-[705px] mx-auto">
            <div class="swiper testimonialSwiper overflow-visible">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide px-2">
                            <div
                                class="bg-[#6ADBD926] py-8 pr-8 pl-[160px] rounded-[20px] shadow-sm h-full flex flex-col justify-between relative">
                                <div class="flex items-center gap-4">
                                    <div class="absolute top-50% left-[-100px]">
                                        <img src="{{ asset($testimonial['image']) }}" alt="Testimonial"
                                            class="max-w-[225px] w-full h-[296px] object-cover rounded-[12px]">
                                    </div>
                                    <div class="">
                                        <div class="flex items-center gap-4">
                                            <img src="{{ asset($testimonial['profile-img']) }}"
                                                alt="{{ $testimonial['name'] }}"
                                                class="w-12 h-12 rounded-full object-cover">
                                            <div>
                                                <h4 class="text-[16px] font-semibold text-[var(--color-heading)]">
                                                    {{ $testimonial['name'] }}
                                                </h4>
                                                <span
                                                    class="text-sm text-[var(--color-text)]">{{ $testimonial['role'] }}</span>
                                            </div>
                                        </div>
                                        <p class="text-[15px] text-[var(--color-text)] leading-[1.6]">
                                            {{ $testimonial['review'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Swiper Navigation -->
                <div class="swiper-button-prev testimonial-nav left-[-22px] top-1/2 -translate-y-1/2 absolute z-10">
                </div>
                <div class="swiper-button-next testimonial-nav right-[-22px] top-1/2 -translate-y-1/2 absolute z-10">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Make sure slides are same height */
    .testimonialSwiper .swiper-slide {
        height: auto;
        display: flex;
    }

    .testimonialSwiper .swiper-wrapper {
        align-items: stretch;
    }
</style>

<script>
    const swiper = new Swiper('.testimonialSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        dots: true
    });
</script>