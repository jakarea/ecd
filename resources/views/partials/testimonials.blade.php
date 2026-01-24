@php
    // Fetch active testimonials from database, ordered by display order
    $testimonials = \App\Models\Testimonial::active()
        ->ordered()
        ->get();
@endphp

<section class="bg-[#F9F9F9] py-16 relative" id="testimonials">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <x-section-heading pretitle="{{ __('Testimonials') }}" title="{{ __('Our Reviews') }}"
            description="{{ __('Hear what our satisfied customers have to say!') }}." width="max-w-[948px]">
            <x-slot name="icon">
                <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.5 0.137207L0.25 2.47054V5.97054C0.25 9.20804 2.49 12.2355 5.5 12.9705C8.51 12.2355 10.75 9.20804 10.75 5.97054V2.47054L5.5 0.137207ZM7.29667 8.88721L5.5 7.80804L3.70917 8.88721L4.18167 6.84554L2.60083 5.48054L4.68917 5.29971L5.5 3.37471L6.31083 5.29387L8.39917 5.47471L6.81833 6.84554L7.29667 8.88721Z"
                        fill="#124846" />
                </svg>
            </x-slot>
        </x-section-heading>

        <div class="flex justify-center items-center gap-x-4 mt-3 lg:mt-6">
            {{-- google --}}
            <div class="w-12 h-12 bg-[#ccc] rounded-full p-1.5">
                <img src="{{ asset('assets/img/google.png') }}" alt="google" class="rounded-full w-32">
            </div>
            {{-- google --}}

            <ul class="flex items-center gap-x-2">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon text-yellow-500 icon-tabler icons-tabler-filled icon-tabler-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon text-yellow-500 icon-tabler icons-tabler-filled icon-tabler-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon text-yellow-500 icon-tabler icons-tabler-filled icon-tabler-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon text-yellow-500 icon-tabler icons-tabler-filled icon-tabler-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon text-yellow-500 icon-tabler icons-tabler-filled icon-tabler-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                </li>
            </ul>
            <h6 class="text-gray-900 font-semibold text-lg lg:text-xl">5/5</h6>
            <p class="text-gray-700 font-semibold text-sm lg:t-ext-base">(5+ Review)</p>
        </div>


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

        <div class="relative mt-10 md:mt-20">
            <div class="swiper testimonialSwiper !pt-3 lg:pt-[100px]">
                <div class="swiper-wrapper">
                    @forelse ($testimonials as $testimonial)
                        {{-- <div class="swiper-slide">
                            <div class="max-w-[794px] w-full mx-auto">
                                <div
                                    class="bg-[#6ADBD926] w-full max-w-[705px] h-[342px] pt-[120px] pb-[30px] md:py-8 pr-8 pl-6 md:pl-[160px] rounded-[20px] flex flex-col justify-between relative md:ml-[100px]">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="absolute top-0 md:top-1/2 left-6 md:left-[-100px] right-6 md:right-auto -translate-y-1/2 md:-translate-y-1/2">
                                            @if($testimonial->vehicle_image)
                                                @if(str_starts_with($testimonial->vehicle_image, 'assets/'))
                                                    <img src="{{ asset($testimonial->vehicle_image) }}" alt="{{ __('Vehicle') }}"
                                                        class="max-w-full md:max-w-[225px] w-full h-[181px] md:h-[296px] object-cover rounded-[20px]">
                                                @else
                                                    <img src="{{ Storage::url($testimonial->vehicle_image) }}"
                                                        alt="{{ __('Vehicle') }}"
                                                        class="max-w-full md:max-w-[225px] w-full h-[181px] md:h-[296px] object-cover rounded-[20px]">
                                                @endif
                                            @endif
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-4 mb-5">
                                                @if($testimonial->profile_image)
                                                    @if(str_starts_with($testimonial->profile_image, 'assets/'))
                                                        <img src="{{ asset($testimonial->profile_image) }}"
                                                            alt="{{ $testimonial->name }}"
                                                            class="w-[62px] h-[62px] rounded-full object-cover border-1 border-[var(--color-brand)] p-1">
                                                    @else
                                                        <img src="{{ Storage::url($testimonial->profile_image) }}"
                                                            alt="{{ $testimonial->name }}"
                                                            class="w-[62px] h-[62px] rounded-full object-cover border-1 border-[var(--color-brand)] p-1">
                                                    @endif
                                                @else
                                                    <div
                                                        class="w-[62px] h-[62px] rounded-full bg-[var(--color-brand)] flex items-center justify-center border-1 border-[var(--color-brand)] p-1">
                                                        <span
                                                            class="text-white font-semibold text-xl">{{ substr($testimonial->name, 0, 1) }}</span>
                                                    </div>
                                                @endif
                                                <div>
                                                    <h4 class="text-[18px] font-semibold text-[var(--color-heading)] mb-2">
                                                        {{ $testimonial->name  }}
                                                    </h4>
                                                    @if($testimonial->role)
                                                        <span
                                                            class="text-sm font-medium text-[var(--color-text)]">{{ $testimonial->role }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="text-[14px] text-[var(--color-text)] leading-[1.6] font-sf">
                                                {{ $testimonial->review }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="swiper-slide"> 
                                <div class="w-full bg-white rounded-[20px] shadow-sm p-8 flex flex-col justify-between"> 
                                       <div class="w-full">
                                         <div class="flex items-center gap-1 mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                            </svg>
                                        </div>
                                         <p class="text-[14px] text-[var(--color-text)] leading-[1.6] mb-4">
                                                {{ $testimonial->review }}
                                            </p>
                                       </div>
                                        <div class="w-full"> 
                                            <div class="border-b border-gray-200 mb-4"></div>
                
                                            <h4 class="text-[16px] font-semibold text-[var(--color-heading)] mb-1">
                                                {{ $testimonial->name  }}
                                            </h4> 
                                            @if($testimonial->role)
                                                <span
                                                    class="text-sm text-[var(--color-text)]">{{ $testimonial->role }}</span>
                                            @endif
                                        </div>
                                    </div> 
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="max-w-[794px] w-full mx-auto">
                                <div
                                    class="bg-[#6ADBD926] w-full max-w-[705px] h-[342px] rounded-[20px] flex items-center justify-center">
                                    <p class="text-[var(--color-text)] text-center">
                                        {{ __('No testimonials available at the moment.') }}
                                    </p>
                                </div>
                            </div> 
                        </div>
                    @endforelse 
                <!-- Swiper Navigation -->

            </div>

             {{-- <div class="flex gap-8 flex-col lg:flex-row"> 
                    <div class="w-full lg:max-w-1/3 mx-auto">
                        <div class="bg-white rounded-[20px] shadow-sm p-8"> 
                            <div class="flex items-center gap-1 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-500">
                                    <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"/>
                                </svg>
                            </div>
 
                            <p class="text-[14px] text-[var(--color-text)] leading-[1.6] mb-4">
                                Super tevreden over de service! Mijn auto is op locatie grondig schoongemaakt en ziet er weer uit toen ik hem van de dealer ophaalde!  Heel handig dat ik zelf niets hoefde te regelen of te rijden. Vriendelijk, professioneel en oog voor detail. Zeker een aanrader!
                            </p>
 
                            <div class="border-b border-gray-200 mb-4"></div>
 
                            <h4 class="text-[16px] font-semibold text-[var(--color-heading)] mb-1">
                                John Smith
                            </h4> 
                            <span class="text-sm text-[var(--color-text)]">
                                CEO, Tech Solutions Inc.
                            </span>
                        </div>
                    </div>  
                </div> --}}


            <div class="testimonial-controls flex justify-center items-center gap-6 mt-10">
                {{-- <div class="swiper-button-prev testimonial-nav"></div> --}}
                <div class="swiper-pagination"></div>
                {{-- <div class="swiper-button-next testimonial-nav"></div> --}}
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

    /* .testimonialSwiper .swiper-wrapper {
        align-items: stretch;
    } */

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