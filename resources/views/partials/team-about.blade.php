@php
    $teams = [
        [
            'name' => 'Jasper van Dijk',
            'position' => 'Owner',
            'image' => 'assets/img/team/team1.webp',
        ],
        [
            'name' => 'Daniel Hamilton',
            'position' => 'Service Man',
            'image' => 'assets/img/team/team2.webp',
        ],
        [
            'name' => 'Dennis Callis',
            'position' => 'Service Man',
            'image' => 'assets/img/team/team3.webp',
        ],
        [
            'name' => 'Lars De Vries',
            'position' => 'Service Man',
            'image' => 'assets/img/team/team4.webp',
        ],
    ];
@endphp
<section class="py-8 md:py-[50px]">
    <div class="container">
        <x-section-heading pretitle="Our Teams" title="Meet Our Dedicated Team">
            <x-slot name="icon">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_310_8500)">
                        <path
                            d="M6.5 7C7.42826 7 8.3185 6.63125 8.97487 5.97487C9.63125 5.3185 10 4.42826 10 3.5C10 2.57174 9.63125 1.6815 8.97487 1.02513C8.3185 0.368749 7.42826 0 6.5 0C5.57174 0 4.6815 0.368749 4.02513 1.02513C3.36875 1.6815 3 2.57174 3 3.5C3 4.42826 3.36875 5.3185 4.02513 5.97487C4.6815 6.63125 5.57174 7 6.5 7ZM5.25039 8.3125C2.55703 8.3125 0.375 10.4945 0.375 13.1879C0.375 13.6363 0.738672 14 1.18711 14H11.8129C12.2613 14 12.625 13.6363 12.625 13.1879C12.625 10.4945 10.443 8.3125 7.74961 8.3125H5.25039Z"
                            fill="#124846" />
                    </g>
                    <defs>
                        <clipPath id="clip0_310_8500">
                            <rect width="12.25" height="12.25" fill="white" transform="translate(0.375)" />
                        </clipPath>
                    </defs>
                </svg>
            </x-slot>
        </x-section-heading>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 mt-6 md:mt-[70px]">
            @foreach ($teams as $team)
                <div class="relative rounded-[20px] group transition-all duration-300">
                    <img src="{{ asset($team['image']) }}" alt="{{ $team['name'] }}"
                        class="w-full h-full object-cover rounded-[20px]">
                    <div
                        class="flex flex-col gap-0.5 absolute bottom-2 left-2 right-2 bg-white rounded-[12px] p-3 group-hover:bg-[var(--color-brand)] transition-all duration-300">
                        <h3
                            class="text-base md:text-[20px] font-semibold text-[var(--color-heading)] group-hover:text-white transition-all duration-300">
                            {{ $team['name'] }}
                        </h3>
                        <p
                            class="text-[16px] font-normal text-[var(--color-heading)] group-hover:text-white transition-all duration-300 font-sf">
                            {{ $team['position'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
