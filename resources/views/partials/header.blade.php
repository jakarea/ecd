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
                <a href="{{ route('contact') }}" class="btn-brand"><span>Let's Talk</span>
                    <svg width="25" height="11" viewBox="0 0 25 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 5.5H1M24 5.5L19.5 1M24 5.5L19.5 10" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
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