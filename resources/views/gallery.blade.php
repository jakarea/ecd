@php
    $galleryImages = [
        [
            'id' => '1',
            'src' => 'assets/img/gallery1.webp',
            'category' => 'interior'
        ],
        [
            'id' => '2',
            'src' => 'assets/img/gallery2.webp',
            'category' => 'before&after',
        ],
        [
            'id' => '3',
            'src' => 'assets/img/gallery3.webp',
            'category' => 'exterior',
        ],
        [
            'id' => '4',
            'src' => 'assets/img/gallery4.webp',
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
    ]
@endphp

@extends('layouts.app')

@section('title', 'Gallery Page')

@section('content')
    <x-hero-section title="Our Work Speaks for Itself" bg-image="assets/img/bg-hero.png" bgColor="bg-[#ededed]" />

    <section class="py-8 md:py-25 bg-[#ededed]">
        <div class="container">
            <div class="font-sf font-medium text-[24px] text-[var(--color-text)] text-center max-w-[840px] mx-auto">Explore
                our gallery of spotless finishes, detailed interiors, and shining results that showcase the quality and care
                we bring to every vehicle.</div>
        </div>
    </section>
    <section class="py-8 md:py-20 relative">
        <div class="container">
            <div class="flex justify-center">
                <div class="flex justify-center absolute w-full -top-[31px]">
                    <div id="filterButtons"
                        class="flex items-center border border-[var(--color-brand)] rounded-[60px] py-5 px-10 filter-buttons bg-white">
                        <button data-filter="all"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[28px] border-r border-[#D1D7DF] active">All</button>
                        <button data-filter="video"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[28px] border-r border-[#D1D7DF]">Videos</button>
                        <button data-filter="interior"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[28px] border-r border-[#D1D7DF]">Interior</button>
                        <button data-filter="exterior"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[28px] border-r border-[#D1D7DF]">Exterior</button>
                        <button data-filter="before&after"
                            class="filter-btn text-sm text-[var(--color-text)] font-semibold text-center inline-block cursor-pointer px-[28px]">Before
                            & After</button>
                    </div>
                </div>
            </div>
            <div id="masonry" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($galleryImages as $image)
                    <div class="masonry-item" data-category="{{ $image['category'] }}">
                        <img src="{{ asset($image['src']) }}" alt="Gallery Image{{ $image['id'] }}"
                            class="w-full h-full object-cover rounded-[15px]">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Masonry (CSS columns) */
        /* #masonry {
                                        column-gap: 1.25rem;
                                        column-count: 3;
                                    } */

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

        .filter-buttons {
            gap: 0.5rem;
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
@endpush