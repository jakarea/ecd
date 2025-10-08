@php
    $testimonials = [
        [
            'image' => 'assets/img/testimonial-1.png',
            'name' => 'Theresa Webb',
            'role' => 'CEO, Company XYZ',
            'profile_img' => 'assets/img/profile-1.png',
            'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur. Nullam enim sapien, tristique sit amet lorem lacinia, luctus molestie velit. Nam nunc quam, elementum nec neque nec, ullamcorper interdum orci. Sed gravida urna eu sapien maximus molestie. ',
        ],
        [
            'image' => 'assets/img/testimonial-1.png',
            'name' => 'Theresa Webb',
            'role' => 'CEO, Company XYZ',
            'profile_img' => 'assets/img/profile-1.png',
            'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur. Nullam enim sapien, tristique sit amet lorem lacinia, luctus molestie velit. Nam nunc quam, elementum nec neque nec, ullamcorper interdum orci. Sed gravida urna eu sapien maximus molestie. ',
        ],
        [
            'image' => 'assets/img/testimonial-1.png',
            'name' => 'Theresa Webb',
            'role' => 'CEO, Company XYZ',
            'profile_img' => 'assets/img/profile-1.png',
            'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur. Nullam enim sapien, tristique sit amet lorem lacinia, luctus molestie velit. Nam nunc quam, elementum nec neque nec, ullamcorper interdum orci. Sed gravida urna eu sapien maximus molestie. ',
        ],
    ];

    $testimonial = (object) [
        'image' => 'assets/img/testimonial-1.png',
        'name' => 'Theresa Webb',
        'role' => 'CEO, Company XYZ',
        'profile_img' => 'assets/img/profile-1.png',
        'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur. Nullam enim sapien, tristique sit amet lorem lacinia, luctus molestie velit. Nam nunc quam, elementum nec neque nec, ullamcorper interdum orci. Sed gravida urna eu sapien maximus molestie.',
    ];

@endphp

<section class="bg-[#F9F9F9] py-16 relative" id="testimonials">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <x-section-heading pretitle="Testimonials" title="Our Reviews"
            description="Hear what our satisfied customers have to say!." width="max-w-[948px]">
            <x-slot name="icon">
                <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.5 0.137207L0.25 2.47054V5.97054C0.25 9.20804 2.49 12.2355 5.5 12.9705C8.51 12.2355 10.75 9.20804 10.75 5.97054V2.47054L5.5 0.137207ZM7.29667 8.88721L5.5 7.80804L3.70917 8.88721L4.18167 6.84554L2.60083 5.48054L4.68917 5.29971L5.5 3.37471L6.31083 5.29387L8.39917 5.47471L6.81833 6.84554L7.29667 8.88721Z"
                        fill="#124846" />
                </svg>
            </x-slot>
        </x-section-heading>


        <!-- Swiper Slider -->

        {{-- <div class="container mx-auto">
            <div class="w-[794px] mx-auto">
                <div
                    class="bg-[#6ADBD926] w-[705px] h-[342px] py-8 pr-8 pl-[160px] rounded-[20px] shadow-sm flex flex-col justify-between relative ml-[100px]">
                    <div class="flex items-center gap-4">
                        <div class="absolute top-1/2 left-[-100px] -translate-y-1/2">
                            <img src="{{ asset($testimonial->image) }}" alt="Testimonial"
                                class="max-w-[225px] w-full h-[296px] object-cover rounded-[12px]">
                        </div>
                        <div>
                            <div class="flex items-center gap-4 mb-5">
                                <img src="{{ asset($testimonial->profile_img) }}" alt="{{ $testimonial->name }}"
                                    class="w-[62px] h-[62px] rounded-full object-cover border-1 border-[var(--color-brand)] p-1">
                                <div>
                                    <h4 class="text-[18px] font-semibold text-[var(--color-heading)] mb-2">
                                        {{ $testimonial->name }}
                                    </h4>
                                    <span class="text-sm font-medium text-[var(--color-text)]">{{ $testimonial->role
                                        }}</span>
                                </div>
                            </div>
                            <p class="text-[14px] text-[var(--color-text)] 
                             leading-[1.6]">
                                {{ $testimonial->review }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="relative">
            <div class="swiper testimonialSwiper pt-[100px]">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="max-w-[794px] w-full mx-auto">
                                <div
                                    class="bg-[#6ADBD926] w-full max-w-[705px] h-[342px] pt-[120px] pb-[30px] md:py-8 pr-8 pl-6 md:pl-[160px] rounded-[20px] flex flex-col justify-between relative md:ml-[100px]">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="absolute top-0 md:top-1/2 left-6 md:left-[-100px] right-6 md:right-auto -translate-y-1/2 md:-translate-y-1/2">
                                            <img src="{{ asset($testimonial['image']) }}" alt="Testimonial"
                                                class="max-w-full md:max-w-[225px] w-full h-[181px] md:h-[296px] object-cover rounded-[20px]">
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-4 mb-5">
                                                <img src="{{ asset($testimonial['profile_img']) }}"
                                                    alt="{{ $testimonial['name'] }}"
                                                    class="w-[62px] h-[62px] rounded-full object-cover border-1 border-[var(--color-brand)] p-1">
                                                <div>
                                                    <h4 class="text-[18px] font-semibold text-[var(--color-heading)] mb-2">
                                                        {{ $testimonial['name']  }}
                                                    </h4>
                                                    <span
                                                        class="text-sm font-medium text-[var(--color-text)]">{{ $testimonial['role']}}</span>
                                                </div>
                                            </div>
                                            <p class="text-[14px] text-[var(--color-text)] leading-[1.6] font-sf">
                                                {{ $testimonial['review']}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Swiper Navigation -->


            </div>
            <div class="testimonial-controls flex justify-center items-center gap-6 mt-10">
                <div class="swiper-button-prev testimonial-nav"></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next testimonial-nav"></div>
            </div>
        </div>
    </div>
</section>

<style>
    .testimonialSwiper {
        padding-bottom: 50px;
    }

    /* Make sure slides are same height */
    .testimonialSwiper .swiper-slide {
        height: auto;
        display: flex;
    }

    .testimonialSwiper .swiper-wrapper {
        align-items: stretch;
    }

    .testimonial-controls .swiper-button-prev,
    .testimonial-controls .swiper-button-next,
    .testimonial-controls .swiper-pagination {
        position: static !important;
        flex-shrink: 0;
        margin: 0;
    }

    .testimonial-controls .swiper-pagination {
        width: auto;
    }

    .testimonial-controls .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background-color: #fff;
        border: 1px solid var(--color-brand);
        opacity: 1;
    }

    .testimonial-controls .swiper-pagination-bullet-active {
        background-color: var(--color-brand);
    }

    @media screen and (max-width: 768px) {
        .testimonialSwiper {
            padding-top: 120px;
        }
    }
</style>