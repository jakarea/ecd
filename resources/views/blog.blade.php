@extends('layouts.app')

@section('title', 'Blog Page')

@php
    $blogs = [
        [
            'id' => '1',
            'image' => 'assets/img/blog1.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'Admin',
            'category' => ['Property', 'Invement']
        ],
        [
            'id' => '2',
            'image' => 'assets/img/blog2.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'John Doe',
            'category' => ['Property', 'Invement']
        ],

    ];

    $archiveBlogs = [
        [
            'id' => '1',
            'image' => 'assets/img/blog1.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'Admin',
            'category' => ['Property', 'Invement']
        ],
        [
            'id' => '2',
            'image' => 'assets/img/blog2.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'John Doe',
            'category' => ['Property', 'Invement']
        ],

        [
            'id' => '3',
            'image' => 'assets/img/blog3.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'Admin',
            'category' => ['Property', 'Invement']
        ],
        [
            'id' => '4',
            'image' => 'assets/img/blog4.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'John Doe',
            'category' => ['Property', 'Invement']
        ],

        [
            'id' => '5',
            'image' => 'assets/img/blog5.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'Admin',
            'category' => ['Property', 'Invement']
        ],
        [
            'id' => '6',
            'image' => 'assets/img/blog1.webp',
            'title' => 'Built on Passion for Shine',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod porta. Donec mattis in nisl sed faucibus.',
            'date' => '10 Jul 2025',
            'author' => 'John Doe',
            'category' => ['Property', 'Invement']
        ],
    ]
@endphp

@section('content')
    <x-hero-section pageId="blog" bgColor="bg-[#ededed]" />

    <section class="py-10 md:py-20 bg-[#ededed] border-b border-[var(--color-brand)]">
        <div class="container">
            <div class="font-sf font-medium text-[24px] text-[var(--color-text)] text-center max-w-[840px] mx-auto">See What
                Just published on our blog.</div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-center mt-10 md:mt-[60px]">
                @foreach ($blogs as $blog)
                    <div class="rounded-[10px] border border-[#d9d9d9]">
                        <div class="w-full h-[300px] relative">
                            <img src="{{ asset(path: $blog['image']) }}" alt="{{ $blog['id'] }}"
                                class="w-full h-full object-cover rounded-tl-[10px] rounded-tr-[10px]">
                            <div
                                class="absolute bottom-0 left-0 right-0 flex justify-between items-center p-[10px]  bg-[var(--color-brand)]">
                                <div class="flex items-center gap-2">

                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 1.82739H10V0.327393H11.5V1.82739H12.25C12.6478 1.82739 13.0294 1.98543 13.3107 2.26673C13.592 2.54804 13.75 2.92957 13.75 3.32739V13.8274C13.75 14.2252 13.592 14.6067 13.3107 14.8881C13.0294 15.1694 12.6478 15.3274 12.25 15.3274H1.75C1.35218 15.3274 0.970644 15.1694 0.68934 14.8881C0.408035 14.6067 0.25 14.2252 0.25 13.8274V3.32739C0.25 2.92957 0.408035 2.54804 0.68934 2.26673C0.970644 1.98543 1.35218 1.82739 1.75 1.82739H2.5V0.327393H4V1.82739ZM1.75 4.82739V13.8274H12.25V4.82739H1.75ZM3.25 7.07739H4.75V8.57739H3.25V7.07739ZM6.25 7.07739H7.75V8.57739H6.25V7.07739ZM9.25 7.07739H10.75V8.57739H9.25V7.07739ZM9.25 10.0774H10.75V11.5774H9.25V10.0774ZM6.25 10.0774H7.75V11.5774H6.25V10.0774ZM3.25 10.0774H4.75V11.5774H3.25V10.0774Z"
                                            fill="#124846" />
                                    </svg>

                                    <span class="text-[16px] font-medium text-[var(--color-heading)] leading-none">
                                        {{ $blog['date'] }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">

                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.9997 7.82739C4.92841 7.82739 3.2497 6.14868 3.2497 4.07739C3.2497 2.0061 4.92841 0.327393 6.9997 0.327393C9.07098 0.327393 10.7497 2.0061 10.7497 4.07739C10.7497 6.14868 9.07098 7.82739 6.9997 7.82739ZM4.3747 8.76489H4.86395C5.51434 9.06372 6.23798 9.23364 6.9997 9.23364C7.76141 9.23364 8.48212 9.06372 9.13544 8.76489H9.6247C11.7985 8.76489 13.5622 10.5286 13.5622 12.7024V13.9211C13.5622 14.6975 12.9323 15.3274 12.1559 15.3274H1.84345C1.06708 15.3274 0.437197 14.6975 0.437197 13.9211V12.7024C0.437197 10.5286 2.20087 8.76489 4.3747 8.76489Z"
                                            fill="#124846" />
                                    </svg>

                                    <span class="text-[16px] font-medium text-[var(--color-heading)] leading-none">
                                        By {{ $blog['author'] }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">

                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.7659 0.327393C14.2258 0.327393 14.6669 0.510081 14.992 0.835268C15.3172 1.16045 15.4999 1.6015 15.4999 2.06139V6.27075C15.4999 6.93501 15.236 7.57205 14.7662 8.04174L8.2156 14.5947C7.74547 15.0638 7.10851 15.3272 6.44439 15.3274C5.78028 15.3275 5.1432 15.0643 4.67286 14.5955L1.23416 11.1629C0.764185 10.6935 0.499915 10.0567 0.499482 9.39242C0.499048 8.72818 0.762486 8.09097 1.23185 7.62095L7.78249 1.06261C8.01493 0.829744 8.29097 0.644959 8.59484 0.518809C8.89871 0.392659 9.22446 0.327615 9.55348 0.327393H13.7652H13.7659ZM11.6466 3.02626C11.4948 3.02626 11.3445 3.05616 11.2042 3.11425C11.064 3.17235 10.9365 3.2575 10.8292 3.36484C10.7218 3.47218 10.6367 3.59962 10.5786 3.73987C10.5205 3.88012 10.4906 4.03045 10.4906 4.18225C10.4906 4.33406 10.5205 4.48438 10.5786 4.62463C10.6367 4.76489 10.7218 4.89232 10.8292 4.99967C10.9365 5.10701 11.064 5.19216 11.2042 5.25025C11.3445 5.30835 11.4948 5.33825 11.6466 5.33825C11.9532 5.33825 12.2472 5.21646 12.464 4.99967C12.6808 4.78287 12.8026 4.48884 12.8026 4.18225C12.8026 3.87566 12.6808 3.58163 12.464 3.36484C12.2472 3.14805 11.9532 3.02626 11.6466 3.02626Z"
                                            fill="#124846" />
                                    </svg>

                                    <span class="text-[16px] font-medium text-[var(--color-heading)] leading-none">
                                        @foreach ($blog['category'] as $index => $cat)
                                            {{ $cat }}@if (!$loop->last), @endif
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 md:p-5">
                            <h3 class="text-[24px] font-extrabold text-[var(--color-heading)]"><a
                                    href="{{ route('blog-single', $blog['id']) }}"
                                    class="text-[var(--color-heading)]">{{ $blog['title'] }}</a></h3>
                            <p class="mt-2 text-[16px] font-sf font-normal text-[var(--color-text)] leading-[24px]">
                                {{ $blog['description'] }}
                            </p>

                        </div>
                        <a href="{{ route('blog-single', $blog['id']) }}"
                            class="flex items-center justify-between gap-4 mt-2 py-3 px-4 md:px-5 text-[16px] font-bold text-[var(--color-heading)] uppercase leading-[2] border-t border-[#d9d9d9] group hover:bg-[#6ADBD915] transition-all duration-300 ease-in-out">
                            <span href="#">Read More</span>

                            <svg width="41" height="18" viewBox="0 0 41 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M39.1379 9.16371H1.86208M39.1379 9.16371L31.8448 1.87061M39.1379 9.16371L31.8448 16.4568"
                                    stroke="#6ADBD9" stroke-width="2.43103" stroke-linecap="round" stroke-linejoin="round"
                                    class="group-hover:stroke-[#124846] transition-all duration-300 ease-in-out" />
                            </svg>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-10 md:py-20">
        <div class="container">
            <div class="font-sf font-medium text-[24px] text-[var(--color-text)] text-center max-w-[840px] mx-auto">More
                article from archive</div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10 md:mt-[60px]">
                @foreach ($archiveBlogs as $blog)
                    <div class="rounded-[10px] border border-[#d9d9d9]">
                        <div class="w-full h-[300px] relative">
                            <img src="{{ asset(path: $blog['image']) }}" alt="{{ $blog['id'] }}"
                                class="w-full h-full object-cover rounded-tl-[10px] rounded-tr-[10px]">
                            <div
                                class="absolute bottom-0 left-0 right-0 flex justify-between items-center p-[10px]  bg-[var(--color-brand)]">
                                <div class="flex items-center gap-2">

                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 1.82739H10V0.327393H11.5V1.82739H12.25C12.6478 1.82739 13.0294 1.98543 13.3107 2.26673C13.592 2.54804 13.75 2.92957 13.75 3.32739V13.8274C13.75 14.2252 13.592 14.6067 13.3107 14.8881C13.0294 15.1694 12.6478 15.3274 12.25 15.3274H1.75C1.35218 15.3274 0.970644 15.1694 0.68934 14.8881C0.408035 14.6067 0.25 14.2252 0.25 13.8274V3.32739C0.25 2.92957 0.408035 2.54804 0.68934 2.26673C0.970644 1.98543 1.35218 1.82739 1.75 1.82739H2.5V0.327393H4V1.82739ZM1.75 4.82739V13.8274H12.25V4.82739H1.75ZM3.25 7.07739H4.75V8.57739H3.25V7.07739ZM6.25 7.07739H7.75V8.57739H6.25V7.07739ZM9.25 7.07739H10.75V8.57739H9.25V7.07739ZM9.25 10.0774H10.75V11.5774H9.25V10.0774ZM6.25 10.0774H7.75V11.5774H6.25V10.0774ZM3.25 10.0774H4.75V11.5774H3.25V10.0774Z"
                                            fill="#124846" />
                                    </svg>

                                    <span class="text-[12px] font-medium text-[var(--color-text)] leading-none">
                                        {{ $blog['date'] }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">

                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.9997 7.82739C4.92841 7.82739 3.2497 6.14868 3.2497 4.07739C3.2497 2.0061 4.92841 0.327393 6.9997 0.327393C9.07098 0.327393 10.7497 2.0061 10.7497 4.07739C10.7497 6.14868 9.07098 7.82739 6.9997 7.82739ZM4.3747 8.76489H4.86395C5.51434 9.06372 6.23798 9.23364 6.9997 9.23364C7.76141 9.23364 8.48212 9.06372 9.13544 8.76489H9.6247C11.7985 8.76489 13.5622 10.5286 13.5622 12.7024V13.9211C13.5622 14.6975 12.9323 15.3274 12.1559 15.3274H1.84345C1.06708 15.3274 0.437197 14.6975 0.437197 13.9211V12.7024C0.437197 10.5286 2.20087 8.76489 4.3747 8.76489Z"
                                            fill="#124846" />
                                    </svg>

                                    <span class="text-[12px] font-medium text-[var(--color-text)] leading-none">
                                        By {{ $blog['author'] }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">

                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.7659 0.327393C14.2258 0.327393 14.6669 0.510081 14.992 0.835268C15.3172 1.16045 15.4999 1.6015 15.4999 2.06139V6.27075C15.4999 6.93501 15.236 7.57205 14.7662 8.04174L8.2156 14.5947C7.74547 15.0638 7.10851 15.3272 6.44439 15.3274C5.78028 15.3275 5.1432 15.0643 4.67286 14.5955L1.23416 11.1629C0.764185 10.6935 0.499915 10.0567 0.499482 9.39242C0.499048 8.72818 0.762486 8.09097 1.23185 7.62095L7.78249 1.06261C8.01493 0.829744 8.29097 0.644959 8.59484 0.518809C8.89871 0.392659 9.22446 0.327615 9.55348 0.327393H13.7652H13.7659ZM11.6466 3.02626C11.4948 3.02626 11.3445 3.05616 11.2042 3.11425C11.064 3.17235 10.9365 3.2575 10.8292 3.36484C10.7218 3.47218 10.6367 3.59962 10.5786 3.73987C10.5205 3.88012 10.4906 4.03045 10.4906 4.18225C10.4906 4.33406 10.5205 4.48438 10.5786 4.62463C10.6367 4.76489 10.7218 4.89232 10.8292 4.99967C10.9365 5.10701 11.064 5.19216 11.2042 5.25025C11.3445 5.30835 11.4948 5.33825 11.6466 5.33825C11.9532 5.33825 12.2472 5.21646 12.464 4.99967C12.6808 4.78287 12.8026 4.48884 12.8026 4.18225C12.8026 3.87566 12.6808 3.58163 12.464 3.36484C12.2472 3.14805 11.9532 3.02626 11.6466 3.02626Z"
                                            fill="#124846" />
                                    </svg>

                                    <span class="text-[12px] font-medium text-[var(--color-text)] leading-none">
                                        @foreach ($blog['category'] as $index => $cat)
                                            {{ $cat }}@if (!$loop->last), @endif
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 md:p-5">
                            <h3 class="text-[18px] font-extrabold text-[var(--color-heading)]"><a
                                    href="{{ route('blog-single', $blog['id']) }}"
                                    class="text-[var(--color-heading)]">{{ $blog['title'] }}</a></h3>
                            <p class="mt-2 text-[14px] font-sf font-normal text-[var(--color-text)] leading-[1.6]">
                                {{ $blog['description'] }}
                            </p>

                        </div>
                        <a href="{{ route('blog-single', $blog['id']) }}"
                            class="flex items-center justify-between gap-4 mt-2 py-3 px-4 md:px-5 text-[16px] font-bold text-[var(--color-heading)] uppercase leading-[2] border-t border-[#d9d9d9] group hover:bg-[#6ADBD915] transition-all duration-300 ease-in-out">
                            <span href="#">Read More</span>

                            <svg width="41" height="18" viewBox="0 0 41 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M39.1379 9.16371H1.86208M39.1379 9.16371L31.8448 1.87061M39.1379 9.16371L31.8448 16.4568"
                                    stroke="#6ADBD9" stroke-width="2.43103" stroke-linecap="round" stroke-linejoin="round"
                                    class="group-hover:stroke-[#124846] transition-all duration-300 ease-in-out" />
                            </svg>

                        </a>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center items-center mt-[36px]">
                <div
                    class="flex justify-center items-center px-2.5 py-[4.5px] border border-[#D9D9D9] rounded-tl-[10px] rounded-bl-[10px]">
                    <a href="#"
                        class="text-[18px] font-medium text-[var(--color-text)] flex justify-center items-center border-r border-[#D9D9D9] py-[13px] px-[30px]">1</a>
                    <a href="#"
                        class="text-[18px] font-medium text-[var(--color-text)] flex justify-center items-center border-r border-[#D9D9D9] py-[13px] px-[30px]">2</a>
                    <a href="#"
                        class="text-[18px] font-medium text-[var(--color-text)] flex justify-center items-center border-r border-[#D9D9D9] py-[13px] px-[30px]">3</a>
                    <a href="#"
                        class="text-[18px] font-medium text-[var(--color-text)] flex justify-center items-center border-r border-[#D9D9D9] py-[13px] px-[30px]">4</a>
                    <a href="#"
                        class="text-[18px] font-medium text-[var(--color-text)] flex justify-center items-center py-[13px] px-[30px]">5</a>
                </div>
                <a href="#"
                    class="text-[18px] font-medium text-[var(--color-text)] w-[62px] h-[62px] flex justify-center items-center bg-[var(--color-brand)] rounded-tr-[10px] rounded-br-[10px]">

                    <svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.837772 0.708142C0.766106 0.779588 0.709246 0.864464 0.67045 0.957907C0.631654 1.05135 0.611684 1.15152 0.611684 1.25269C0.611684 1.35386 0.631654 1.45404 0.67045 1.54748C0.709246 1.64092 0.766106 1.7258 0.837772 1.79724L9.52926 10.4824L0.837772 19.1675C0.693268 19.3119 0.612087 19.5078 0.612087 19.7121C0.612087 19.9163 0.693268 20.1122 0.837772 20.2566C0.982276 20.401 1.17827 20.4822 1.38263 20.4822C1.58699 20.4822 1.78298 20.401 1.92748 20.2566L11.1623 11.0269C11.2339 10.9555 11.2908 10.8706 11.3296 10.7772C11.3684 10.6837 11.3884 10.5835 11.3884 10.4824C11.3884 10.3812 11.3684 10.281 11.3296 10.1876C11.2908 10.0942 11.2339 10.0093 11.1623 9.93783L1.92748 0.708142C1.85599 0.636514 1.77107 0.579686 1.67758 0.540911C1.58408 0.502137 1.48385 0.482178 1.38263 0.482178C1.2814 0.482178 1.18117 0.502137 1.08768 0.540911C0.994182 0.579686 0.909259 0.636514 0.837772 0.708142Z"
                            fill="white" stroke="white" stroke-width="0.815761" />
                    </svg>

                </a>
            </div>
        </div>
    </section>
@endsection