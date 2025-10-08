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
@endphp

@section('content')
    <x-hero-section title="Built on Passion for Shine" bg-image="assets/img/bg-hero.png" bgColor="bg-[#ededed]" />

    <section class="py-8 md:py-25 bg-[#ededed]">
        <div class="container">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="col-span-2">
                    <div class="w-full h-[500px] relative">
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
                        <h3 class="text-[18px font-extrabold text-[var(--color-heading)]">{{ $blog['title'] }}</h3>
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
            </div>
        </div>
    </section>
@endsection