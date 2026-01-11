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
                    "md:left-6"
                );
                el.classList.add("bottom-6", "left-6");
            } else {
                // Back to top
                el.classList.remove("bottom-6", "left-6");
                el.classList.add(
                    "top-1/2",
                    "-translate-y-1/2",
                    "left-6",
                    "md:left-6"
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
            'icon' => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_425_15641)"><path fill-rule="evenodd" clip-rule="evenodd"d="M14.6697 1.93946C14.1018 0.380531 11.8983 0.380531 11.3304 1.93946L8.75361 9.02339L1.66968 11.6002C0.110756 12.168 0.110756 14.3716 1.66968 14.9395L8.75361 17.5162L11.3304 24.6002C11.8983 26.1591 14.1018 26.1591 14.6697 24.6002L17.2465 17.5162L24.3304 14.9395C25.8893 14.3716 25.8893 12.168 24.3304 11.6002L17.2465 9.02339L14.6697 1.93946Z" fill="#003868" /></g><defs><clipPath id="clip0_425_15641"><rect width="25" height="25" fill="white" transform="translate(0.5 0.769775)" /></clipPath></defs></svg>',
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
            'icon' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_706_5175)"> <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6697 3.93946C14.1018 2.38053 11.8983 2.38053 11.3304 3.93946L8.75361 11.0234L1.66968 13.6002C0.110756 14.168 0.110756 16.3716 1.66968 16.9395L8.75361 19.5162L11.3304 26.6002C11.8983 28.1591 14.1018 28.1591 14.6697 26.6002L17.2465 19.5162L24.3304 16.9395C25.8893 16.3716 25.8893 14.168 24.3304 13.6002L17.2465 11.0234L14.6697 3.93946Z" fill="#6ADBD9" /></g><g clip-path="url(#clip1_706_5175)"><path d="M18.0905 5.17814L21.079 4.09028L22.1662 1.10243C22.1911 1.03398 22.2365 0.974858 22.2962 0.933081C22.3558 0.891305 22.4269 0.868896 22.4997 0.868896C22.5726 0.868896 22.6437 0.891305 22.7033 0.933081C22.763 0.974858 22.8084 1.03398 22.8333 1.10243L23.9212 4.091L26.9097 5.17814C26.9782 5.20307 27.0373 5.24844 27.0791 5.30812C27.1209 5.36779 27.1433 5.43887 27.1433 5.51171C27.1433 5.58456 27.1209 5.65563 27.0791 5.71531C27.0373 5.77498 26.9782 5.82036 26.9097 5.84528L23.9205 6.93314L22.8333 9.92171C22.8084 9.99016 22.763 10.0493 22.7033 10.0911C22.6437 10.1328 22.5726 10.1552 22.4997 10.1552C22.4269 10.1552 22.3558 10.1328 22.2962 10.0911C22.2365 10.0493 22.1911 9.99016 22.1662 9.92171L21.0783 6.93243L18.0905 5.84528C18.022 5.82036 17.9629 5.77498 17.9211 5.71531C17.8793 5.65563 17.8569 5.58456 17.8569 5.51171C17.8569 5.43887 17.8793 5.36779 17.9211 5.30812C17.9629 5.24844 18.022 5.20307 18.0905 5.17814Z" fill="#6ADBD9" /></g><defs><clipPath id="clip0_706_5175"><rect width="25" height="25" fill="white" transform="translate(0.5 2.76978)" /></clipPath><clipPath id="clip1_706_5175"><rect width="10" height="10" fill="white" transform="translate(17.5 0.511719)" /></clipPath></defs></svg>',
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
            'icon' => '<svg width="31" height="34" viewBox="0 0 31 34" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_707_5176)"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.6697 5.93946C15.1018 4.38053 12.8983 4.38053 12.3304 5.93946L9.75361 13.0234L2.66968 15.6002C1.11076 16.168 1.11076 18.3716 2.66968 18.9395L9.75361 21.5162L12.3304 28.6002C12.8983 30.1591 15.1018 30.1591 15.6697 28.6002L18.2465 21.5162L25.3304 18.9395C26.8893 18.3716 26.8893 16.168 25.3304 15.6002L18.2465 13.0234L15.6697 5.93946Z" fill="#CBA328" /></g><g clip-path="url(#clip1_707_5176)"><path d="M19.2089 6.11152L22.7952 4.80609L24.0998 1.22067C24.1297 1.13853 24.1842 1.06758 24.2558 1.01745C24.3274 0.96732 24.4127 0.94043 24.5001 0.94043C24.5875 0.94043 24.6728 0.96732 24.7444 1.01745C24.816 1.06758 24.8705 1.13853 24.9004 1.22067L26.2058 4.80695L29.7921 6.11152C29.8742 6.14143 29.9452 6.19589 29.9953 6.26749C30.0454 6.3391 30.0723 6.4244 30.0723 6.51181C30.0723 6.59922 30.0454 6.68452 29.9953 6.75612C29.9452 6.82773 29.8742 6.88218 29.7921 6.91209L26.2049 8.21752L24.9004 11.8038C24.8705 11.8859 24.816 11.9569 24.7444 12.007C24.6728 12.0572 24.5875 12.084 24.5001 12.084C24.4127 12.084 24.3274 12.0572 24.2558 12.007C24.1842 11.9569 24.1297 11.8859 24.0998 11.8038L22.7944 8.21667L19.2089 6.91209C19.1268 6.88218 19.0559 6.82773 19.0057 6.75612C18.9556 6.68452 18.9287 6.59922 18.9287 6.51181C18.9287 6.4244 18.9556 6.3391 19.0057 6.26749C19.0559 6.19589 19.1268 6.14143 19.2089 6.11152Z" fill="#CBA328" /></g> <g clip-path="url(#clip2_707_5176)"><path d="M0.913471 26.2665L3.00547 25.505L3.76647 23.4135C3.78392 23.3656 3.81568 23.3242 3.85745 23.2949C3.89922 23.2657 3.94898 23.25 3.99997 23.25C4.05096 23.25 4.10072 23.2657 4.14249 23.2949C4.18426 23.3242 4.21602 23.3656 4.23347 23.4135L4.99497 25.5055L7.08697 26.2665C7.13488 26.2839 7.17627 26.3157 7.20551 26.3575C7.23476 26.3992 7.25044 26.449 7.25044 26.5C7.25044 26.551 7.23476 26.6007 7.20551 26.6425C7.17627 26.6843 7.13488 26.716 7.08697 26.7335L4.99447 27.495L4.23347 29.587C4.21602 29.6349 4.18426 29.6763 4.14249 29.7055C4.10072 29.7348 4.05096 29.7504 3.99997 29.7504C3.94898 29.7504 3.89922 29.7348 3.85745 29.7055C3.81568 29.6763 3.78392 29.6349 3.76647 29.587L3.00497 27.4945L0.913471 26.7335C0.865558 26.716 0.824173 26.6843 0.794929 26.6425C0.765686 26.6007 0.75 26.551 0.75 26.5C0.75 26.449 0.765686 26.3992 0.794929 26.3575C0.824173 26.3157 0.865558 26.2839 0.913471 26.2665Z"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            fill="#CBA328" /></g><g clip-path="url(#clip3_707_5176)"> <path d="M18.8545 30.7999L20.6476 30.1472L21.2999 28.3545C21.3149 28.3134 21.3421 28.2779 21.3779 28.2529C21.4137 28.2278 21.4563 28.2144 21.5 28.2144C21.5438 28.2144 21.5864 28.2278 21.6222 28.2529C21.658 28.2779 21.6852 28.3134 21.7002 28.3545L22.3529 30.1476L24.146 30.7999C24.1871 30.8149 24.2226 30.8421 24.2477 30.8779C24.2727 30.9137 24.2862 30.9563 24.2862 31C24.2862 31.0438 24.2727 31.0864 24.2477 31.1222C24.2226 31.158 24.1871 31.1852 24.146 31.2002L22.3525 31.8529L21.7002 33.646C21.6852 33.6871 21.658 33.7226 21.6222 33.7477C21.5864 33.7727 21.5438 33.7862 21.5 33.7862C21.4563 33.7862 21.4137 33.7727 21.3779 33.7477C21.3421 33.7226 21.3149 33.6871 21.2999 33.646L20.6472 31.8525L18.8545 31.2002C18.8134 31.1852 18.7779 31.158 18.7529 31.1222C18.7278 31.0864 18.7144 31.0438 18.7144 31C18.7144 30.9563 18.7278 30.9137 18.7529 30.8779C18.7779 30.8421 18.8134 30.8149 18.8545 30.7999Z" fill="#CBA328" /></g> <defs><clipPath id="clip0_707_5176"><rect width="25" height="25" fill="white" transform="translate(1.5 4.76978)" /></clipPath><clipPath id="clip1_707_5176"> <rect width="12" height="12" fill="white" transform="translate(18.5 0.511719)" /></clipPath><clipPath id="clip2_707_5176"><rect width="7" height="7" fill="white" transform="translate(0.5 23)" /></clipPath><clipPath id="clip3_707_5176"><rect width="6" height="6" fill="white" transform="translate(18.5 28)" /></clipPath></defs></svg>',
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

<div class="modal" id="heroModal">
    <div class="modal-content relative h-[calc(100vh-50px)] max-w-[1200px]">
        <div class="close-modal bg-white w-[28px] h-[28px] rounded-full flex items-center justify-center absolute top-[-14px] right-[-14px] cursor-pointer"
            onClick="closeHeroModal()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="#EA6216"
                    d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z" />
                <path fill="#EA6216"
                    d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l.001-.001l-3.855 3.855l-3.855-3.855A1.091 1.091 0 0 0 6.6 8.145l-.001-.001l3.855 3.855l-3.855 3.855a1.091 1.091 0 1 0 1.541 1.542l.001-.001l3.855-3.855l3.855 3.855a1.091 1.091 0 1 0 1.542-1.541l-.001-.001z" />
            </svg>
        </div>
        <div id="formMessage" class="hidden"></div>
        <h1>hello heroModal 12</h1>
        <div class="step-1 h-full overflow-y-auto grid grid-rows-[auto_auto_1fr_auto]">
            <div class="flex items-center gap-4 px-5 py-5 border border-[#C8CEDD] rounded-[16px]">
                <div class="w-[50px] h-[50px] rounded-[16px] bg-[#E7F1FF] flex items-center justify-center">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.37473 0.8125C7.62337 0.8125 7.86182 0.911272 8.03764 1.08709C8.21345 1.2629 8.31223 1.50136 8.31223 1.75V2.06625C8.74139 2.06292 9.20764 2.06167 9.71098 2.0625H16.2885C16.7918 2.0625 17.2581 2.06375 17.6872 2.06625V1.75C17.6872 1.50136 17.786 1.2629 17.9618 1.08709C18.1376 0.911272 18.3761 0.8125 18.6247 0.8125C18.8734 0.8125 19.1118 0.911272 19.2876 1.08709C19.4635 1.2629 19.5622 1.50136 19.5622 1.75V2.12625C19.5772 2.12625 19.5918 2.1275 19.606 2.13C20.4935 2.1975 21.2422 2.34125 21.926 2.67C23.0316 3.1961 23.9428 4.05791 24.5297 5.1325C24.8885 5.7975 25.0422 6.52375 25.116 7.37375C25.1872 8.20125 25.1872 9.22625 25.1872 10.5112V16.7375C25.1872 18.0238 25.1872 19.05 25.116 19.8762C25.041 20.7262 24.8885 21.4525 24.5297 22.1162C23.943 23.1913 23.0318 24.0536 21.926 24.58C21.2422 24.9088 20.4935 25.0525 19.606 25.12C18.736 25.1875 17.656 25.1875 16.2885 25.1875H9.71223C8.34473 25.1875 7.26473 25.1875 6.39473 25.12C5.50723 25.0512 4.75848 24.9088 4.07473 24.58C2.96911 24.0539 2.05787 23.1921 1.47098 22.1175C1.11223 21.4525 0.958477 20.7262 0.884727 19.8762C0.813477 19.0487 0.813477 18.0238 0.813477 16.7388V10.5125C0.813477 9.22625 0.813477 8.2 0.884727 7.37375C0.959727 6.52375 1.11223 5.7975 1.47098 5.13375C2.05766 4.0587 2.96892 3.19643 4.07473 2.67C4.75848 2.34125 5.50723 2.1975 6.39473 2.13L6.43723 2.125V1.75C6.43723 1.50136 6.536 1.2629 6.71181 1.08709C6.88763 0.911272 7.12609 0.8125 7.37473 0.8125ZM6.43723 4.0075C5.71598 4.07 5.25473 4.1825 4.88723 4.36C4.13774 4.71428 3.51919 5.29609 3.11973 6.0225C2.97723 6.2875 2.87473 6.605 2.80723 7.0625H23.1935C23.1247 6.605 23.0222 6.2875 22.8797 6.02375C22.4808 5.29706 21.8627 4.71483 21.1135 4.36C20.7447 4.1825 20.2835 4.07 19.5622 4.0075V4.25C19.5622 4.49864 19.4635 4.7371 19.2876 4.91291C19.1118 5.08873 18.8734 5.1875 18.6247 5.1875C18.3761 5.1875 18.1376 5.08873 17.9618 4.91291C17.786 4.7371 17.6872 4.49864 17.6872 4.25V3.94125C17.2614 3.93792 16.7822 3.93667 16.2497 3.9375H9.74973C9.21723 3.9375 8.73806 3.93875 8.31223 3.94125V4.25C8.31223 4.49864 8.21345 4.7371 8.03764 4.91291C7.86182 5.08873 7.62337 5.1875 7.37473 5.1875C7.12609 5.1875 6.88763 5.08873 6.71181 4.91291C6.536 4.7371 6.43723 4.49864 6.43723 4.25V4.0075Z"
                            fill="#0088FF" />
                    </svg>

                </div>
                <div class="space-y-2">
                    <h4 class="text-[24px] font-bold text-[var(--color-heading)] leading-[1.4]">Book your service</h4>
                    <p class="text-[16px] font-medium text-[var(--color-text)] leading-[1.4] font-sf">For your service,
                        share your details,
                        and we’ll take care of the rest.</p>
                </div>
            </div>
            <div class="flex items-center justify-center my-[40px] gap-3">
                <div class="flex items-center border border-[#D1D7DF] rounded-[60px] p-1.5">
                    <button
                        class="pricing-opt-global bg-[var(--color-brand)] text-white text-base font-bold rounded-[60px] py-2.5 text-center uppercase inline-block cursor-pointer px-6">Single</button>
                    <button
                        class="pricing-opt-global text-[#8D8D8D] text-base font-bold rounded-[60px] py-2.5 px-6 text-center uppercase inline-block cursor-pointer">Monthly</button>
                </div>
                <div class="flex items-start">

                    <svg width="75" height="51" viewBox="0 0 75 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.02222 41.4088C8.3385 41.2083 8.41978 40.84 8.24493 40.5642C7.63328 39.5992 6.6079 38.0621 5.74197 36.7817C5.30935 36.1421 4.91768 35.5677 4.63851 35.1634C4.49874 34.9609 4.38734 34.8027 4.31422 34.7C4.27701 34.6477 4.25271 34.6131 4.23935 34.5955C4.24199 34.5986 4.24572 34.6026 4.24982 34.6069C4.2534 34.6106 4.26932 34.6278 4.29324 34.6462C4.30356 34.6542 4.3343 34.6779 4.37946 34.6974C4.40281 34.7075 4.55904 34.775 4.73238 34.682C4.74859 34.6733 4.76342 34.663 4.77726 34.6532C4.66975 34.4992 4.5926 34.3949 4.55835 34.3502L4.19606 34.5422C3.87411 34.0236 3.66439 33.6657 3.54727 33.4056C3.43157 33.1486 3.36104 32.8922 3.46083 32.6285L3.47111 32.6013L3.48527 32.5757C3.63169 32.3104 3.87122 32.0994 4.2945 31.7969C4.72491 31.4893 5.40768 31.0462 6.50458 30.3306L6.50774 30.3281C9.33824 28.5205 11.4535 27.1268 14.2518 24.8946C14.5558 24.6372 14.5465 24.2493 14.3802 24.0689L14.3743 24.063L14.3689 24.0558C14.1115 23.751 13.723 23.7591 13.5424 23.9256L13.5297 23.9378L13.5152 23.9485L12.5029 24.7235C10.2088 26.464 8.34316 27.7656 5.88171 29.2659L5.8826 29.2655C4.51329 30.1061 3.75204 30.5797 3.27534 30.9438C2.82372 31.2887 2.65079 31.5168 2.46217 31.8732L2.45175 31.8929L2.35373 32.0677C2.14935 32.4701 2.10113 32.8368 2.18421 33.2493C2.28425 33.7458 2.58051 34.3352 3.11576 35.14C3.12485 35.1517 3.13494 35.1669 3.14471 35.1805C3.1658 35.2097 3.19696 35.2534 3.23566 35.3087C3.31361 35.4201 3.42791 35.5848 3.56885 35.7895C3.85115 36.1996 4.24381 36.7733 4.6753 37.4098C5.53718 38.681 6.55962 40.2093 7.17852 41.1857C7.37888 41.5018 7.74641 41.5833 8.02222 41.4088ZM3.03055 35.7095C3.1155 35.6245 3.1889 35.4544 3.19529 35.388C3.19419 35.3534 3.18643 35.2991 3.18177 35.2794C3.1733 35.2474 3.16296 35.2234 3.16026 35.2174L2.80879 35.412C2.84282 35.4589 2.91553 35.5638 3.01986 35.7143C3.0234 35.7126 3.02716 35.7113 3.03055 35.7095Z"
                            fill="#6ADBD9" stroke="#6ADBD9" stroke-width="0.8125" />
                        <path
                            d="M45.1053 33.7188C54.5885 29.5922 62.0254 21.262 68.2212 7.83068C68.3616 7.44942 68.2004 7.09906 67.9278 6.99571C67.5435 6.85015 67.1893 7.01185 67.0851 7.28623L67.0735 7.31286L66.506 8.52153C60.5994 20.8634 53.5811 28.6646 44.5699 32.5794C35.2815 36.6146 23.9536 36.4861 9.70248 33.0867C9.31185 33.0232 8.9821 33.2552 8.90418 33.5211C8.84906 33.9113 9.08774 34.2385 9.35566 34.3074L9.35517 34.3087C23.9903 37.8035 35.6116 37.85 45.1053 33.7188Z"
                            fill="#6ADBD9" stroke="#6ADBD9" stroke-width="0.8125" />
                    </svg>
                    <div class="text-[18px] text-[var(--color-brand)] tracking-[0.8px] font-cursive font-semibold">Save
                        <span class="text-[22px]">25%</span> on <br /> Monthly
                        Subscriptions</span>
                    </div>
                </div>
            </div>
            {{-- <div id="selectedInfo" class="text-sm text-gray-600"></div> --}}
            <div class="pricing-table">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="pricingGrid">
                    @foreach ($plans as $plan)
                        <div class="pricing-card flex flex-col justify-between p-[30px] rounded-[20px] text-white cursor-pointer select-none transition-transform transform border-4"
                            style="background-color: {{ $plan['color'] }};" data-plan-id="{{ $plan['id'] ?? $loop->index }}"
                            data-plan-name="{{ $plan['name'] }}" data-price-single="{{ $plan['price_single'] }}"
                            data-price-monthly="{{ $plan['price_monthly'] }}" role="button" tabindex="0"
                            aria-pressed="false">

                            {{-- Header --}}
                            <div class="pricing-card-header flex flex-col gap-4 pb-4 relative">
                                <div
                                    class="w-[32px] h-[32px] bg-white rounded-[16px] flex justify-center items-center absolute top-[-14px] right-0">

                                    <svg width="24" height="24" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="checkmark hidden">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 24.021C13.5759 24.021 15.1363 23.7106 16.5922 23.1076C18.0481 22.5045 19.371 21.6206 20.4853 20.5063C21.5996 19.392 22.4835 18.0691 23.0866 16.6132C23.6896 15.1573 24 13.5969 24 12.021C24 10.4451 23.6896 8.8847 23.0866 7.42879C22.4835 5.97289 21.5996 4.65002 20.4853 3.53571C19.371 2.42141 18.0481 1.5375 16.5922 0.934442C15.1363 0.331385 13.5759 0.0209961 12 0.0209961C8.8174 0.0209961 5.76516 1.28528 3.51472 3.53571C1.26428 5.78615 0 8.8384 0 12.021C0 15.2036 1.26428 18.2558 3.51472 20.5063C5.76516 22.7567 8.8174 24.021 12 24.021ZM11.6907 16.8743L18.3573 8.87433L16.3093 7.16766L10.576 14.0463L7.60933 11.0783L5.724 12.9637L9.724 16.9637L10.756 17.9957L11.6907 16.8743Z"
                                            fill="#34C759" />
                                    </svg>

                                </div>
                                <div class="w-[44px] h-[44px] bg-white rounded-[16px] flex justify-center items-center">
                                    {!! $plan['icon'] !!}
                                </div>
                                <h3 class="text-[22px] font-semibold">{{ $plan['name'] }}</h3>
                                <div class="flex items-baseline gap-1">
                                    <span class="price text-[36px] font-extrabold" data-single="{{ $plan['price_single'] }}"
                                        data-monthly="{{ $plan['price_monthly'] }}">
                                        {{ $plan['price_single']}}
                                    </span>
                                    /<span class="text-[20px] font-medium leading-4">{!! $plan['frequency'] !!}

                                    </span>
                                </div>
                            </div>

                            {{-- Body --}}
                            <div class="pricing-card-body flex-1 border-t hidden"
                                style="border-color: {{ $plan['borderColor'] }}">
                                <div class="pricing-card-features py-4 space-y-4 border-b"
                                    style="border-color: {{ $plan['borderColor'] }}">
                                    @if ($plan['features']['extra'])
                                        <div class="text-white text-lg font-bold pb-4 mb-4 border-b"
                                            style="border-color: {{ $plan['borderColor'] }}">
                                            {{ $plan['features']['extra'] }}
                                        </div>
                                    @endif

                                    <div class="text-white text-lg font-bold mb-4">Exterior Dealing</div>
                                    @foreach ($plan['features']['exterior'] as $feature)
                                        <div class="flex gap-3">
                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0">
                                                <rect x="0.5" y="1.05347" width="19" height="19" rx="6.16667" stroke="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.6237 7.0549L8.05424 15.6243L3.37646 10.9466L4.9487 9.37433L8.05424 12.4799L15.0514 5.48267L16.6237 7.0549Z"
                                                    fill="white" />
                                            </svg>
                                            <span class="text-[15px] font-medium">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="pricing-card-features py-4 space-y-4">
                                    <div class="text-white text-lg font-bold mb-4">Interior</div>
                                    @foreach ($plan['features']['interior'] as $feature)
                                        <div class="flex gap-3">
                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0">
                                                <rect x="0.5" y="1.05347" width="19" height="19" rx="6.16667" stroke="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.6237 7.0549L8.05424 15.6243L3.37646 10.9466L4.9487 9.37433L8.05424 12.4799L15.0514 5.48267L16.6237 7.0549Z"
                                                    fill="white" />
                                            </svg>
                                            <span class="text-[15px] font-medium">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Footer --}}
                            <div class="pricing-card-footer mt-4 hidden">
                                <a href="#"
                                    class="text-[#230C0F] text-base font-bold rounded-[60px] px-5 py-3.5 text-center flex items-center justify-center gap-3 cursor-pointer min-w-[164px] bg-white">
                                    <span>{{ $plan['buttonText'] }}</span>
                                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.5 11.0535L6.5 6.05347L1.5 1.05347" stroke="#230C0F" stroke-width="1.6"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center">
                    <button id="togglePackageDetails" data-expanded="false"
                        class="p-4 text-base text-[#0088FF] font-semibold tracking-[-0.02px] rounded-[60px] flex justify-center items-center gap-3 cursor-pointer">
                        <span>View Package Details</span>

                        <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1.04181L6.5 6.04181L11.5 1.04181" stroke="#0088FF" stroke-width="1.6"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </button>
                </div>
            </div>
            <div class="flex justify-end gap-3">
                <button id="clearSelection"
                    class="px-4 py-3 bg-[#F2F2F7] text-base text-[var(--color-text)] font-medium tracking-[0.02px] rounded-[60px] w-[110px] flex justify-center items-center cursor-pointer">Cancel</button>
                <button id="nextStepBtn"
                    class="px-4 py-3 bg-[var(--color-brand)] text-base text-white font-medium tracking-[0.02px] rounded-[60px] w-[135px] flex justify-center items-center cursor-pointer">Next</button>
            </div>
        </div>
        <div class="step-2 h-full overflow-y-auto hidden" aria-hidden="true">
            <div class="grid grid-rows-[auto_1fr_auto] h-full">
                <div class="flex items-center gap-4 px-5 py-5 border border-[#C8CEDD] rounded-[16px]">
                    <div class="w-[50px] h-[50px] rounded-[16px] bg-[#E7F1FF] flex items-center justify-center">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.37473 0.8125C7.62337 0.8125 7.86182 0.911272 8.03764 1.08709C8.21345 1.2629 8.31223 1.50136 8.31223 1.75V2.06625C8.74139 2.06292 9.20764 2.06167 9.71098 2.0625H16.2885C16.7918 2.0625 17.2581 2.06375 17.6872 2.06625V1.75C17.6872 1.50136 17.786 1.2629 17.9618 1.08709C18.1376 0.911272 18.3761 0.8125 18.6247 0.8125C18.8734 0.8125 19.1118 0.911272 19.2876 1.08709C19.4635 1.2629 19.5622 1.50136 19.5622 1.75V2.12625C19.5772 2.12625 19.5918 2.1275 19.606 2.13C20.4935 2.1975 21.2422 2.34125 21.926 2.67C23.0316 3.1961 23.9428 4.05791 24.5297 5.1325C24.8885 5.7975 25.0422 6.52375 25.116 7.37375C25.1872 8.20125 25.1872 9.22625 25.1872 10.5112V16.7375C25.1872 18.0238 25.1872 19.05 25.116 19.8762C25.041 20.7262 24.8885 21.4525 24.5297 22.1162C23.943 23.1913 23.0318 24.0536 21.926 24.58C21.2422 24.9088 20.4935 25.0525 19.606 25.12C18.736 25.1875 17.656 25.1875 16.2885 25.1875H9.71223C8.34473 25.1875 7.26473 25.1875 6.39473 25.12C5.50723 25.0512 4.75848 24.9088 4.07473 24.58C2.96911 24.0539 2.05787 23.1921 1.47098 22.1175C1.11223 21.4525 0.958477 20.7262 0.884727 19.8762C0.813477 19.0487 0.813477 18.0238 0.813477 16.7388V10.5125C0.813477 9.22625 0.813477 8.2 0.884727 7.37375C0.959727 6.52375 1.11223 5.7975 1.47098 5.13375C2.05766 4.0587 2.96892 3.19643 4.07473 2.67C4.75848 2.34125 5.50723 2.1975 6.39473 2.13L6.43723 2.125V1.75C6.43723 1.50136 6.536 1.2629 6.71181 1.08709C6.88763 0.911272 7.12609 0.8125 7.37473 0.8125ZM6.43723 4.0075C5.71598 4.07 5.25473 4.1825 4.88723 4.36C4.13774 4.71428 3.51919 5.29609 3.11973 6.0225C2.97723 6.2875 2.87473 6.605 2.80723 7.0625H23.1935C23.1247 6.605 23.0222 6.2875 22.8797 6.02375C22.4808 5.29706 21.8627 4.71483 21.1135 4.36C20.7447 4.1825 20.2835 4.07 19.5622 4.0075V4.25C19.5622 4.49864 19.4635 4.7371 19.2876 4.91291C19.1118 5.08873 18.8734 5.1875 18.6247 5.1875C18.3761 5.1875 18.1376 5.08873 17.9618 4.91291C17.786 4.7371 17.6872 4.49864 17.6872 4.25V3.94125C17.2614 3.93792 16.7822 3.93667 16.2497 3.9375H9.74973C9.21723 3.9375 8.73806 3.93875 8.31223 3.94125V4.25C8.31223 4.49864 8.21345 4.7371 8.03764 4.91291C7.86182 5.08873 7.62337 5.1875 7.37473 5.1875C7.12609 5.1875 6.88763 5.08873 6.71181 4.91291C6.536 4.7371 6.43723 4.49864 6.43723 4.25V4.0075Z"
                                fill="#0088FF" />
                        </svg>

                    </div>
                    <div class="space-y-2">
                        <h4 class="text-[24px] font-bold text-[var(--color-heading)] leading-[1.4]">Book your
                            service
                        </h4>
                        <p class="text-[16px] font-medium text-[var(--color-text)] leading-[1.4] font-sf">For your
                            service,
                            share your details,
                            and we’ll take care of the rest.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="">
                        <label class="block text-base font-medium text-[var(--color-text)] mb-2">First Name</label>
                        <input type="text" name="name" required
                            class="block w-full rounded-lg border border-[#AEAEB2] h-12 focus:outline-none focus:border-[var(--color-brand)] px-4"
                            placeholder="Enter first name">
                    </div>
                    <div class="">
                        <label class="block text-base font-medium text-[var(--color-text)] mb-2">Last Name</label>
                        <input type="text" name="name" required
                            class="block w-full rounded-lg border border-[#AEAEB2] h-12 focus:outline-none focus:border-[var(--color-brand)] px-4"
                            placeholder="Enter last name">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-base font-medium text-[var(--color-text)] mb-2">Address</label>
                        <textarea type="text" name="name" required
                            class="block w-full rounded-lg border border-[#AEAEB2] h-24 px-4 focus:border-[var(--color-brand)]"
                            message="Your address"></textarea>
                    </div>
                    <div class="">
                        <label class="block text-base font-medium text-[var(--color-text)] mb-2">Package
                            Choice</label>
                        <select type="text" name="name" required
                            class="block w-full rounded-lg border border-[#AEAEB2] h-12 focus:outline-none focus:border-[var(--color-brand)] px-4">
                            <option value="">Basic Treatment - €64.95</option>
                            <option value="">Premium Treatment - €279.95</option>
                            <option value="">Full Detail Treatment - €279.95</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="block text-base font-medium text-[var(--color-text)] mb-2">Preferred
                            Date</label>
                        <input type="date" name="name" required
                            class="block w-full rounded-lg border border-[#AEAEB2] h-12 focus:outline-none focus:border-[#0088FF] px-4">
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button id="backToStep1"
                        class="px-4 py-3 bg-[#F2F2F7] text-base text-[var(--color-text)] font-medium tracking-[0.02px] rounded-[60px] w-[110px] flex justify-center items-center cursor-pointer">Back</button>
                    <button id="bookNowBtn"
                        class="px-4 py-3 bg-[var(--color-brand)] btn-brand text-base text-white font-medium tracking-[0.02px] rounded-[60px] w-[135px] flex justify-center items-center cursor-pointer">
                        <span class="btn-text">Book Now</span>
                        <span class="spinner hidden"></span>
                    </button>
                </div>
            </div>
        </div>
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

    //package details expand collapse


    document.addEventListener('DOMContentLoaded', function () {

        const toggleButton = document.querySelector('#togglePackageDetails');

        // initialize state if not present
        if (!toggleButton.hasAttribute('data-expanded')) {
            toggleButton.setAttribute('data-expanded', 'false');
            toggleButton.setAttribute('aria-expanded', 'false');
        }

        function setExpanded(expanded) {
            const bodiesAndFooters = document.querySelectorAll('.pricing-card-body, .pricing-card-footer');
            bodiesAndFooters.forEach(el => {
                if (expanded) el.classList.remove('hidden');
                else el.classList.add('hidden');
            });

            toggleButton.querySelector('span').textContent = expanded ? 'Collapse Package Details' : 'View Package Details';
            document.querySelector('#togglePackageDetails svg').classList.toggle('rotate-180');
            toggleButton.setAttribute('data-expanded', expanded ? 'true' : 'false');
            toggleButton.setAttribute('aria-expanded', expanded ? 'true' : 'false');

        }

        // attach click (and keyboard) handlers
        toggleButton.addEventListener('click', function () {
            console.log('clicked');
            const isExpanded = toggleButton.getAttribute('data-expanded') === 'true';
            setExpanded(!isExpanded);
        });

        // optional: support Enter/Space on the button for accessibility
        toggleButton.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleButton.click();
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Step elements
        const step1 = document.querySelector('.step-1');
        const step2 = document.querySelector('.step-2');
        const nextBtn = document.getElementById('nextStepBtn');
        const backBtn = document.getElementById('backToStep1');
        const clearBtn = document.getElementById('clearSelection');
        const selectedInfo = document.getElementById('selectedInfo');

        // Pricing grid
        const grid = document.getElementById('pricingGrid');
        const cards = grid ? Array.from(grid.querySelectorAll('.pricing-card')) : [];

        // Form inputs
        const formPlanId = document.getElementById('formPlanId');
        const formPlanName = document.getElementById('formPlanName');
        const formPlanPrice = document.getElementById('formPlanPrice');

        let selectedCard = null;

        if (!step1 || !step2 || !nextBtn || cards.length === 0) {
            // Required elements missing — nothing to do
            return;
        }

        // ----- Helpers -----
        function showStep(el) {
            el.classList.remove('hidden');
            el.setAttribute('aria-hidden', 'false');
        }

        function hideStep(el) {
            el.classList.add('hidden');
            el.setAttribute('aria-hidden', 'true');
        }

        function enableNextBtn() {
            nextBtn.disabled = false;
            nextBtn.classList.remove('cursor-not-allowed', 'bg-gray-400');
            nextBtn.classList.add('bg-[#230C0F]');
        }

        function disableNextBtn() {
            nextBtn.disabled = true;
            nextBtn.classList.add('cursor-not-allowed', 'bg-gray-400');
            nextBtn.classList.remove('bg-[#230C0F]');
        }

        function setSelected(card) {
            if (selectedCard === card) {
                // Toggle off
                selectedCard.classList.remove('border-[#34C759]');
                selectedCard.setAttribute('aria-pressed', 'false');
                const check = selectedCard.querySelector('.checkmark');
                if (check) check.classList.add('hidden');

                selectedCard = null;
                // selectedInfo.textContent = 'No package selected';
                disableNextBtn();
                return;
            }

            // Unselect previous
            if (selectedCard && selectedCard !== card) {
                selectedCard.classList.remove('border-[#34C759]');
                selectedCard.setAttribute('aria-pressed', 'false');
                const prevCheck = selectedCard.querySelector('.checkmark');
                if (prevCheck) prevCheck.classList.add('hidden');
            }

            // Select new card
            selectedCard = card;
            selectedCard.classList.add('border-[#34C759]');
            selectedCard.setAttribute('aria-pressed', 'true');
            const check = selectedCard.querySelector('.checkmark');
            if (check) check.classList.remove('hidden');

            const name = card.dataset.planName || '—';
            const price = card.dataset.planPrice || '—';
            // selectedInfo.textContent = `Selected: ${name} (${price})`;

            enableNextBtn();
        }

        function clearSelection() {
            if (selectedCard) {
                selectedCard.classList.remove('border-[#34C759]');
                selectedCard.setAttribute('aria-pressed', 'false');
                const check = selectedCard.querySelector('.checkmark');
                if (check) check.classList.add('hidden');
            }
            selectedCard = null;
            // selectedInfo.textContent = 'No package selected';
            disableNextBtn();
        }

        // ----- Init -----
        hideStep(step2);
        showStep(step1);
        clearSelection();

        // ----- Pricing card handlers -----
        cards.forEach(card => {
            card.addEventListener('click', () => {
                setSelected(card);
            });

            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    card.click();
                }
            });
        });

        // ----- Clear button -----
        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                clearSelection();
                hideStep(step2);
                showStep(step1);
            });
        }

        // ----- Next button -----
        nextBtn.addEventListener('click', () => {
            console.log('Next button clicked');
            if (!selectedCard) return;

            const formPlanId = document.getElementById('formPlanId');
            const formPlanName = document.getElementById('formPlanName');
            const formPlanPrice = document.getElementById('formPlanPrice');

            if (formPlanId && formPlanName && formPlanPrice) {
                formPlanId.value = selectedCard.dataset.planId || '';
                formPlanName.value = selectedCard.dataset.planName || '';
                formPlanPrice.value = selectedCard.dataset.planPrice || '';
            }

            hideStep(step1);
            showStep(step2);
        });


        // ----- Back button -----
        if (backBtn) {
            backBtn.addEventListener('click', () => {
                hideStep(step2);
                showStep(step1);
                if (selectedCard) selectedCard.focus(); // Accessibility
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.pricing-opt-global');

        function updatePrices(type) {
            const allPrices = document.querySelectorAll('.price');
            allPrices.forEach(priceEl => {
                const newPrice = priceEl.dataset[type];
                if (newPrice) {
                    priceEl.textContent = newPrice;
                }
            });
        }

        function setActive(button) {
            buttons.forEach(btn => {
                btn.classList.remove('bg-[var(--color-brand)]', 'text-white');
                btn.classList.add('text-[#8D8D8D]');
            });

            button.classList.add('bg-[var(--color-brand)]', 'text-white');
            button.classList.remove('text-[#8D8D8D]');
        }

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                setActive(this);
                const selectedType = this.textContent.trim().toLowerCase();
                updatePrices(selectedType);
            });
        });

        // ✅ Detect which button is already active (via class in HTML)
        const defaultBtn = [...buttons].find(btn => btn.classList.contains('bg-[var(--color-brand)]'));

        if (defaultBtn) {
            // Only call updatePrices — don't re-style
            const selectedType = defaultBtn.textContent.trim().toLowerCase();
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const heroBookingForm = document.getElementById('heroBookingForm');
    if (heroBookingForm) {
        heroBookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('heroBookingForm submission started.');

            const form = this;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('#bookNowBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const spinner = submitBtn.querySelector('.spinner');
            const formMessage = heroModal.querySelector('#formMessage');

            // Disable button and show spinner
            if(submitBtn) submitBtn.disabled = true;
            if(btnText) btnText.classList.add('hidden');
            if(spinner) spinner.classList.remove('hidden');
            if(formMessage) formMessage.classList.add('hidden');

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response data:', data);
                if (data.success) {
                    form.reset();
                    form.classList.add('hidden');
                    if(formMessage) {
                        formMessage.innerHTML = `<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">${data.message}</div>`;
                        formMessage.classList.remove('hidden');
                    }
                    setTimeout(() => {
                        if (typeof closeHeroModal === 'function') {
                            closeHeroModal();
                        }
                    }, 5000);
                } else {
                    let errorMessage = 'Something went wrong. Please try again.';
                    if (data && data.message) {
                        errorMessage = data.message;
                    }
                    if(formMessage) {
                        formMessage.innerHTML = `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">${errorMessage}</div>`;
                        formMessage.classList.remove('hidden');
                    }
                }
            })
            .catch(error => {
                console.error('Error during form submission:', error);
                if(formMessage) {
                    formMessage.innerHTML = `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">An unexpected error occurred. Please try again.</div>`;
                    formMessage.classList.remove('hidden');
                }
            })
            .finally(() => {
                console.log('Form submission finished.');
                if(submitBtn) submitBtn.disabled = false;
                if(btnText) btnText.classList.remove('hidden');
                if(spinner) spinner.classList.add('hidden');
            });
        });
    }
});
</script>