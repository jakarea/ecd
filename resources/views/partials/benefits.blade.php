@php
    $benefits = [
        [
            'title' => 'Free Vacuum',
            'image' => 'assets/img/vacuum.png',
        ],
        [
            'title' => 'Fragrance',
            'image' => 'assets/img/fragrance.png',
        ],
        [
            'title' => 'Gas Cleaner',
            'image' => 'assets/img/cleaner.png',
        ],
        [
            'title' => 'Microfiber Towels',
            'image' => 'assets/img/towel.png',
        ],
        [
            'title' => 'Compressed Air',
            'image' => 'assets/img/air.png',
        ],
    ];
@endphp

<section class="bg-[#ededed] py-8 md:py-25">
    <div class="container">
        <div class="max-w-[900px] mx-auto text-center">
            <div
                class="py-2 px-4 inline-flex items-center gap-2 mb-4 text-[var(--color-heading)] bg-white rounded-[60px]">

                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.88059 9.60015L7.58967 12.3126C7.56525 12.3639 7.52871 12.4085 7.48321 12.4425C7.43771 12.4765 7.38461 12.499 7.32851 12.5079C7.2724 12.5168 7.21497 12.5119 7.16118 12.4936C7.10739 12.4753 7.05885 12.4443 7.01975 12.4031L4.95359 10.222C4.89824 10.1637 4.82449 10.1262 4.74475 10.1158L1.76625 9.72615C1.70992 9.71881 1.65621 9.69788 1.60978 9.66515C1.56334 9.63242 1.52557 9.58887 1.49973 9.53828C1.47389 9.48769 1.46075 9.43157 1.46145 9.37476C1.46215 9.31795 1.47667 9.26217 1.50375 9.21223L2.93992 6.57323C2.9783 6.50272 2.99127 6.42117 2.97667 6.34223L2.42659 3.38881C2.41614 3.33291 2.41947 3.27531 2.4363 3.22098C2.45312 3.16666 2.48293 3.11725 2.52314 3.07704C2.56336 3.03682 2.61276 3.00702 2.66709 2.99019C2.72141 2.97337 2.77902 2.97003 2.83492 2.98048L5.78775 3.53056C5.86688 3.54531 5.94866 3.53233 6.01934 3.49381L8.65775 2.05881C8.70763 2.03162 8.76338 2.01698 8.82018 2.01615C8.87699 2.01532 8.93314 2.02833 8.98379 2.05406C9.03444 2.07979 9.07806 2.11746 9.1109 2.16382C9.14373 2.21017 9.16479 2.26383 9.17225 2.32015L9.56192 5.29923C9.5724 5.37876 9.60988 5.45228 9.66809 5.50748L11.8492 7.57365C11.8904 7.61274 11.9215 7.66128 11.9397 7.71508C11.958 7.76887 11.9629 7.8263 11.954 7.8824C11.9451 7.93851 11.9226 7.9916 11.8886 8.0371C11.8546 8.0826 11.81 8.11914 11.7588 8.14356L9.04625 9.43448C8.97364 9.46903 8.91514 9.52753 8.88059 9.60015ZM9.3455 10.7242L10.1703 9.8994L12.6454 12.3739L11.82 13.1993L9.3455 10.7242Z"
                        fill="#124846" />
                </svg>

                <h3 class="text-[11px] font-semibold uppercase text-[var(--color-heading)]">We Offered More
                </h3>
            </div>
            <h2 class="text-[34px] font-extrabold mb-4 text-[var(--color-heading)] leading-[1.2] tracking-[0.02px]">
                Tired of struggling to keep your car clean?
            </h2>
            <p class="text-[16px] leading-[1.5] text-[var(--color-text)] font-sf">
                Enjoy complimentary amenities with every wash, including free vacuums window cleaners, and more.
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 mt-10 md:mt-20">
            @foreach ($benefits as $benefit)
                <div
                    class="h-[166px] bg-white rounded-[20px] p-[30px] flex flex-col justify-center items-center gap-8 text-center">
                    <img src="{{ asset($benefit['image']) }}" alt="{{ $benefit['title'] }}">
                    <h3 class="text-[20px] font-medium text-[var(--color-heading)] font-sf">{{  $benefit['title'] }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>