{{-- Header --}}
<header class="pb-4 pt-6 md:pt-10 absolute top-0 z-[999] w-full">
    <div class="container mx-auto">
        <div class="flex items-center justify-between gap-4">
            <div>
                <a href="/">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="ECD Logo"
                        class="max-w-[80px] max-h-[40px] md:max-w-[145px] md:max-h-[70px]">
                </a>
            </div>
            <nav class="hidden md:flex items-center justify-center gap-7.5 bg-white py-4 px-10 rounded-[60px]">
                <a href="{{ route('home') }}" class="nav-link active">Home</a>
                <a href="{{ route('about') }}" class="nav-link"> About Us</a>
                <a href="{{ route('services-subscriptions') }}" class="nav-link">Services & Subscriptions</a>
                {{-- <a href="{{ route('services-subscriptions') }}" class="nav-link flex items-center gap-2">
                    <span>Subcriptions</span>

                    <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 1L6.5 6L11.5 1" stroke="#212529" stroke-width="1.67" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </a> --}}
                <a href="{{ route('gallery') }}" class="nav-link">Our Works</a>
            </nav>
            <div class="hidden md:block">
                <button class="btn-brand-sm" onClick="openHeroModal()"><span>Let's Talk</span>
                    <svg width="25" height="11" viewBox="0 0 25 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 5.5H1M24 5.5L19.5 1M24 5.5L19.5 10" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="md:hidden">
                <button class="mobile-menu-toggle" id="mobile-menu-toggle">

                    <svg width="27" height="18" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.83334 17.75C1.42014 17.75 1.07403 17.61 0.795005 17.33C0.515977 17.05 0.375977 16.7039 0.375005 16.2917C0.374033 15.8794 0.514033 15.5333 0.795005 15.2533C1.07598 14.9733 1.42209 14.8333 1.83334 14.8333H25.1667C25.5799 14.8333 25.9265 14.9733 26.2065 15.2533C26.4865 15.5333 26.626 15.8794 26.625 16.2917C26.624 16.7039 26.484 17.0505 26.205 17.3315C25.926 17.6124 25.5799 17.7519 25.1667 17.75H1.83334ZM1.83334 10.4583C1.42014 10.4583 1.07403 10.3183 0.795005 10.0383C0.515977 9.75833 0.375977 9.41222 0.375005 9C0.374033 8.58778 0.514033 8.24167 0.795005 7.96167C1.07598 7.68167 1.42209 7.54167 1.83334 7.54167H25.1667C25.5799 7.54167 25.9265 7.68167 26.2065 7.96167C26.4865 8.24167 26.626 8.58778 26.625 9C26.624 9.41222 26.484 9.75882 26.205 10.0398C25.926 10.3208 25.5799 10.4603 25.1667 10.4583H1.83334ZM1.83334 3.16667C1.42014 3.16667 1.07403 3.02667 0.795005 2.74667C0.515977 2.46667 0.375977 2.12056 0.375005 1.70833C0.374033 1.29611 0.514033 0.95 0.795005 0.67C1.07598 0.39 1.42209 0.25 1.83334 0.25H25.1667C25.5799 0.25 25.9265 0.39 26.2065 0.67C26.4865 0.95 26.626 1.29611 26.625 1.70833C26.624 2.12056 26.484 2.46715 26.205 2.74812C25.926 3.0291 25.5799 3.16861 25.1667 3.16667H1.83334Z"
                            fill="white" />
                    </svg>

                </button>
            </div>
        </div>
    </div>
</header>

<!-- 🌐 Mobile Menu -->
<nav id="mobile-menu"
    class="fixed top-0 left-0 w-full h-full bg-[var(--color-black)] shadow-md transform -translate-y-full transition-transform duration-300 ease-in-out z-[999] md:hidden py-6">
    <div class="container mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6">
            <a href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="ECD Logo" class="max-w-[80px] max-h-[40px]">
            </a>
            <button id="mobile-menu-close" class="text-white text-opacity-80">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M6 6L18 18M6 18L18 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="flex flex-col gap-4 text-lg font-medium">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            <a href="{{ route('about') }}" class="nav-link">About Us</a>
            <a href="{{ route('services-subscriptions') }}" class="nav-link">Services & Pricing</a>
            <a href="{{ route('gallery') }}" class="nav-link">Our Works</a>
            <a href="{{ route('contact') }}" class="btn-brand inline-block w-fit">Let's Talk</a>
        </div>
    </div>
</nav>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const el = document.getElementById("socialIcons");

        function handleScroll() {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;

            if (scrollTop > 100) {
                // User started scrolling
                el.classList.remove(
                    "top-1/2",
                    "-translate-y-1/2",
                    "left-6",
                    "md:right-6",
                    "md:left-auto"
                );
                el.classList.add("bottom-6", "right-6");
            } else {
                // Back to top
                el.classList.remove("bottom-6", "right-6");
                el.classList.add(
                    "top-1/2",
                    "-translate-y-1/2",
                    "left-6",
                    "md:right-6",
                    "md:left-auto"
                );
            }
        }

        // Initial check + scroll listener
        handleScroll();
        window.addEventListener("scroll", handleScroll);
    });
</script>
{{-- Booking Modal --}}


<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.6);
        display: none;
        /* Hidden by default */
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .modal.show {
        display: flex;
        /* Show when active */
    }

    .modal-content {
        background: white;
        border-radius: 16px;
        width: 100%;
        padding: 30px;
    }

    /* Disable body scroll when modal is open */
    body.modal-open {
        overflow: hidden;
    }

    .spinner {
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top: 2px solid #fff;
        width: 16px;
        height: 16px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

@php
    $plans = [
        [
            'name' => 'Basic Treatment',
            'price_single' => '€79,95',
            'price_monthly' => '€74,45',
            'frequency' => '1x per month',
            'color' => '#003868',
            'borderColor' => '#0C5798',
            'buttonText' => 'Get started with Basic',
            'icon' => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_425_15641)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6697 1.93946C14.1018 0.380531 11.8983 0.380531 11.3304 1.93946L8.75361 9.02339L1.66968 11.6002C0.110756 12.168 0.110756 14.3716 1.66968 14.9395L8.75361 17.5162L11.3304 24.6002C11.8983 26.1591 14.1018 26.1591 14.6697 24.6002L17.2465 17.5162L24.3304 14.9395C25.8893 14.3716 25.8893 12.168 24.3304 11.6002L17.2465 9.02339L14.6697 1.93946Z" fill="#003868" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_425_15641)">
                                        <rect width="25" height="25" fill="white" transform="translate(0.5 0.769775)" />
                                    </clipPath>
                                </defs>
                            </svg>',
            'features' => [
                'extra' => null,
                'exterior' => [
                    'Thorough wash of the exterior including rims, bumpers, and windows.',
                    'Removes dirt, deposits, and insect residues for a fresh appearance.',
                    'Door frames cleaned.'
                ],
                'interior' => [
                    'Vacuuming mats and seats.'
                ]
            ]
        ],
        [
            'name' => 'Premium Treatment',
            'price_single' => '€149,95',
            'price_monthly' => '€144,45',
            'frequency' => '2x per month <br /> <sub>every other week</sub>',
            'color' => 'var(--color-brand)',
            'borderColor' => '#63FFFA',
            'buttonText' => 'Get started with Premium',
            'icon' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_706_5175)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6697 3.93946C14.1018 2.38053 11.8983 2.38053 11.3304 3.93946L8.75361 11.0234L1.66968 13.6002C0.110756 14.168 0.110756 16.3716 1.66968 16.9395L8.75361 19.5162L11.3304 26.6002C11.8983 28.1591 14.1018 28.1591 14.6697 26.6002L17.2465 19.5162L24.3304 16.9395C25.8893 16.3716 25.8893 14.168 24.3304 13.6002L17.2465 11.0234L14.6697 3.93946Z" fill="#6ADBD9" />
                                </g>
                                <g clip-path="url(#clip1_706_5175)">
                                    <path d="M18.0905 5.17814L21.079 4.09028L22.1662 1.10243C22.1911 1.03398 22.2365 0.974858 22.2962 0.933081C22.3558 0.891305 22.4269 0.868896 22.4997 0.868896C22.5726 0.868896 22.6437 0.891305 22.7033 0.933081C22.763 0.974858 22.8084 1.03398 22.8333 1.10243L23.9212 4.091L26.9097 5.17814C26.9782 5.20307 27.0373 5.24844 27.0791 5.30812C27.1209 5.36779 27.1433 5.43887 27.1433 5.51171C27.1433 5.58456 27.1209 5.65563 27.0791 5.71531C27.0373 5.77498 26.9782 5.82036 26.9097 5.84528L23.9205 6.93314L22.8333 9.92171C22.8084 9.99016 22.763 10.0493 22.7033 10.0911C22.6437 10.1328 22.5726 10.1552 22.4997 10.1552C22.4269 10.1552 22.3558 10.1328 22.2962 10.0911C22.2365 10.0493 22.1911 9.99016 22.1662 9.92171L21.0783 6.93243L18.0905 5.84528C18.022 5.82036 17.9629 5.77498 17.9211 5.71531C17.8793 5.65563 17.8569 5.58456 17.8569 5.51171C17.8569 5.43887 17.8793 5.36779 17.9211 5.30812C17.9629 5.24844 18.022 5.20307 18.0905 5.17814Z" fill="#6ADBD9" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_706_5175)">
                                        <rect width="25" height="25" fill="white" transform="translate(0.5 2.76978)" />
                                    </clipPath>
                                    <clipPath id="clip1_706_5175)">
                                        <rect width="10" height="10" fill="white" transform="translate(17.5 0.511719)" />
                                    </clipPath>
                                </defs>
                            </svg>',
            'features' => [
                'extra' => 'Everything in the Basic Package, plus:',
                'exterior' => [
                    'Exterior cleaning',
                    'Door frames cleaned.'
                ],
                'interior' => [
                    'Vacuuming mats and seats.',
                    'Cleaning windows (inside)',
                    'Dashboard cleaning',
                    'Cleaning plastic parts'
                ]
            ]
        ],
        [
            'name' => 'Full Detail Treatment',
            'price_single' => '€289,95',
            'price_monthly' => '€249,45',
            'frequency' => '4x per month <br /> <sub>weekly</sub>',
            'color' => '#CBA328',
            'borderColor' => '#E6BA30',
            'buttonText' => 'Get started with Full Detail',
            'icon' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_706_5175)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6697 3.93946C14.1018 2.38053 11.8983 2.38053 11.3304 3.93946L8.75361 11.0234L1.66968 13.6002C0.110756 14.168 0.110756 16.3716 1.66968 16.9395L8.75361 19.5162L11.3304 26.6002C11.8983 28.1591 14.1018 28.1591 14.6697 26.6002L17.2465 19.5162L24.3304 16.9395C25.8893 16.3716 25.8893 14.168 24.3304 13.6002L17.2465 11.0234L14.6697 3.93946Z" fill="#6ADBD9" />
                                </g>
                                <g clip-path="url(#clip1_706_5175)">
                                    <path d="M18.0905 5.17814L21.079 4.09028L22.1662 1.10243C22.1911 1.03398 22.2365 0.974858 22.2962 0.933081C22.3558 0.891305 22.4269 0.868896 22.4997 0.868896C22.5726 0.868896 22.6437 0.891305 22.7033 0.933081C22.763 0.974858 22.8084 1.03398 22.8333 1.10243L23.9212 4.091L26.9097 5.17814C26.9782 5.20307 27.0373 5.24844 27.0791 5.30812C27.1209 5.36779 27.1433 5.43887 27.1433 5.51171C27.1433 5.58456 27.1209 5.65563 27.0791 5.71531C27.0373 5.77498 26.9782 5.82036 26.9097 5.84528L23.9205 6.93314L22.8333 9.92171C22.8084 9.99016 22.763 10.0493 22.7033 10.0911C22.6437 10.1328 22.5726 10.1552 22.4997 10.1552C22.4269 10.1552 22.3558 10.1328 22.2962 10.0911C22.2365 10.0493 22.1911 9.99016 22.1662 9.92171L21.0783 6.93243L18.0905 5.84528C18.022 5.82036 17.9629 5.77498 17.9211 5.71531C17.8793 5.65563 17.8569 5.58456 17.8569 5.51171C17.8569 5.43887 17.8793 5.36779 17.9211 5.30812C17.9629 5.24844 18.022 5.20307 18.0905 5.17814Z" fill="#6ADBD9" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_706_5175)">
                                        <rect width="25" height="25" fill="white" transform="translate(0.5 2.76978)" />
                                    </clipPath>
                                    <clipPath id="clip1_706_5175)">
                                        <rect width="10" height="10" fill="white" transform="translate(17.5 0.511719)" />
                                    </clipPath>
                                </defs>
                            </svg>',
            'features' => [
                'extra' => 'Everything in the Premium Package, plus:',
                'exterior' => [
                    'Exterior cleaning',
                    'Door frames cleaned.'
                ],
                'interior' => [
                    'Vacuuming mats and seats.',
                    'Cleaning windows (inside)',
                    'Dashboard cleaning',
                    'Cleaning plastic parts'
                ]
            ]
        ]
    ];
@endphp

<div class="modal px-5" id="heroModal">

    <!-- Modal Content -->
    <div
        class="modal-content relative h-[calc(100vh-50px)] max-w-[751px] mx-auto bg-gray-50 p-8 rounded-2xl shadow-2xl">
        <!-- Close Button -->
        <div class="close-modal bg-white w-8 h-8 rounded-full flex items-center justify-center absolute top-[-14px] right-[-14px] shadow-md cursor-pointer hover:scale-105 transition-transform z-50"
            onclick="closeHeroModal()" role="button" aria-label="Close modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                <path fill="#EA6216"
                    d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z">
                </path>
                <path fill="#EA6216"
                    d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l-.001-.001l-3.855 3.855l-3.855-3.855A1.091 1.091 0 0 0 6.6 8.145l.001-.001l3.855 3.855l-3.855 3.855a1.091 1.091 0 1 0 1.541 1.542l.001-.001l3.855-3.855l3.855 3.855a1.091 1.091 0 1 0 1.542-1.541l-.001-.001z">
                </path>
            </svg>
        </div>
        <!-- Booking Form -->
        <form id="bookingForm" method="POST" action="{{ route('booking.store') }}"
            class="step-1 h-full overflow-y-auto">
            @csrf

            <div id="formMessage" class="hidden"></div>

            <div class="grid grid-rows-[auto_1fr_auto] h-full space-y-6">
                <!-- Header -->
                <div class="flex items-center gap-4 px-5 py-5 border border-[#C8CEDD] rounded-[16px]">
                    <div class="w-[50px] h-[50px] rounded-[16px] bg-[#E7F1FF] flex items-center justify-center">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.37473 0.8125C7.62337 0.8125 7.86182 0.911272 8.03764 1.08709C8.21345 1.2629 8.31223 1.50136 8.31223 1.75V2.06625C8.74139 2.06292 9.20764 2.06167 9.71098 2.0625H16.2885C16.7918 2.0625 17.2581 2.06375 17.6872 2.06625V1.75C17.6872 1.50136 17.786 1.2629 17.9618 1.08709C18.1376 0.911272 18.3761 0.8125 18.6247 0.8125C18.8734 0.8125 19.1118 0.911272 19.2876 1.08709C19.4635 1.2629 19.5622 1.50136 19.5622 1.75V2.12625C19.5772 2.12625 19.5918 2.1275 19.606 2.13C20.4935 2.1975 21.2422 2.34125 21.926 2.67C23.0316 3.1961 23.9428 4.05791 24.5297 5.1325C24.8885 5.7975 25.0422 6.52375 25.116 7.37375C25.1872 8.20125 25.1872 9.22625 25.1872 10.5112V16.7375C25.1872 18.0238 25.1872 19.05 25.116 19.8762C25.041 20.7262 24.8885 21.4525 24.5297 22.1162C23.943 23.1913 23.0318 24.0536 21.926 24.58C21.2422 24.9088 20.4935 25.0525 19.606 25.12C18.736 25.1875 17.656 25.1875 16.2885 25.1875H9.71223C8.34473 25.1875 7.26473 25.1875 6.39473 25.12C5.50723 25.0512 4.75848 24.9088 4.07473 24.58C2.96911 24.0539 2.05787 23.1921 1.47098 22.1175C1.11223 21.4525 0.958477 20.7262 0.884727 19.8762C0.813477 19.0487 0.813477 18.0238 0.813477 16.7388V10.5125C0.813477 9.22625 0.813477 8.2 0.884727 7.37375C0.959727 6.52375 1.11223 5.7975 1.47098 5.13375C2.05766 4.0587 2.96892 3.19643 4.07473 2.67C4.75848 2.34125 5.50723 2.1975 6.39473 2.13L6.43723 2.125V1.75C6.43723 1.50136 6.536 1.2629 6.71181 1.08709C6.88763 0.911272 7.12609 0.8125 7.37473 0.8125ZM6.43723 4.0075C5.71598 4.07 5.25473 4.1825 4.88723 4.36C4.13774 4.71428 3.51919 5.29609 3.11973 6.0225C2.97723 6.2875 2.87473 6.605 2.80723 7.0625H23.1935C23.1247 6.605 23.0222 6.2875 22.8797 6.02375C22.4808 5.29706 21.8627 4.71483 21.1135 4.36C20.7447 4.1825 20.2835 4.07 19.5622 4.0075V4.25C19.5622 4.49864 19.4635 4.7371 19.2876 4.91291C19.1118 5.08873 18.8734 5.1875 18.6247 5.1875C18.3761 5.1875 18.1376 5.08873 17.9618 4.91291C17.786 4.7371 17.6872 4.49864 17.6872 4.25V3.94125C17.2614 3.93792 16.7822 3.93667 16.2497 3.9375H9.74973C9.21723 3.9375 8.73806 3.93875 8.31223 3.94125V4.25C8.31223 4.49864 8.21345 4.7371 8.03764 4.91291C7.86182 5.08873 7.62337 5.1875 7.37473 5.1875C7.12609 5.1875 6.88763 5.08873 6.71181 4.91291C6.536 4.7371 6.43723 4.49864 6.43723 4.25V4.0075Z"
                                fill="var(--color-brand)" />
                        </svg>

                    </div>
                    <div class="space-y-2">
                        <h4 class="text-[24px] font-bold text-[var(--color-heading)] leading-[1.4]">Book your
                            service
                        </h4>
                        <p class="text-[16px] font-medium text-[var(--color-text)] leading-[1.4] font-sans">For your
                            service,
                            share your details,
                            and we'll take care of the rest.</p>
                    </div>
                </div>

                <!-- Input Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-2">
                    <!-- First Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" name="first_name" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="Enter first name" />
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" name="last_name" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="Enter last name" />
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <textarea name="address" required rows="3"
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="Your address"></textarea>
                    </div>

                    <!-- Number of Cars -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Number of Cars</label>
                        <input type="text" name="number_of_cars" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="Enter number of cars" />
                    </div>

                    <!-- Licence Plate -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Licence Plate</label>
                        <input type="text" name="licence_plate" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="Enter licence plate" />
                    </div>

                    <!-- WhatsApp Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                        <input type="text" name="whatsapp" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="Enter WhatsApp number" />
                    </div>

                    <!-- Preferred Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Preferred Date</label>
                        <input type="date" name="preferred_date" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm 
                                focus:outline-none focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]" />
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit" id="bookNowBtn"
                        class="inline-flex items-center justify-center w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-[var(--color-brand)] rounded-lg shadow-md hover:bg-[var(--color-brand)] transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="btn-text">Book Now</span>
                        <span class="spinner hidden ml-2"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {

        //mobile menu #212529

        const mobileMenu = document.getElementById('mobile-menu');
        const toggleBtn = document.getElementById('mobile-menu-toggle');
        const closeBtn = document.getElementById('mobile-menu-close');

        // Show mobile menu
        toggleBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('-translate-y-full');
            mobileMenu.classList.add('translate-y-0');
        });

        // Hide mobile menu
        closeBtn.addEventListener('click', () => {
            mobileMenu.classList.add('-translate-y-full');
            mobileMenu.classList.remove('translate-y-0');
        });


        //active link
        const currentPathname = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            if (link.pathname === currentPathname) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    });
</script>

<script>
    function openHeroModal() {
        const modal = document.querySelector('#heroModal');
        modal.classList.add('show');
        document.body.classList.add('modal-open');
    }

    function closeHeroModal() {
        const modal = document.querySelector('#heroModal');
        modal.classList.remove('show');
        document.body.classList.remove('modal-open');
    }
    // If using dynamically loaded content, ensure DOM is ready
    document.addEventListener('DOMContentLoaded', function () {

        // Optional: close modal when clicking outside of it
        document.querySelector('#heroModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeHeroModal();
            }
        });
        document.querySelector('.close-modal')?.addEventListener('click', closeHeroModal);
        document.querySelector('[onclick="openHeroModal()"]')?.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent link navigation
            openHeroModal();
        });
    });
</script>
<script>
    document.getElementById('bookingForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const formMessage = document.getElementById('formMessage');
        const submitButton = form.querySelector('button[type="submit"]');
        const btnText = submitButton.querySelector('.btn-text');
        const spinner = submitButton.querySelector('.spinner');

        // Clear previous messages and hide spinner
        formMessage.innerHTML = '';
        formMessage.classList.add('hidden');
        document.querySelectorAll('.validation-error').forEach(el => el.remove());
        btnText.classList.remove('hidden');
        spinner.classList.add('hidden');

        // Show spinner and disable button
        btnText.classList.add('hidden');
        spinner.classList.remove('hidden');
        submitButton.disabled = true;

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    form.reset();
                    formMessage.innerHTML = `<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">${data.message}</div>`;
                    formMessage.classList.remove('hidden');
                    setTimeout(() => {
                        formMessage.innerHTML = '';
                        formMessage.classList.add('hidden');
                    }, 3000);
                } else if (data.errors) {
                    Object.keys(data.errors).forEach(key => {
                        const input = form.querySelector(`[name="${key}"]`);
                        if (input) {
                            const errorEl = document.createElement('p');
                            errorEl.classList.add('text-red-500', 'text-xs', 'mt-1', 'validation-error');
                            errorEl.textContent = data.errors[key][0];
                            input.parentNode.appendChild(errorEl);
                        }
                    });
                } else {
                    formMessage.innerHTML = `<div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">${data.message}</div>`;
                    formMessage.classList.remove('hidden');
                }
            })
            .catch(error => {
                formMessage.innerHTML = `<div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">An unexpected error occurred. Please try again.</div>`;
                formMessage.classList.remove('hidden');
            })
            .finally(() => {
                // Hide spinner and re-enable button
                btnText.classList.remove('hidden');
                spinner.classList.add('hidden');
                submitButton.disabled = false;
            });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.querySelector('input[name="preferred_date"]');
        if (dateInput) {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
            const dd = String(today.getDate()).padStart(2, '0');
            const todayString = `${yyyy}-${mm}-${dd}`;
            dateInput.min = todayString;
        }
    });
</script>