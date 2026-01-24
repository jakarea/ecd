@php
    // Get page identifier from props or use default
    $pageId = $pageId ?? 'home';

    // Fetch hero section data from database
    $heroData = \App\Models\HeroSection::getForPage($pageId);

    // If no data found, use default values from props
    if (!$heroData) {
        $heroData = (object) [
            'title' => $title ?? 'Welcome',
            'subtitle' => $subtitle ?? null,
            'media_type' => 'image',
            'background_image' => $bgImage ?? 'assets/img/bg-hero.png',
            'background_video' => null,
            'background_color' => $bgColor ?? 'bg-transparent',
            'show_social_icons' => $showSocialIcons ?? false,
        ];
    }

    // Get WhatsApp number from settings
    $whatsappPhone = \App\Models\Setting::get('contact_phone');
    $whatsappNumber = $whatsappPhone ? preg_replace('/[^0-9+]/', '', $whatsappPhone) : null;
@endphp

@if($heroData->media_type === 'video' && $heroData->background_video) 

    {{-- Video Hero Section (Homepage style) --}} 
    <section class="hero-section bg-no-repeat bg-cover bg-center h-screen relative">
        <div class="video-background">
            <iframe src="{{ $heroData->background_video }}" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
        </div>
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-center gap-4 h-screen">
                <div class="max-w-4xl space-y-8 relative">
                    <h1
                        class="text-white text-[28px] md:text-[45px] font-bold text-center leading-[33px] md:leading-[52px]">
                        {!! nl2br(e($heroData->title)) !!}
                    </h1>
                    @if($heroData->subtitle)
                        <p class="text-white text-lg md:text-xl text-center">{{ $heroData->subtitle }}</p>
                    @endif
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="{{ route('book-now', ['locale' => app()->getLocale()]) }}" class="btn-brand"><span>{{ __('Book Now') }}</span>
                            <svg width="25" height="11" viewBox="0 0 25 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 5.5H1M24 5.5L19.5 1M24 5.5L19.5 10" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="{{ route('services-subscriptions', ['locale' => app()->getLocale()]) }}"
                            class="btn-outline"><span>{{ __('Our Services') }}</span>
                            <svg width="25" height="11" viewBox="0 0 25 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 5.5H1M24 5.5L19.5 1M24 5.5L19.5 10" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                 
            </div>
        </div>
        <div class="w-full absolute -bottom-[5px] top-0 left-0 right-0 z-[-1]">
            <img src="{{ asset('assets/img/hero_shape.png') }}" alt="Hero Shape"
                class="w-full h-full object-cover object-bottom">
        </div>
    </section>
@else 
    {{-- Image Hero Section (Other pages style) --}}
    <section
        class="{{ $heroData->background_color }} hero-section bg-no-repeat bg-cover bg-center h-[281px] md:h-[451px] relative py-[50px]"
        style="background-image: url('{{ str_starts_with($heroData->background_image, 'assets/') ? asset($heroData->background_image) : Storage::url($heroData->background_image) }}');">
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-center gap-4 h-[281px] md:h-[451px]">
                <div class="max-w-[692px] text-center space-y-8 relative z-[30]">
                    <h1 class="text-white text-[28px] md:text-[45px] font-bold leading-[33px] md:leading-[52px]">
                        {!! nl2br(e($heroData->title)) !!}
                    </h1>
                    @if($heroData->subtitle)
                        <p class="text-white text-lg md:text-xl">{{ $heroData->subtitle }}</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- @if($heroData->show_social_icons) 
            <div id="socialIcons"
                class="fixed top-1/2 -translate-y-1/2 left-6 md:right-6 md:left-auto z-[100] transition-all duration-500">
                <nav class="flex flex-col gap-2">
                    @if($whatsappNumber)
                        <a href="https://wa.me/{{ $whatsappNumber }}"
                            class="w-10 h-10 flex items-center justify-center bg-[#10C379] rounded-full [box-shadow:0px_8px_13.78px_0px_#10182826]"
                            target="_blank">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.2669 4.69774C16.4518 3.87472 15.4811 3.22215 14.4113 2.77806C13.3415 2.33397 12.1941 2.10723 11.0358 2.11107C6.18243 2.11107 2.22687 6.06663 2.22687 10.92C2.22687 12.4755 2.63576 13.9866 3.40021 15.32L2.15576 19.8888L6.82243 18.6622C8.11132 19.3644 9.56021 19.7377 11.0358 19.7377C15.8891 19.7377 19.8447 15.7822 19.8447 10.9288C19.8447 8.57329 18.9291 6.35996 17.2669 4.69774ZM11.0358 18.2444C9.72021 18.2444 8.43132 17.8888 7.30243 17.2222L7.03576 17.0622L4.26243 17.7911L5.00021 15.0888L4.82243 14.8133C4.09136 13.6462 3.70325 12.2971 3.70243 10.92C3.70243 6.8844 6.99132 3.59552 11.0269 3.59552C12.9824 3.59552 14.8224 4.35996 16.2002 5.74663C16.8825 6.42562 17.4232 7.23333 17.791 8.12292C18.1587 9.01251 18.3462 9.96626 18.3424 10.9288C18.3602 14.9644 15.0713 18.2444 11.0358 18.2444ZM15.0535 12.7688C14.8313 12.6622 13.7469 12.1288 13.5513 12.0488C13.3469 11.9777 13.2047 11.9422 13.0535 12.1555C12.9024 12.3777 12.4847 12.8755 12.3602 13.0177C12.2358 13.1688 12.1024 13.1866 11.8802 13.0711C11.658 12.9644 10.9469 12.7244 10.1113 11.9777C9.45354 11.3911 9.01798 10.6711 8.88465 10.4488C8.76021 10.2266 8.86687 10.1111 8.98243 9.99552C9.08021 9.89774 9.20465 9.73774 9.31132 9.61329C9.41798 9.48885 9.46243 9.39107 9.53354 9.24885C9.60465 9.09774 9.56909 8.97329 9.51576 8.86663C9.46243 8.75996 9.01798 7.67552 8.84021 7.23107C8.66243 6.8044 8.47576 6.85774 8.34243 6.84885H7.91576C7.76465 6.84885 7.53354 6.90218 7.32909 7.1244C7.13354 7.34663 6.56465 7.87996 6.56465 8.9644C6.56465 10.0488 7.35576 11.0977 7.46243 11.24C7.5691 11.3911 9.01798 13.6133 11.2224 14.5644C11.7469 14.7955 12.1558 14.9288 12.4758 15.0266C13.0002 15.1955 13.4802 15.1688 13.8624 15.1155C14.2891 15.0533 15.1691 14.5822 15.3469 14.0666C15.5335 13.5511 15.5335 13.1155 15.4713 13.0177C15.4091 12.92 15.2758 12.8755 15.0535 12.7688Z"
                                    fill="white" />
                            </svg>
                        </a>
                    @endif
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-[var(--color-brand)] rounded-full [box-shadow:0px_8px_13.78px_0px_#10182826]">

                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.21778 9.92444C7.49778 12.44 9.56 14.5022 12.0756 15.7822L14.0311 13.8267C14.28 13.5778 14.6267 13.5067 14.9378 13.6044C15.9333 13.9333 17 14.1111 18.1111 14.1111C18.3469 14.1111 18.573 14.2048 18.7397 14.3715C18.9064 14.5382 19 14.7643 19 15V18.1111C19 18.3469 18.9064 18.573 18.7397 18.7397C18.573 18.9064 18.3469 19 18.1111 19C14.1034 19 10.2598 17.4079 7.42594 14.5741C4.59206 11.7402 3 7.89661 3 3.88889C3 3.65314 3.09365 3.42705 3.26035 3.26035C3.42705 3.09365 3.65314 3 3.88889 3H7C7.23575 3 7.46184 3.09365 7.62854 3.26035C7.79524 3.42705 7.88889 3.65314 7.88889 3.88889C7.88889 5 8.06667 6.06667 8.39556 7.06222C8.49333 7.37333 8.42222 7.72 8.17333 7.96889L6.21778 9.92444Z"
                                fill="white" />
                        </svg>

                    </a>
                    <a href="{{ route('services-subscriptions', ['locale' => app()->getLocale()]) }}"
                        class="w-10 h-10 flex items-center justify-center bg-[var(--color-brand)] rounded-full [box-shadow:0px_8px_13.78px_0px_#10182826] cursor-pointer">

                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.2222 17.2222H4.77778V7.44445H17.2222M14.5556 1.22223V3.00001H7.44444V1.22223H5.66667V3.00001H4.77778C3.79111 3.00001 3 3.79112 3 4.77778V17.2222C3 17.6937 3.1873 18.1459 3.5207 18.4793C3.8541 18.8127 4.30628 19 4.77778 19H17.2222C17.6937 19 18.1459 18.8127 18.4793 18.4793C18.8127 18.1459 19 17.6937 19 17.2222V4.77778C19 4.30629 18.8127 3.8541 18.4793 3.52071C18.1459 3.18731 17.6937 3.00001 17.2222 3.00001H16.3333V1.22223M15.4444 11H11V15.4445H15.4444V11Z"
                                fill="white" />
                        </svg>

                    </a>
                </nav>
            </div>
        @endif --}}
        @php
            if (Request::is('*/about')) {
                $hero_shape = 'hero_shape_white_inner_page.png';
            } else {
                $hero_shape = 'hero_shape_inner_page.png';
            }
        @endphp
        <div class="w-full absolute -bottom-[5px] top-0 left-0 right-0 z-[20]">
            <img src="{{ asset('assets/img/' . $hero_shape) }}" alt="Hero Shape"
                class="w-full h-full object-cover object-bottom">
        </div>
    </section>
@endif