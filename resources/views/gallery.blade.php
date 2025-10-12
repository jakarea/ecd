@php
    $galleryImages = [
        [
            'id' => '1',
            'src' => 'assets/img/gallery1.webp',
            'category' => 'interior'
        ],
        [
            'id' => '2',
            'before' => 'assets/img/gallery1.webp',
            'after' => 'assets/img/gallery2.webp',
            'category' => 'before&after',
        ],
        [
            'id' => '3',
            'src' => 'assets/img/gallery3.webp',
            'category' => 'exterior',
        ],
        [
            'id' => '4',
            'before' => 'assets/img/gallery4.webp',
            'after' => 'assets/img/gallery5.webp',
            'category' => 'before&after',
        ],
        [
            'id' => '5',
            'src' => 'assets/img/gallery5.webp',
            'category' => 'interior',
        ],
        [
            'id' => '6',
            'src' => 'assets/img/gallery6.webp',
            'category' => 'exterior',
        ],
        [
            'id' => '7',
            'src' => 'assets/img/gallery7.webp',
            'category' => 'video',
        ],
        [
            'id' => '8',
            'src' => 'assets/img/gallery8.webp',
            'category' => 'exterior',
        ],
        [
            'id' => '9',
            'src' => 'assets/img/gallery9.webp',
            'category' => 'video',
        ],
    ];

@endphp

@extends('layouts.app')

@section('title', 'Gallery Page')

@section('content')
    <x-hero-section title="Our Work Speaks for Itself" bg-image="assets/img/bg-hero.png" bgColor="bg-[#ededed]" />

    <section class="pt-8 pb-16 md:py-25 bg-[#ededed] border-b border-[var(--color-brand)]">
        <div class="container">
            <div class="font-sf font-medium text-[24px] text-[var(--color-text)] text-center max-w-[840px] mx-auto">Explore
                our gallery of spotless finishes, detailed interiors, and shining results that showcase the quality and care
                we bring to every vehicle.</div>
        </div>
    </section>
    <section class="pt-12 pb-8 md:py-20 relative">
        <div class="container">
            <div class="flex justify-center px-4">
                <div class="flex justify-center absolute w-full -top-[21px] md:-top-[31px]">
                    <div id="filterButtons"
                        class="flex items-center border border-[var(--color-brand)] rounded-[60px] py-2.5 md:py-5 px-5 md:px-10 filter-buttons bg-white">
                        <button data-filter="all"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer pl-0 pr-[12px] md:pr-[28px] border-r border-[#D1D7DF] active">All</button>
                        <button data-filter="video"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[12px] md:px-[28px] border-r border-[#D1D7DF]">Videos</button>
                        <button data-filter="interior"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[12px] md:px-[28px] border-r border-[#D1D7DF]">Interior</button>
                        <button data-filter="exterior"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[12px] md:px-[28px] border-r border-[#D1D7DF]">Exterior</button>
                        <button data-filter="before&after"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer pl-[12px] pr-0 md:pl-[28px]">Before
                            & After</button>
                    </div>
                </div>
            </div>
            <div id="masonry" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($galleryImages as $image)
                    <div class="masonry-item" data-category="{{ $image['category'] }}">
                        @if ($image['category'] === 'before&after')
                            {{-- Before & After slider --}}
                            <div class="slider-container relative w-full h-full overflow-hidden rounded-[15px]">
                                <img src="{{ asset($image['before']) }}" alt="Before Image {{ $image['id'] }}"
                                    class="before-image absolute inset-0 w-full h-full object-cover" />
                                <img src="{{ asset($image['after']) }}" alt="After Image {{ $image['id'] }}"
                                    class="after-image absolute inset-0 w-full h-full object-cover" />
                                <div class="slider-line absolute top-0 bottom-0 w-[2px] bg-[var(--color-brand)] left-1/2"></div>
                                <div
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

                                </div>
                            </div>
                        @else
                            {{-- Normal image --}}
                            <img src="{{ asset($image['src']) }}" alt="Gallery Image {{ $image['id'] }}"
                                class="w-full h-full object-cover rounded-[15px]" />
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection

{{-- @push('styles')
<style>
    /* Each item should not break across columns */
    .masonry-item {
        display: inline-block;
        width: 100%;
        break-inside: avoid;
        -webkit-column-break-inside: avoid;
        -moz-column-break-inside: avoid;

        /* animation base state */
        opacity: 0;
        transform: translateY(18px) scale(.99);
        filter: blur(2px);
        transition: opacity .45s cubic-bezier(.2, .9, .2, 1),
            transform .45s cubic-bezier(.2, .9, .2, 1),
            filter .45s ease;
        /* transitionDelay will be set inline from JS for staggering */
        will-change: opacity, transform;
    }

    /* visible state */
    .masonry-item.show {
        opacity: 1;
        transform: none;
        filter: none;
    }

    /* visually-hidden state (if you want instant hide) */
    .masonry-item.hidden {
        opacity: 0 !important;
        transform: translateY(12px) scale(.98) !important;
        pointer-events: none;
        filter: blur(2px);
    }

    .gallery-img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 15px;
    }

    .filter-btn.active {
        color: var(--color-brand);
    }
</style>
@endpush --}}

@push('styles')
    <style>
        /* Each item should not break across columns */
        .masonry-item {
            display: inline-block;
            width: 100%;
            break-inside: avoid;
            -webkit-column-break-inside: avoid;
            -moz-column-break-inside: avoid;
        }

        .masonry-item.hidden {
            display: none !important;
        }

        .gallery-img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 15px;
        }

        .filter-btn.active {
            color: var(--color-brand);
        }
    </style>
@endpush

@push('scripts')
    <script>
        (function () {
            const buttonsContainer = document.getElementById('filterButtons');
            if (!buttonsContainer) return;

            const buttons = Array.from(buttonsContainer.querySelectorAll('[data-filter]'));
            const masonry = document.getElementById('masonry');
            if (!masonry) return;

            const items = Array.from(masonry.querySelectorAll('[data-category]'));

            // Ensure each item has the masonry-item class
            items.forEach(it => {
                if (!it.classList.contains('masonry-item')) it.classList.add('masonry-item');
            });

            function setActiveButton(targetBtn) {
                buttons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-pressed', 'false');
                });
                if (targetBtn) {
                    targetBtn.classList.add('active');
                    targetBtn.setAttribute('aria-pressed', 'true');
                }
            }

            function showItem(item) {
                item.classList.remove('hidden');
            }

            function hideItem(item) {
                item.classList.add('hidden');
            }

            function filterItems(category) {
                items.forEach((item) => {
                    const itemCategory = item.getAttribute('data-category') || '';
                    if (category === 'all' || itemCategory === category) {
                        showItem(item);
                    } else {
                        hideItem(item);
                    }
                });
            }

            buttons.forEach(btn => {
                btn.style.cursor = btn.style.cursor || 'pointer';
                btn.addEventListener('click', function () {
                    const cat = this.getAttribute('data-filter');
                    setActiveButton(this);
                    filterItems(cat);
                });
                btn.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        btn.click();
                    }
                });
                if (!btn.hasAttribute('aria-pressed')) btn.setAttribute('aria-pressed', 'false');
            });

            // Initialize
            const initialBtn = buttons.find(b => b.getAttribute('data-filter') === 'all') || buttons[0];
            setActiveButton(initialBtn);
            filterItems(initialBtn.getAttribute('data-filter'));

        })();

        //before after

        document.addEventListener("DOMContentLoaded", function () {
            // Target only the before&after gallery items
            const beforeAfterItems = document.querySelectorAll('.masonry-item[data-category="before&after"]');

            beforeAfterItems.forEach((item) => {
                const sliderContainer = item.querySelector(".slider-container");
                const sliderHandle = item.querySelector(".slider-handle");
                const sliderLine = item.querySelector(".slider-line");
                const beforeImage = item.querySelector(".before-image");
                const afterImage = item.querySelector(".after-image");

                if (!sliderContainer || !sliderHandle || !sliderLine || !beforeImage || !afterImage) return;

                let isDragging = false;

                // Function to initialize the slider at the center position
                const initializeSlider = () => {
                    const containerWidth = sliderContainer.offsetWidth;

                    // Set slider handle and line at center with a transition for initialization
                    sliderHandle.style.transition = "left 0.3s ease";
                    sliderLine.style.transition = "left 0.3s ease";

                    sliderHandle.style.left = "50%";
                    sliderLine.style.left = "50%";

                    // Set both images' clip-path to 50% (center)
                    beforeImage.style.clipPath = `inset(0 50% 0 0)`;
                    afterImage.style.clipPath = `inset(0 0 0 50%)`;
                };

                // Function to move the slider based on user interaction
                const moveSlider = (clientX) => {
                    const containerRect = sliderContainer.getBoundingClientRect();
                    let offsetX = clientX - containerRect.left;

                    // Limit the slider movement within the full container width (0% to 100%)
                    if (offsetX < 0) offsetX = 0; // Prevent overflow on the left
                    if (offsetX > containerRect.width) offsetX = containerRect.width; // Prevent overflow on the right

                    const percentage = Math.round((offsetX / containerRect.width) * 100);

                    // Update the slider handle position and image clipping
                    sliderHandle.style.left = `${percentage}%`;
                    sliderLine.style.left = `${percentage}%`;

                    // Adjust the clip-path for both images
                    beforeImage.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
                    afterImage.style.clipPath = `inset(0 0 0 ${percentage}%)`;
                };

                // Add event listeners for both the handle and the line (including the SVG)
                const startDragging = () => {
                    isDragging = true;

                    // Remove transitions while dragging for instant feedback
                    sliderHandle.style.transition = "none";
                    sliderLine.style.transition = "none";
                };

                const stopDragging = () => {
                    isDragging = false;

                    // Reapply transitions after dragging ends
                    sliderHandle.style.transition = "left 0.3s ease";
                    sliderLine.style.transition = "left 0.3s ease";
                };

                sliderHandle.addEventListener("mousedown", startDragging);
                sliderLine.addEventListener("mousedown", startDragging);

                window.addEventListener("mousemove", (event) => {
                    if (isDragging) moveSlider(event.clientX);
                });

                window.addEventListener("mouseup", stopDragging);

                // Touch events for mobile
                sliderHandle.addEventListener("touchstart", startDragging);
                sliderLine.addEventListener("touchstart", startDragging);

                window.addEventListener("touchmove", (event) => {
                    if (isDragging) moveSlider(event.touches[0].clientX);
                });

                window.addEventListener("touchend", stopDragging);

                // Initialize the slider on load
                window.addEventListener("load", initializeSlider);
            });
        });

    </script>
@endpush


{{-- @push('scripts')
<script>
    (function () {
        const buttonsContainer = document.getElementById('filterButtons');
        if (!buttonsContainer) return;

        const buttons = Array.from(buttonsContainer.querySelectorAll('[data-filter]'));
        const masonry = document.getElementById('masonry');
        if (!masonry) return;

        const items = Array.from(masonry.querySelectorAll('[data-category]'));

        // Ensure each item has the animation classes we expect
        items.forEach(it => {
            if (!it.classList.contains('masonry-item')) it.classList.add('masonry-item');
        });

        // helper to mark active button (visual + aria)
        function setActiveButton(targetBtn) {
            buttons.forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-pressed', 'false');
            });
            if (targetBtn) {
                targetBtn.classList.add('active');
                targetBtn.setAttribute('aria-pressed', 'true');
            }
        }

        // Utility: wait for an element's transitionend for a particular property (promise)
        function waitForTransitionEnd(el, propName, timeout = 500) {
            return new Promise(resolve => {
                let done = false;
                const onEnd = (e) => {
                    if (propName && e.propertyName !== propName) return;
                    if (done) return;
                    done = true;
                    cleanup();
                    resolve(e);
                };
                const onTimeout = () => {
                    if (done) return;
                    done = true;
                    cleanup();
                    resolve(null);
                };
                function cleanup() {
                    el.removeEventListener('transitionend', onEnd);
                    clearTimeout(tid);
                }
                el.addEventListener('transitionend', onEnd);
                const tid = setTimeout(onTimeout, timeout);
            });
        }

        // Show item: ensure it's in flow then animate in
        async function showItem(item, delayMs = 0) {
            // If already visible, ensure show class exists
            if (item.style.display === '' || item.style.display === 'block' || item.style.display === 'inline-block' || getComputedStyle(item).display !== 'none') {
                // it's in flow -> animate if not shown
                item.classList.remove('hidden');
                // set transition delay for stagger
                item.style.transitionDelay = `${delayMs}ms`;
                // Force a reflow so transitionDelay is acknowledged
                void item.offsetWidth;
                item.classList.add('show');
                return;
            }

            // Put it back into the flow (let CSS grid decide the display)
            item.style.display = ''; // remove inline display:none
            // small reflow
            void item.offsetHeight;
            // remove hidden marker & set delay then add show to animate
            item.classList.remove('hidden');
            item.style.transitionDelay = `${delayMs}ms`;
            // small tick before adding show so transition applies
            setTimeout(() => item.classList.add('show'), 20);
        }

        // Hide item: animate out then remove from flow (display:none) after transition
        async function hideItem(item) {
            // If already removed from flow, nothing to do
            if (getComputedStyle(item).display === 'none') {
                item.classList.remove('show');
                item.classList.add('hidden');
                item.style.transitionDelay = '';
                return;
            }

            // Start hide animation
            item.classList.remove('show');
            item.style.transitionDelay = '0ms';
            item.classList.add('hidden');

            // Wait for the opacity transition to finish (or timeout)
            await waitForTransitionEnd(item, 'opacity', 600);
            // After fade-out completes, remove it from flow to collapse grid
            // but only if it's still hidden (user might have re-shown it before transition end)
            if (item.classList.contains('hidden') && !item.classList.contains('show')) {
                item.style.display = 'none';
            }
        }

        // Filter with nice stagger: show visible ones, hide others
        function filterItems(category) {
            let visibleIndex = 0;

            items.forEach((item) => {
                const itemCategory = item.getAttribute('data-category') || '';

                // clear inline delay by default
                item.style.transitionDelay = '';

                if (category === 'all' || itemCategory === category) {
                    // show with stagger
                    const delay = visibleIndex * 45;
                    showItem(item, delay);
                    visibleIndex++;
                } else {
                    // hide and then remove from flow after animation
                    hideItem(item);
                }
            });
        }

        // Attach click & keyboard behaviors
        buttons.forEach(btn => {
            btn.style.cursor = btn.style.cursor || 'pointer';
            btn.addEventListener('click', function () {
                const cat = this.getAttribute('data-filter');
                setActiveButton(this);
                filterItems(cat);
            });
            btn.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    btn.click();
                }
            });
            if (!btn.hasAttribute('aria-pressed')) btn.setAttribute('aria-pressed', 'false');
        });

        // Initialize: set "all" active and reveal items with stagger
        const initialBtn = buttons.find(b => b.getAttribute('data-filter') === 'all') || buttons[0];
        setActiveButton(initialBtn);

        items.forEach((item, idx) => {
            // ensure items are visible in flow initially
            item.style.display = '';
            item.classList.remove('hidden');
            item.classList.remove('show');
            // initial stagger
            item.style.transitionDelay = `${idx * 40}ms`;
            setTimeout(() => item.classList.add('show'), 30 + idx * 40);
        });

        // Reflow guard for images (optional, keeps layout stable)
        const imgs = masonry.querySelectorAll('img');
        let imagesToLoad = imgs.length;
        if (imagesToLoad === 0) return;
        imgs.forEach(img => {
            if (img.complete) {
                imagesToLoad--;
            } else {
                img.addEventListener('load', () => {
                    imagesToLoad--;
                    if (imagesToLoad === 0) {
                        masonry.style.visibility = 'hidden';
                        setTimeout(() => masonry.style.visibility = '', 20);
                    }
                });
                img.addEventListener('error', () => {
                    imagesToLoad--;
                    if (imagesToLoad === 0) {
                        masonry.style.visibility = 'hidden';
                        setTimeout(() => masonry.style.visibility = '', 20);
                    }
                });
            }
        });
    })();
</script>
@endpush --}}