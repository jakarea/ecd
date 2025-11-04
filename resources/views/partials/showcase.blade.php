@php
use Illuminate\Support\Facades\Storage;
@endphp

{{-- Preload critical CSS --}}
<link rel="preload" href="{{ asset('assets/css/cndk.beforeafter.css') }}" as="style">

{{-- Defer non-critical CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" media="print" onload="this.media='all'" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" media="print" onload="this.media='all'" />
<link rel="stylesheet" href="{{ asset('assets/css/cndk.beforeafter.css') }}" />
<noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
</noscript>

<section class="py-8 md:py-25">
    <div class="container">
        <x-section-heading pretitle="{{ __('We Prove It') }}" title="{{ __('Transform Your Ride: Stunning before & after car detailing') }}"
            description="{{ __('Our skilled team employs top-notch techniques and') }}"
            width="max-w-[948px]">
            <x-slot name="icon">
                <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.5 0.137207L0.25 2.47054V5.97054C0.25 9.20804 2.49 12.2355 5.5 12.9705C8.51 12.2355 10.75 9.20804 10.75 5.97054V2.47054L5.5 0.137207ZM7.29667 8.88721L5.5 7.80804L3.70917 8.88721L4.18167 6.84554L2.60083 5.48054L4.68917 5.29971L5.5 3.37471L6.31083 5.29387L8.39917 5.47471L6.81833 6.84554L7.29667 8.88721Z"
                        fill="#124846" />
                </svg>
            </x-slot>
        </x-section-heading>
    </div>
    @if(isset($galleryItems) && $galleryItems->count() > 0)
    <div class="showcase-slider-container">
        <div class="showcase-image-slider -mx-3 px-6 mt-20" id="showcase-slider">
                @foreach($galleryItems as $index => $item)
            <div class="showcase-image">
                <div class="showcase-card">
                    <div class="slider-container relative w-full h-full overflow-hidden rounded-[15px]">
                                <img src="{{ Storage::url($item->before_image) }}" alt="{{ __('Before Image ') . ($item->title ?? ('' . ($index + 1))) }}"
                            class="before-image absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async" />
                                <img src="{{ Storage::url($item->after_image) }}" alt="{{ __('After Image ') . ($item->title ?? ('' . ($index + 1))) }}"
                            class="after-image absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async" />
                        <span class="slider-line absolute top-0 bottom-0 w-[2px] bg-[var(--color-brand)] left-1/2"></span>
                        <button
                            class="slider-handle absolute top-1/2 left-1/2 w-[55px] h-[55px] bg-[var(--color-brand)] border-2 border-[var(--color-brand)] rounded-full cursor-pointer transform -translate-x-1/2 -translate-y-1/2 shadow-md flex justify-center items-center gap-1.5">
                            <svg width="12" height="9" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.50072 10.2778L1.06348 5.84053L5.50072 1.40329" stroke="white"
                                    stroke-width="1.11598" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M1.06348 5.84039L12.7684 5.84039" stroke="white" stroke-width="1.11598"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg width="2" height="10" viewBox="0 0 2 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.782561" y1="0.910613" x2="0.782561" y2="10.0397" stroke="white"
                                    stroke-width="1.01434" stroke-linecap="round" />
                            </svg>
                            <svg width="12" height="9" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.05006 10.278L12.4873 5.84071L8.05006 1.40347" stroke="white"
                                    stroke-width="1.11598" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.4873 5.84058L0.782391 5.84058" stroke="white" stroke-width="1.11598"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
                @endforeach
            </div>
            <div class="slider-controls"></div>
        </div>
    @endif

    {{-- Mobile Only Showcase --}}
    @if(isset($galleryItems) && $galleryItems->count() > 0)
        <div class="mobile-showcase">
        <div class="showcase-card">
            <div class="slider-container relative w-full h-full overflow-hidden rounded-[15px]">
                    @php $firstItem = $galleryItems->first(); @endphp
                    <img src="{{ Storage::url($firstItem->before_image) }}" alt="{{ __('Before Image ') . ($firstItem->title ?? '') }}"
                    class="before-image absolute inset-0 w-full h-full object-cover" loading="eager" decoding="async" />
                    <img src="{{ Storage::url($firstItem->after_image) }}" alt="{{ __('After Image ') . ($firstItem->title ?? '') }}"
                    class="after-image absolute inset-0 w-full h-full object-cover" loading="eager" decoding="async" />
                <span class="slider-line absolute top-0 bottom-0 w-[2px] bg-[var(--color-brand)] left-1/2"></span>
                <button
                    class="slider-handle absolute top-1/2 left-1/2 w-[55px] h-[55px] bg-[var(--color-brand)] border-2 border-[var(--color-brand)] rounded-full cursor-pointer transform -translate-x-1/2 -translate-y-1/2 shadow-md flex justify-center items-center gap-1.5">
                    <svg width="12" height="9" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.50072 10.2778L1.06348 5.84053L5.50072 1.40329" stroke="white"
                            stroke-width="1.11598" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.06348 5.84039L12.7684 5.84039" stroke="white" stroke-width="1.11598"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg width="2" height="10" viewBox="0 0 2 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="0.782561" y1="0.910613" x2="0.782561" y2="10.0397" stroke="white"
                            stroke-width="1.01434" stroke-linecap="round" />
                    </svg>
                    <svg width="12" height="9" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.05006 10.278L12.4873 5.84071L8.05006 1.40347" stroke="white"
                            stroke-width="1.11598" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.4873 5.84058L0.782391 5.84058" stroke="white" stroke-width="1.11598"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @endif
</section>


<!-- scripts - Deferred for performance -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" defer></script>
<script src="{{asset('assets/js/cndk.beforeafter.js')}}" defer></script>

<script>
    $(document).ready(function () {
        if (window.innerWidth > 767) {
            var sliderInstance = $('#showcase-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                arrows: true,
                dots: true,
                speed: 300,
                centerPadding: '20px',
                infinite: true,
                autoplaySpeed: 2000,
                draggable: false,
                swipe: false,
                touchMove: false,
                autoplay: true,
                appendArrows: $('.slider-controls'),
                appendDots: $('.slider-controls'),

                prevArrow: `<button type="button" class="slick-prev custom-arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>`,
                nextArrow: `<button type="button" class="slick-next custom-arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 6L15 12L9 18" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>`,

                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        centerMode: false,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                    }
                },

                ]
            });

            // Pause autoplay when hovering over center slide
            $('#showcase-slider').on('mouseenter', '.slick-center .showcase-card', function() {
                sliderInstance.slick('slickPause');
            });

            // Resume autoplay when mouse leaves center slide
            $('#showcase-slider').on('mouseleave', '.slick-center .showcase-card', function() {
                sliderInstance.slick('slickPlay');
            });

            // Function to update slide images based on position
            function updateSlideImages() {
                const $slides = $('#showcase-slider .slick-slide');
                const $centerSlide = $('#showcase-slider .slick-center');

                if ($centerSlide.length === 0) return;

                const centerIndex = $centerSlide.index();

                $slides.each(function(index) {
                    const $slide = $(this);
                    const $beforeImg = $slide.find('.before-image');
                    const $afterImg = $slide.find('.after-image');

                    // Skip cloned slides
                    if ($slide.hasClass('slick-cloned')) return;

                    const slideIndex = $slide.attr('data-slick-index');

                    if ($slide.hasClass('slick-center')) {
                        // Center slide: show 50/50 comparison with both images visible
                        $beforeImg.css({
                            'clip-path': 'inset(0 50% 0 0)',
                            'opacity': '1'
                        });
                        $afterImg.css({
                            'clip-path': 'inset(0 0 0 50%)',
                            'opacity': '1'
                        });

                        // Reset handle and line to center position
                        const $handle = $slide.find('.slider-handle');
                        const $line = $slide.find('.slider-line');
                        $handle.css('left', '50%');
                        $line.css('left', '50%');
                    } else if (index < centerIndex) {
                        // LEFT of center: show AFTER image with fade
                        $beforeImg.css({
                            'clip-path': 'inset(0 100% 0 0)',
                            'opacity': '0'
                        });
                        $afterImg.css({
                            'clip-path': 'inset(0 0 0 0)',
                            'opacity': '1'
                        });
                    } else {
                        // RIGHT of center: show BEFORE image with fade
                        $beforeImg.css({
                            'clip-path': 'inset(0 0 0 0)',
                            'opacity': '1'
                        });
                        $afterImg.css({
                            'clip-path': 'inset(0 100% 0 0)',
                            'opacity': '0'
                        });
                    }
                });
            }

            // Update on init, after change, and after swipe
            sliderInstance.on('init afterChange', updateSlideImages);
            updateSlideImages();
        }
    });
</script>

<style>
    @media (max-width: 767px) {
        .showcase-slider-container {
            display: none;
        }
        .mobile-showcase {
            display: block;
            width: 100%;
            max-width: 500px; /* Adjust as needed */
            margin: 0 auto;
            height: 384px; /* Match slider height */
        }
        .mobile-showcase .showcase-card {
            height: 384px; /* Ensure inner container has explicit height for h-full children */
        }
    }
    @media (min-width: 768px) {
        .mobile-showcase {
            display: none;
        }
    }

    .showcase-image-slider .slick-track {
        padding: 50px 0;
    }

    .showcase-image-slider .slick-slide {
        height: 384px;
        margin: 0 15px 0 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: scale(0.8);
        transition: all 0.4s ease-in-out;
        border-radius: 20px;
    }

    .showcase-image-slider .slick-slide,
    .showcase-image-slider .slick-slide[aria-hidden="true"]:not(.slick-cloned)~.slick-cloned[aria-hidden="true"] {
        transform: scale(0.8, 0.8);
        transition: all 0.4s ease-in-out;
    }

    /* Active center slide (You can change anything here for cenetr slide)*/
    .showcase-image-slider .slick-center,
    .showcase-image-slider .slick-slide[aria-hidden="true"]:not([tabindex="-1"])+.slick-cloned[aria-hidden="true"] {
        transform: scale(1.1);
    }

    .showcase-image-slider .slick-current.slick-active {
        transform: scale(1.1);
    }

    .showcase-image-slider .slick-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
    }

    /* Smooth fade transition for before/after images */
    .showcase-image-slider .before-image,
    .showcase-image-slider .after-image {
        transition: opacity 0.6s ease-in-out, clip-path 0.6s ease-in-out;
    }

    /* Smooth transition for slider handle and line */
    .showcase-image-slider .slider-handle,
    .showcase-image-slider .slider-line {
        transition: left 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }

    .showcase-image-slider .slick-slide div {
        width: 100%;
        height: 100%;
    }

    /* Hide slider handle and line on non-center slides */
    .showcase-image-slider .slick-slide:not(.slick-center) .slider-handle,
    .showcase-image-slider .slick-slide:not(.slick-center) .slider-line {
        display: none;
        pointer-events: none;
    }

    /* Show and enable slider handle and line only on center slide */
    .showcase-image-slider .slick-center .slider-handle,
    .showcase-image-slider .slick-center .slider-line {
        display: flex;
        pointer-events: auto;
        cursor: pointer;
    }

    /* JavaScript will handle showing before/after images based on position */

    /* Wrapper for controls below slider */
    .slider-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        /* space between arrows and dots */
        margin-top: 20px;
    }

    /* --- Slider Control Area (arrows + dots) --- */
    .slider-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        /* supports responsive stacking if needed */
        gap: 20px;
        margin-top: 20px;
    }

    /* --- Custom Arrow Buttons --- */
    .custom-arrow {
        position: static;
        background: none;
        border: none;
        padding: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease;
    }

    .custom-arrow:hover {
        transform: scale(1.1);
    }

    .custom-arrow svg {
        width: 28px;
        height: 28px;
        stroke: #000;
    }

    /* --- Slick Dots (Pagination) --- */
    .showcase-slider-container .slick-dots {
        position: static;
        display: flex !important;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .showcase-slider-container .slick-dots li {
        margin: 0;
    }

    .showcase-slider-container .slick-dots li button {
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
    }

    .showcase-slider-container .slick-dots li button:before {
        content: '';
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #000;
        opacity: 0.3;
        transition: opacity 0.3s;
    }

    .showcase-slider-container .slick-dots li.slick-active button:before {
        opacity: 1;
    }
</style>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const containers = document.querySelectorAll('.slider-container');

            containers.forEach(container => {
                const handle = container.querySelector('.slider-handle');
                const line = container.querySelector('.slider-line');
                const beforeImg = container.querySelector('.before-image');
                const afterImg = container.querySelector('.after-image');

                let isDragging = false;

                const updateSlider = (x) => {
                    const rect = container.getBoundingClientRect();
                    let offsetX = x - rect.left;

                    // Clamp value between 0 and container width
                    offsetX = Math.max(0, Math.min(offsetX, rect.width));
                    const percent = (offsetX / rect.width) * 100;

                    handle.style.left = `${percent}%`;
                    line.style.left = `${percent}%`;

                    beforeImg.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
                    afterImg.style.clipPath = `inset(0 0 0 ${percent}%)`;
                };

                const startDrag = (e) => {
                    // Only allow dragging if this container is in the center slide
                    const parentSlide = container.closest('.slick-slide');
                    if (parentSlide && !parentSlide.classList.contains('slick-center') && window.innerWidth > 767) {
                        return;
                    }

                    isDragging = true;

                    // Disable transitions while dragging for instant response
                    beforeImg.style.transition = 'none';
                    afterImg.style.transition = 'none';
                    handle.style.transition = 'none';
                    line.style.transition = 'none';

                    e.preventDefault();
                };

                const stopDrag = () => {
                    isDragging = false;

                    // Re-enable transitions after dragging stops
                    beforeImg.style.transition = '';
                    afterImg.style.transition = '';
                    handle.style.transition = '';
                    line.style.transition = '';
                };

                const onMove = (e) => {
                    if (!isDragging) return;

                    // Double-check we're still on center slide
                    const parentSlide = container.closest('.slick-slide');
                    if (parentSlide && !parentSlide.classList.contains('slick-center') && window.innerWidth > 767) {
                        isDragging = false;
                        return;
                    }

                    const clientX = e.touches ? e.touches[0].clientX : e.clientX;
                    updateSlider(clientX);
                };

                // Mouse Events
                handle.addEventListener('mousedown', startDrag);
                window.addEventListener('mousemove', onMove);
                window.addEventListener('mouseup', stopDrag);

                // Touch Events
                handle.addEventListener('touchstart', startDrag, { passive: false });
                window.addEventListener('touchmove', onMove, { passive: false });
                window.addEventListener('touchend', stopDrag);

                // Initialize to 50%
                updateSlider(container.getBoundingClientRect().width / 2 + container.getBoundingClientRect().left);
            });
        });
    </script>

@endpush
