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
            'author' => 'John Doe',
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

    $blog = $blogs[0];

    $recentBlogs = [
        [
            'id' => '1',
            'image' => 'assets/img/blog1.webp',
            'title' => 'Achieving Your Property Investment Goals',
            'date' => '10 Jul 2025',
        ],
        [
            'id' => '2',
            'image' => 'assets/img/blog2.webp',
            'title' => 'Achieving Your Property Investment Goals',
            'date' => '10 Jul 2025',
        ],
        [
            'id' => '3',
            'image' => 'assets/img/blog3.webp',
            'title' => 'Achieving Your Property Investment Goals',
            'date' => '10 Jul 2025',
        ],

        [
            'id' => '4',
            'image' => 'assets/img/blog4.webp',
            'title' => 'Achieving Your Property Investment Goals',
            'date' => '10 Jul 2025',
        ],

        [
            'id' => '5',
            'image' => 'assets/img/blog5.webp',
            'title' => 'Achieving Your Property Investment Goals',
            'date' => '10 Jul 2025',
        ],
    ];
@endphp

@section('content')
    <x-hero-section pageId="blog" />

    <section class="py-8 md:py-25">
        <div class="container">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="col-span-2">
                    <div class="w-full h-[500px] relative rounded-[10px]">
                        <img src="{{ asset(path: $blog['image']) }}" alt="{{ $blog['id'] }}"
                            class="w-full h-full object-cover rounded-[10px]">
                        <div
                            class="absolute bottom-0 left-0 right-0 flex justify-between items-center px-4 py-3 bg-[var(--color-brand)] rounded-bl-[10px] rounded-br-[10px]">
                            <div class="flex items-center gap-2">
                                <svg width="20" height="22" viewBox="0 0 14 16" fill="none"
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

                                <svg width="17" height="19" viewBox="0 0 14 16" fill="none"
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

                                <svg width="19" height="19" viewBox="0 0 16 16" fill="none"
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
                        <h3 class="text-[24px] font-extrabold text-[var(--color-heading)]">{{ $blog['title'] }}</h3>
                        <p class="mt-2 text-[14px] font-sf font-normal text-[var(--color-text)] leading-[1.6]">
                            {{ $blog['description'] }}
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at facilisis turpis. Sed eget
                            eleifend dui, et tristique velit. Donec quis neque aliquam, suscipit nibh mollis, scelerisque
                            quam. Curabitur nec lacus non leo commodo tincidunt. Pellentesque id magna et lacus euismod
                            porta. Donec mattis in nisl sed faucibus. Cras ac hendrerit ante, eu suscipit augue. Donec
                            finibus neque in diam fermentum, a egestas leo sagittis. Vestibulum sagittis erat nibh, nec
                            blandit tellus auctor nec. Mauris et lacus a neque vulputate volutpat. Morbi ligula felis,
                            efficitur vel faucibus a, feugiat et lectus. Sed in diam viverra, volutpat mi vel, mollis est.
                            Quisque mollis mattis iaculis. Aenean tincidunt dui dolor, sed blandit lacus rutrum ut.
                            Vestibulum commodo dapibus purus sed vestibulum. Nulla accumsan, ante a ornare ullamcorper, nisl
                            nunc fringilla velit, sed convallis turpis mauris id felis. <br /> <br />

                            Vivamus gravida urna fringilla feugiat ultrices. Suspendisse fermentum ullamcorper varius.
                            Mauris aliquam luctus dui, quis porttitor lectus ultricies quis. Sed sed sagittis magna. Cras
                            maximus lobortis nisl vitae pharetra. Cras id urna rhoncus, commodo enim eget, viverra sapien.
                            Mauris eleifend viverra fermentum. <br /> <br />

                            Nam commodo eget ante id hendrerit. Sed laoreet urna eget scelerisque mattis. Quisque dignissim
                            ipsum aliquam metus pulvinar tristique pretium ac sem. Proin suscipit felis eu est rutrum porta.
                            Nunc commodo porta felis vel elementum. Nam mollis quis metus et ullamcorper. Pellentesque
                            accumsan lorem vitae tortor vehicula, non aliquet urna condimentum. Etiam pharetra sapien
                            volutpat, tincidunt ex blandit, malesuada mi. Ut nec ante consequat, placerat lorem eget,
                            egestas ligula. Maecenas finibus venenatis auctor. Vestibulum mauris risus, interdum et turpis
                            vel, rhoncus mattis odio. <br /> <br />

                            Aenean risus massa, varius sed sagittis quis, lobortis id libero. Nunc condimentum varius elit,
                            ut tincidunt erat ullamcorper vitae. In lacinia orci quis volutpat luctus. Nulla euismod
                            scelerisque velit, in porttitor nisi efficitur quis. Pellentesque sagittis pulvinar arcu et
                            efficitur. Maecenas orci turpis, suscipit et ornare et, lacinia sed massa. Integer imperdiet
                            risus nec semper euismod. Duis et auctor dui. Suspendisse potenti. Suspendisse rhoncus odio quis
                            nibh ultrices, ut malesuada velit dignissim. Etiam nisi ipsum, semper sit amet metus in,
                            vehicula aliquam nulla. Praesent quis ultrices neque, ac aliquam lorem. Sed convallis nec sapien
                            eu aliquam. Duis gravida congue consectetur. <br /> <br />

                            Nullam sit amet elit pharetra, convallis elit vehicula, pulvinar neque. Integer imperdiet id ex
                            quis condimentum. Proin felis eros, fermentum ac nisi sit amet, venenatis vestibulum tortor.
                            Nunc ornare, tortor id tincidunt tempus, augue neque pulvinar sem, at pulvinar elit nulla et
                            magna. In nec felis sit amet ipsum volutpat pulvinar. Duis congue eleifend est, sed porttitor
                            nulla ultrices id. Cras porta nibh vel eleifend ornare. Phasellus maximus nunc at sodales
                            condimentum. Duis dapibus bibendum odio. Curabitur cursus tristique justo, ac dictum est.
                            Maecenas non libero eros. Mauris a ornare lorem.
                        </p>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="bg-[var(--color-black)] py-10 px-5 rounded-[10px]">
                        <h4 class="text-[26px] font-black text-white leading-[1.46] tracking-[-0.78px]">Get your car
                            shining today!</h4>
                        <p class="text-[18px] text-white leading-[1.3] mt-4 mb-6.5 font-sf">Book your wash and detailing in
                            minutes.
                            We’ll come to you and leave your ride spotless inside and out.</p>
                        <button class="btn-brand" onclick="openHeroModal()"><span>Book Now</span>
                            <svg width="25" height="11" viewBox="0 0 25 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 5.5H1M24 5.5L19.5 1M24 5.5L19.5 10" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-5 bg-[#F2F2F2] p-4 rounded-[10px]">
                        <h3 class="text-[18px] font-semibold text-[#20202A] uppercase mb-5">Recent Posts</h3>
                        @foreach($recentBlogs as $blog)
                            <div
                                class="flex gap-3 {{ !$loop->first ? 'pt-5' : '' }} {{ !$loop->last ? 'pb-5 border-b border-[#d9d9d9]' : '' }}">
                                <div class="w-[125px] h-[88px] flex-shrink-0">
                                    <img src="{{ asset(path: $blog['image']) }}" alt="Post {{ $blog['id'] }}"
                                        class="w-full h-full object-cover rounded-[8px]">
                                </div>
                                <div class="space-y-3">
                                    <h4 class="text-[18px] font-bold text-[#20202A] leading-[1.4]">{{ $blog['title'] }}</h4>
                                    <div class="flex items-center gap-3">
                                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4 1.82739H10V0.327393H11.5V1.82739H12.25C12.6478 1.82739 13.0294 1.98543 13.3107 2.26673C13.592 2.54804 13.75 2.92957 13.75 3.32739V13.8274C13.75 14.2252 13.592 14.6067 13.3107 14.8881C13.0294 15.1694 12.6478 15.3274 12.25 15.3274H1.75C1.35218 15.3274 0.970644 15.1694 0.68934 14.8881C0.408035 14.6067 0.25 14.2252 0.25 13.8274V3.32739C0.25 2.92957 0.408035 2.54804 0.68934 2.26673C0.970644 1.98543 1.35218 1.82739 1.75 1.82739H2.5V0.327393H4V1.82739ZM1.75 4.82739V13.8274H12.25V4.82739H1.75ZM3.25 7.07739H4.75V8.57739H3.25V7.07739ZM6.25 7.07739H7.75V8.57739H6.25V7.07739ZM9.25 7.07739H10.75V8.57739H9.25V7.07739ZM9.25 10.0774H10.75V11.5774H9.25V10.0774ZM6.25 10.0774H7.75V11.5774H6.25V10.0774ZM3.25 10.0774H4.75V11.5774H3.25V10.0774Z"
                                                fill="#124846" />
                                        </svg>
                                        <span class="text-[16px] font-medium text-[#20202A] leading-none">
                                            {{ $blog['date'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="flex flex-wrap border-t border-b border-[#D9D9D9] py-2.5 mt-10">
                <div
                    class="w-full md:w-1/2 flex items-center justify-between gap-6 border-r border-[#d9d9d9] py-4 pr-[30px]">
                    <a href="#"
                        class="w-[65px] h-[65px] border border-[#D9D9D9] rounded-full flex justify-center items-center flex-shrink-0 [box-shadow:-1.41px_7.04px_10.56px_2.82px_rgba(186,186,186,0.19)]">
                        <svg width="32" height="15" viewBox="0 0 34 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M32.8646 8.83678C32.8646 9.1651 32.5981 9.43156 32.2698 9.43156H2.55681L8.65776 15.4312C8.71602 15.4853 8.76282 15.5505 8.79542 15.6231C8.82801 15.6956 8.84573 15.7739 8.84753 15.8534C8.84933 15.9329 8.83516 16.012 8.80588 16.0859C8.77659 16.1599 8.73278 16.2272 8.67703 16.2839C8.62128 16.3406 8.55473 16.3855 8.48131 16.4161C8.40788 16.4466 8.32909 16.4621 8.24957 16.4616C8.17005 16.4612 8.09143 16.4448 8.01835 16.4135C7.94528 16.3821 7.87924 16.3364 7.82413 16.2791L0.692547 9.26645C0.626701 9.20371 0.576185 9.12666 0.544912 9.04126C0.513639 8.95585 0.50245 8.8644 0.512211 8.77398C0.527124 8.63089 0.593591 8.49813 0.699208 8.40046L7.82413 1.39449C7.87924 1.33717 7.94528 1.29147 8.01835 1.26012C8.09143 1.22876 8.17005 1.21237 8.24957 1.21192C8.32909 1.21148 8.40788 1.22698 8.48131 1.25752C8.55473 1.28805 8.62128 1.333 8.67703 1.3897C8.73278 1.44641 8.77659 1.51372 8.80588 1.58764C8.83516 1.66157 8.84933 1.74063 8.84753 1.82012C8.84573 1.89962 8.82801 1.97795 8.79542 2.05049C8.76282 2.12302 8.71602 2.18828 8.65776 2.2424L2.55681 8.24201H32.2698C32.5981 8.24201 32.8646 8.50847 32.8646 8.83678Z"
                                fill="#6ADBD9" stroke="#6ADBD9" stroke-width="0.773356" />
                        </svg>
                    </a>
                    <div class="flex gap-3">
                        <div class="space-y-3 text-right flex flex-col items-end">
                            <h4 class="text-[18px] font-bold text-[#20202A] leading-[1.4]">Achieving Your Property
                                Investment Goals</h4>
                            <div class="flex items-center gap-3">
                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 1.82739H10V0.327393H11.5V1.82739H12.25C12.6478 1.82739 13.0294 1.98543 13.3107 2.26673C13.592 2.54804 13.75 2.92957 13.75 3.32739V13.8274C13.75 14.2252 13.592 14.6067 13.3107 14.8881C13.0294 15.1694 12.6478 15.3274 12.25 15.3274H1.75C1.35218 15.3274 0.970644 15.1694 0.68934 14.8881C0.408035 14.6067 0.25 14.2252 0.25 13.8274V3.32739C0.25 2.92957 0.408035 2.54804 0.68934 2.26673C0.970644 1.98543 1.35218 1.82739 1.75 1.82739H2.5V0.327393H4V1.82739ZM1.75 4.82739V13.8274H12.25V4.82739H1.75ZM3.25 7.07739H4.75V8.57739H3.25V7.07739ZM6.25 7.07739H7.75V8.57739H6.25V7.07739ZM9.25 7.07739H10.75V8.57739H9.25V7.07739ZM9.25 10.0774H10.75V11.5774H9.25V10.0774ZM6.25 10.0774H7.75V11.5774H6.25V10.0774ZM3.25 10.0774H4.75V11.5774H3.25V10.0774Z"
                                        fill="#124846" />
                                </svg>
                                <span class="text-[16px] font-medium text-[#20202A] leading-none">
                                    10 July 2025
                                </span>
                            </div>
                        </div>
                        <div class="w-[125px] h-[88px] flex-shrink-0">
                            <img src="{{ asset('assets/img/blog1.webp') }}" alt="blog post"
                                class="w-full h-full object-cover rounded-[8px]">
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 flex items-center justify-between gap-6 py-4 pl-[30px]">
                    <div class="flex gap-3">
                        <div class="w-[125px] h-[88px] flex-shrink-0">
                            <img src="{{ asset('assets/img/blog1.webp') }}" alt="blog post"
                                class="w-full h-full object-cover rounded-[8px]">
                        </div>
                        <div class="space-y-3">
                            <h4 class="text-[18px] font-bold text-[#20202A] leading-[1.4]">Achieving Your Property
                                Investment Goals</h4>
                            <div class="flex items-center gap-3">
                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 1.82739H10V0.327393H11.5V1.82739H12.25C12.6478 1.82739 13.0294 1.98543 13.3107 2.26673C13.592 2.54804 13.75 2.92957 13.75 3.32739V13.8274C13.75 14.2252 13.592 14.6067 13.3107 14.8881C13.0294 15.1694 12.6478 15.3274 12.25 15.3274H1.75C1.35218 15.3274 0.970644 15.1694 0.68934 14.8881C0.408035 14.6067 0.25 14.2252 0.25 13.8274V3.32739C0.25 2.92957 0.408035 2.54804 0.68934 2.26673C0.970644 1.98543 1.35218 1.82739 1.75 1.82739H2.5V0.327393H4V1.82739ZM1.75 4.82739V13.8274H12.25V4.82739H1.75ZM3.25 7.07739H4.75V8.57739H3.25V7.07739ZM6.25 7.07739H7.75V8.57739H6.25V7.07739ZM9.25 7.07739H10.75V8.57739H9.25V7.07739ZM9.25 10.0774H10.75V11.5774H9.25V10.0774ZM6.25 10.0774H7.75V11.5774H6.25V10.0774ZM3.25 10.0774H4.75V11.5774H3.25V10.0774Z"
                                        fill="#124846" />
                                </svg>
                                <span class="text-[16px] font-medium text-[#20202A] leading-none">
                                    10 July 2025
                                </span>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="w-[65px] h-[65px] border border-[#D9D9D9] rounded-full flex justify-center items-center flex-shrink-0 [box-shadow:-1.41px_7.04px_10.56px_2.82px_rgba(186,186,186,0.19)]">
                        <svg width="32" height="15" viewBox="0 0 41 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M39.1379 9.16371H1.86208M39.1379 9.16371L31.8448 1.87061M39.1379 9.16371L31.8448 16.4568"
                                stroke="#6ADBD9" stroke-width="2.43103" stroke-linecap="round" stroke-linejoin="round"
                                class="group-hover:stroke-[#124846] transition-all duration-300 ease-in-out" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>
    </section>


@endsection