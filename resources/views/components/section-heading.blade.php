@props(['width' => $width ?? 'max-w-[566px]'])

<div {{ $attributes->class(["mx-auto text-center mb-6 md:mb-20 {$width}"]) }}>
    {{-- Pretitle badge with icon slot or default icon --}}
    <div
        class="bg-[#6ADBD926] py-2 px-4 inline-flex items-center gap-2 mb-4 rounded-[60px] text-[var(--color-heading)]">
        <span class="inline-flex items-center">
            @isset($icon)
                {{-- If caller provided <x-slot name="icon">... --}}
                    {{ $icon }}
            @else
                    {{-- default small user icon (same as original) --}}
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mr-2">
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
                @endisset
        </span>

        <h3 class="text-[11px] font-semibold uppercase font-poppins">{{ $pretitle }}</h3>
    </div>

    {{-- Title (allows HTML if you intentionally pass safe HTML) --}}
    <h2
        class="text-[28px] md:text-[34px] font-extrabold leading-[1.2] tracking-[0.02px] text-[var(--color-heading)] mb-4">
        {!! $title !!}
    </h2>

    {{-- Description --}}
    @if($description)
        <p class="text-[16px] text-[var(--color-text)] leading-[1.5] font-sf">
            {{ $description }}
        </p>
    @endif

    {{-- slot for extra content (buttons, links) --}}
    @if(trim($slot))
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>