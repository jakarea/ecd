<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - ECD Admin</title>
    @php
        $faviconPath = App\Models\Setting::get('favicon_path');
    @endphp
    @if ($faviconPath)
        <link rel="icon" href="{{ asset($faviconPath) }}">
    @endif
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/admin-animations.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-professional.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('styles')
</head>

<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden page-load">
        {{-- Sidebar --}}
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300 ease-in-out">
            {{-- Sidebar Header --}}
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <img src="{{ asset(\App\Models\Setting::get('logo', 'assets/img/color-logo.png')) }}" alt="ECD Logo" class="h-8 w-auto">
                    <span class="text-xl font-bold text-[var(--color-brand)]">ECD Admin</span>
                </div>
                <button id="closeSidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Sidebar Navigation --}}
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.dashboard') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.users.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.users.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="font-medium">Users</span>
                </a>

                <a href="{{ route('admin.bookings.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.bookings.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium">Bookings</span>
                </a>

                <a href="{{ route('admin.seo.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.seo.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span class="font-medium">SEO Management</span>
                </a>

                <a href="{{ route('admin.testimonials.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.testimonials.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span class="font-medium">Testimonials</span>
                </a>

                <a href="{{ route('admin.hero-sections.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.hero-sections.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium">Hero Sections</span>
                </a>

                <a href="{{ route('admin.gallery.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.gallery.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium">Gallery</span>
                </a>

                <a href="{{ route('admin.faqs.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.faqs.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">FAQs</span>
                </a>

                <a href="{{ route('admin.team-members.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.team-members.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-medium">Team Members</span>
                </a>

                <a href="{{ route('admin.translations.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.translations.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5h12M9 3v2m4 0v2M3 10h12M3 15h12M4 19h10M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                    <span class="font-medium">Translations</span>
                </a>

                <a href="{{ route('home', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" target="_blank"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    <span class="font-medium">View Website</span>
                </a>

                <div class="pt-4 mt-4 border-t border-gray-200">
                    <a href="{{ route('admin.settings.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-700 rounded-lg transition-all duration-200 hover:bg-gray-50 sidebar-item {{ request()->routeIs('admin.settings.*') ? 'bg-[var(--color-brand)] !text-white hover:!bg-[var(--color-brand)]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-medium">Settings</span>
                    </a>

                    <!-- TEST: This should be visible -->
                    <div class="mt-2 p-2 bg-red-100 text-red-800 text-sm">
                        DEBUG: If you see this, the file is updating correctly
                    </div>

                    <form action="{{ route('admin.logout', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-3 text-red-600 rounded-lg transition-all duration-200 hover:bg-red-50 sidebar-item">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </nav>

            {{-- Sidebar Footer --}}
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center gap-3 px-4 py-3 bg-gray-50 rounded-lg animate-fade-in">
                    <div class="flex-shrink-0 w-10 h-10 bg-[var(--color-brand)] rounded-full flex items-center justify-center text-white font-bold avatar-animate">
                        {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-red-50 text-red-600 rounded-lg font-medium transition-all duration-200 hover:bg-red-100 btn-animate">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Overlay for mobile --}}
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Header --}}
            <header class="bg-white border-b border-gray-200 h-16 flex items-center px-4 sm:px-6">
                <button id="openSidebar" class="lg:hidden text-gray-500 hover:text-gray-700 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h2>
            </header>

            {{-- Main Content --}}
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    @vite('resources/js/app.js')

    {{-- SweetAlert2 Messages --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'animate-fade-in'
                }
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'animate-fade-in'
                }
            });
        </script>
    @endif

    @stack('scripts')

    {{-- Sidebar Toggle Script --}}
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        openSidebar?.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });

        closeSidebar?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
</body>

</html>
