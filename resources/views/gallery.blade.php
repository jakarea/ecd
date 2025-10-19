@extends('layouts.app')

@section('title', __('Gallery Page'))

@section('content')
    <x-hero-section pageId="gallery" />

    <section class="pt-8 pb-16 md:py-25 bg-[#ededed] border-b border-[var(--color-brand)]">
        <div class="container">
            <div
                class="font-sf font-medium text-[16px] md:text-[24px] leading-[28px] md:leading-[36px] text-[var(--color-text)] text-center max-w-[840px] mx-auto">{{ __('Explore
                                    our gallery of spotless finishes, detailed interiors, and shining results that showcase the quality and care
                                    we bring to every vehicle.') }}</div>
        </div>
    </section>
    <section class="pt-12 pb-8 md:py-20 relative">
        <div class="container">
            <div class="flex justify-center px-4">
                <div class="flex justify-center absolute w-full -top-[21px] md:-top-[31px]">
                    <div id="filterButtons"
                        class="flex items-center border border-[var(--color-brand)] rounded-[60px] py-2.5 md:py-5 px-4 md:px-10 filter-buttons bg-white [box-shadow:0px_8px_13.78px_0px_#10182810]">
                        <button data-filter="all"
                            class="filter-btn text-xs sm:text-sm text-[var(--color-heading)] font-semibold text-center inline-block cursor-pointer pl-0 pr-[10px] md:pr-[28px] border-r border-[#D1D7DF] active">{{ __('All') }}</button>
                        <button data-filter="video"
                            class="filter-btn text-xs sm:text-sm text-[var(--color-heading)] font-semibold text-center inline-block cursor-pointer px-[10px] md:px-[28px] border-r border-[#D1D7DF]">{{ __('Videos') }}</button>
                        <button data-filter="interior"
                            class="filter-btn text-xs sm:text-sm text-[var(--color-heading)] font-semibold text-center inline-block cursor-pointer px-[10px] md:px-[28px] border-r border-[#D1D7DF]">{{ __('Interior') }}</button>
                        <button data-filter="exterior"
                            class="filter-btn text-xs sm:text-sm text-[var(--color-heading)] font-semibold text-center inline-block cursor-pointer px-[10px] md:px-[28px] border-r border-[#D1D7DF]">{{ __('Exterior') }}</button>
                        <button data-filter="before&after"
                            class="filter-btn text-xs sm:text-sm text-[var(--color-heading)] font-semibold text-center inline-block cursor-pointer pl-[10px] pr-0 md:pl-[28px]">{{ __('Before
                                                & After') }}</button>
                    </div>
                </div>
            </div>
            <div id="masonry" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @include('partials.gallery-items', ['galleryItems' => $galleryItems])
            </div>

            {{-- Loading indicator --}}
            <div id="loading-indicator" class="hidden text-center py-8">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-[var(--color-brand)]"></div>
                <p class="mt-4 text-gray-600">{{ __('Loading more items...') }}</p>
            </div>

            {{-- End of content message --}}
            <div id="end-message" class="hidden text-center py-8">
                <p class="text-gray-600">{{ __('You\'ve reached the end of the gallery') }}</p>
            </div>

        </div>
    </section>

    {{-- Video Modal --}}
    <div id="videoModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
        <div class="relative w-full max-w-4xl bg-black rounded-lg overflow-hidden">
            <button id="closeModal"
                class="absolute top-4 right-4 z-10 w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-gray-200 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="relative pt-[56.25%]">
                <iframe id="videoFrame" class="absolute inset-0 w-full h-full" src="" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Masonry item styles with smooth animations */
        .masonry-item {
            display: inline-block;
            width: 100%;
            height: 280px;
            break-inside: avoid;
            -webkit-column-break-inside: avoid;
            -moz-column-break-inside: avoid;
            opacity: 1;
            transform: translateY(0) scale(1);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .masonry-item.fade-out {
            opacity: 0;
            transform: translateY(-10px) scale(0.98);
        }

        .masonry-item.fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
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

        /* Video modal animations */
        #videoModal {
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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

            let currentFilter = 'all';
            let currentPage = 1;
            let isLoading = false;
            let hasMorePages = {{ $galleryItems->hasMorePages() ? 'true' : 'false' }};
            const loadingIndicator = document.getElementById('loading-indicator');
            const endMessage = document.getElementById('end-message');

            // Get all items currently in the DOM
            function getItems() {
                return Array.from(masonry.querySelectorAll('[data-category]'));
            }

            // Set active button
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

            // Show item with fade-in animation
            function showItem(item, delay = 0) {
                setTimeout(() => {
                    item.classList.remove('hidden', 'fade-out');
                    item.classList.add('fade-in');
                }, delay);
            }

            // Hide item with fade-out animation
            function hideItem(item) {
                item.classList.add('fade-out');
                setTimeout(() => {
                    item.classList.add('hidden');
                    item.classList.remove('fade-out');
                }, 400); // Match transition duration
            }

            // Filter items with smooth animations
            function filterItems(category) {
                const items = getItems();
                let visibleIndex = 0;

                items.forEach((item) => {
                    const itemCategory = item.getAttribute('data-category') || '';

                    if (category === 'all' || itemCategory === category) {
                        showItem(item, visibleIndex * 50); // Stagger animation
                        visibleIndex++;
                    } else {
                        hideItem(item);
                    }
                });
            }

            // Load more items with AJAX
            function loadMoreItems() {
                if (isLoading || !hasMorePages) return;

                isLoading = true;
                loadingIndicator.classList.remove('hidden');

                const nextPage = currentPage + 1;
                const url = `{{ route('gallery', ['locale' => app()->getLocale()]) }}?page=${nextPage}&type=${currentFilter}`;


                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.items) {
                            // Insert new items
                            masonry.insertAdjacentHTML('beforeend', data.items);

                            // Initialize before/after sliders for new items
                            initializeBeforeAfterSliders();

                            // Animate new items in
                            const newItems = Array.from(masonry.querySelectorAll('[data-category]')).slice(-data
                                .items.match(/data-category/g).length);
                            newItems.forEach((item, index) => {
                                item.classList.add('hidden');
                                showItem(item, index * 50);
                            });

                            currentPage = data.next_page - 1;
                            hasMorePages = data.has_more;

                            if (!hasMorePages) {
                                endMessage.classList.remove('hidden');
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error loading more items:', error);
                    })
                    .finally(() => {
                        isLoading = false;
                        loadingIndicator.classList.add('hidden');
                    });
            }

            // Infinite scroll handler
            function handleScroll() {
                const scrollPosition = window.innerHeight + window.scrollY;
                const pageHeight = document.documentElement.scrollHeight;

                if (scrollPosition >= pageHeight - 500) { // Trigger 500px before bottom
                    loadMoreItems();
                }
            }

            // Attach filter button events
            buttons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const cat = this.getAttribute('data-filter');
                    setActiveButton(this);
                    currentFilter = cat;

                    // Reset pagination when filter changes
                    currentPage = 1;
                    hasMorePages = true;
                    endMessage.classList.add('hidden');

                    filterItems(cat);
                });
            });

            // Initialize
            const initialBtn = buttons.find(b => b.getAttribute('data-filter') === 'all') || buttons[0];
            setActiveButton(initialBtn);

            // Attach scroll event for infinite scroll
            window.addEventListener('scroll', handleScroll);

            // Initialize before/after sliders
            function initializeBeforeAfterSliders() {
                const beforeAfterItems = document.querySelectorAll('.masonry-item[data-category="before&after"]');

                beforeAfterItems.forEach((item) => {
                    const sliderContainer = item.querySelector(".slider-container");
                    const sliderHandle = item.querySelector(".slider-handle");
                    const sliderLine = item.querySelector(".slider-line");
                    const beforeImage = item.querySelector(".before-image");
                    const afterImage = item.querySelector(".after-image");

                    if (!sliderContainer || !sliderHandle || !sliderLine || !beforeImage || !afterImage) return;

                    // Check if already initialized
                    if (sliderContainer.dataset.initialized === 'true') return;
                    sliderContainer.dataset.initialized = 'true';

                    let isDragging = false;

                    // Initialize the slider at the center position
                    const initializeSlider = () => {
                        sliderHandle.style.transition = "left 0.3s ease";
                        sliderLine.style.transition = "left 0.3s ease";
                        sliderHandle.style.left = "50%";
                        sliderLine.style.left = "50%";
                        beforeImage.style.clipPath = `inset(0 50% 0 0)`;
                        afterImage.style.clipPath = `inset(0 0 0 50%)`;
                    };

                    // Move the slider based on user interaction
                    const moveSlider = (clientX) => {
                        const containerRect = sliderContainer.getBoundingClientRect();
                        let offsetX = clientX - containerRect.left;

                        if (offsetX < 0) offsetX = 0;
                        if (offsetX > containerRect.width) offsetX = containerRect.width;

                        const percentage = Math.round((offsetX / containerRect.width) * 100);

                        sliderHandle.style.left = `${percentage}%`;
                        sliderLine.style.left = `${percentage}%`;
                        beforeImage.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
                        afterImage.style.clipPath = `inset(0 0 0 ${percentage}%)`;
                    };

                    const startDragging = () => {
                        isDragging = true;
                        sliderHandle.style.transition = "none";
                        sliderLine.style.transition = "none";
                    };

                    const stopDragging = () => {
                        isDragging = false;
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

                    initializeSlider();
                });
            }

            // Initialize before/after sliders on page load
            document.addEventListener("DOMContentLoaded", initializeBeforeAfterSliders);
            initializeBeforeAfterSliders();

            // Video modal functionality
            const videoModal = document.getElementById('videoModal');
            const videoFrame = document.getElementById('videoFrame');
            const closeModal = document.getElementById('closeModal');

            // Attach video click events
            function attachVideoEvents() {
                document.querySelectorAll('.video-item').forEach(item => {
                    if (item.dataset.videoListenerAttached) return;
                    item.dataset.videoListenerAttached = 'true';

                    item.addEventListener('click', function () {
                        const videoUrl = this.getAttribute('data-video-url');
                        if (videoUrl) {
                            videoFrame.src = videoUrl + '?autoplay=1';
                            videoModal.classList.remove('hidden');
                            videoModal.classList.add('flex');
                        }
                    });
                });
            }

            closeModal.addEventListener('click', function () {
                videoModal.classList.add('hidden');
                videoModal.classList.remove('flex');
                videoFrame.src = '';
            });

            videoModal.addEventListener('click', function (e) {
                if (e.target === videoModal) {
                    closeModal.click();
                }
            });

            // Initialize video events
            attachVideoEvents();

        })();
    </script>
@endpush