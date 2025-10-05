<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
<link rel="stylesheet" href="{{ asset('assets/css/cndk.beforeafter.css') }}">

<section class="py-8 md:py-25">
    <div class="container">
        <x-section-heading pretitle="We Prove It" title="Transform Your Ride: Stunning before & after car detailing"
            description="Our skilled team employs top-notch techniques and eco-friendly products to rejuvenate your ride, ensuring it looks its absolute best. From quick washes to comprehensive detailing, we deliver remarkable results that will leave you amazed."
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
    <div class="showcase-slider-container">
        <div class="showcase-image-slider -mx-3 px-6 mt-20" id="showcase-slider">
            <div class="showcase-image px-3">
                <div class="showcase-card">
                    <img src="{{ asset('assets/img/showcase1.webp') }}" alt="Showcase 1"
                        class="w-full h-full object-cover" />
                </div>
            </div>

            <div class="showcase-image px-3">
                <div class="showcase-card">
                    <img src="{{ asset('assets/img/showcase2.webp') }}" alt="Showcase 2"
                        class="w-full h-full object-cover" />
                </div>
            </div>

            <div class="showcase-image px-3">
                <div class="showcase-card">
                    {{-- <img src="{{ asset('assets/img/showcase3.webp') }}" alt="Showcase 3"
                        class="w-full h-full object-cover" /> --}}
                    <div class="beforeafterdefault">
                        <div data-type="data-type-image">
                            <div data-type="before"><img src="{{ asset('assets/img/showcase3.webp') }}"></div>
                            <div data-type="after"><img src="{{ asset('assets/img/showcase3.webp') }}"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- duplicate slides as needed -->
            <div class="showcase-image px-3">
                <div class="showcase-card">
                    <img src="{{ asset('assets/img/showcase1.webp') }}" alt="Showcase 1"
                        class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="showcase-image px-3">
                <div class="showcase-card">
                    <img src="{{ asset('assets/img/showcase2.webp') }}" alt="Showcase 2"
                        class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="showcase-image px-3">
                <div class="showcase-card">
                    <img src="{{ asset('assets/img/showcase3.webp') }}" alt="Showcase 3"
                        class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
        <div class="slider-controls"></div>
    </div>
</section>


<!-- scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="{{asset('assets/js/cndk.beforeafter.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#showcase-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            arrows: true,
            dots: true,
            speed: 300,
            centerPadding: '20px',
            infinite: true,
            autoplaySpeed: 5000,
            // autoplay: true
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

        $(".beforeafterdefault").cndkbeforeafter({
            mode: "drag"
        });
    });
</script>

<style>
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

    .showcase-image-slider .slick-slide div {
        width: 100%;
        height: 100%;
    }

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