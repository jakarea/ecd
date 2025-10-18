@php
    $images = [
        [
            'id' => '1',
            'image' => 'assets/img/about-showcase1.webp',
        ],
        [
            'id' => '2',
            'image' => 'assets/img/about-showcase2.webp',
        ],
        [
            'id' => '3',
            'image' => 'assets/img/about-showcase3.webp',
        ],
        [
            'id' => '4',
            'image' => 'assets/img/about-showcase4.webp',
        ],
        [
            'id' => '5',
            'image' => 'assets/img/about-showcase1.webp',
        ],
        [
            'id' => '6',
            'image' => 'assets/img/about-showcase2.webp',
        ],
        [
            'id' => '7',
            'image' => 'assets/img/about-showcase3.webp',
        ],
        [
            'id' => '8',
            'image' => 'assets/img/about-showcase4.webp',
        ],
        [
            'id' => '9',
            'image' => 'assets/img/about-showcase1.webp',
        ],
        [
            'id' => '10',
            'image' => 'assets/img/about-showcase2.webp',
        ],
        [
            'id' => '11',
            'image' => 'assets/img/about-showcase3.webp',
        ],
        [
            'id' => '12',
            'image' => 'assets/img/about-showcase4.webp',
        ],
    ];
@endphp

<section class="pt-8 md:pt-[50px]">
    <div class="overflow-hidden w-full bg-white">
        <div class="marquee-track-1 flex gap-6">
            @foreach ($images as $image)
                <div class="w-auto flex-shrink-0">
                    <img src="{{ asset(path: $image['image']) }}" alt="{{ __('Showcase Image') }} {{ $image['id'] }}"
                        class="h-[180px] md:h-[337px] w-auto rounded-[15px]" />
                </div>
            @endforeach

            {{-- Duplicate for seamless loop --}}
            @foreach ($images as $image)
                <div class="w-auto flex-shrink-0">
                    <img src="{{ asset(path: $image['image']) }}" alt="{{ __('Showcase Image') }} {{ $image['id'] }}"
                        class="h-[180px] md:h-[337px] w-auto" />
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-8 md:pb-[50px]">
    <div class="overflow-hidden w-full bg-white">
        <div class="marquee-track-2 flex gap-6">
            @foreach ($images as $image)
                <div class="w-auto flex-shrink-0">
                    <img src="{{ asset(path: $image['image']) }}" alt="{{ __('Showcase Image') }} {{ $image['id'] }}"
                        class="h-[180px] md:h-[337px] w-auto rounded-[15px]" />
                </div>
            @endforeach

            {{-- Duplicate for seamless loop --}}
            @foreach ($images as $image)
                <div class="w-auto flex-shrink-0">
                    <img src="{{ asset(path: $image['image']) }}" alt="{{ __('Showcase Image') }} {{ $image['id'] }}"
                        class="h-[337px] w-auto" />
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- <div class="swiper marquee overflow-hidden whitespace-nowrap">
    <div class="marquee-content swiper-wrapper">
        @foreach ($teamMembers as $member)
        <div class="swiper-slide">
            <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="w-full h-full" />
        </div>
        @endforeach
    </div>
</div>
<div class="swiper marquee-2 overflow-hidden whitespace-nowrap mt-16">
    <div class="marquee-content swiper-wrapper">
        @foreach ($teamMembers as $member)
        <div class="swiper-slide">
            <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="w-full h-full" />
        </div>
        @endforeach
    </div>
</div> --}}