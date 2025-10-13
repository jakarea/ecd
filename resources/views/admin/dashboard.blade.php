@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <div class="mb-4 sm:mb-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Dashboard</h2>
        <p class="text-gray-600 text-sm sm:text-base mt-1">Welcome to your admin dashboard</p>
    </div>

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 mb-6 sm:mb-8">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm">
            <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 sm:mb-2">Total Users</h3>
            <div class="text-2xl sm:text-4xl font-bold text-gray-900">{{ \App\Models\User::count() }}</div>
            <p class="text-gray-600 text-[10px] sm:text-xs mt-1 sm:mt-2">Registered users</p>
        </div>

        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm">
            <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 sm:mb-2">Total Bookings</h3>
            <div class="text-2xl sm:text-4xl font-bold text-gray-900">0</div>
            <p class="text-gray-600 text-[10px] sm:text-xs mt-1 sm:mt-2">All time bookings</p>
        </div>

        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm">
            <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 sm:mb-2">Pending Bookings</h3>
            <div class="text-2xl sm:text-4xl font-bold text-gray-900">0</div>
            <p class="text-gray-600 text-[10px] sm:text-xs mt-1 sm:mt-2">Awaiting confirmation</p>
        </div>

        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm">
            <h3 class="text-gray-600 text-xs sm:text-sm font-medium mb-1 sm:mb-2">Revenue</h3>
            <div class="text-2xl sm:text-4xl font-bold text-gray-900">€0</div>
            <p class="text-gray-600 text-[10px] sm:text-xs mt-1 sm:mt-2">Total revenue</p>
        </div>
    </div>

    {{-- Recent Activity Section --}}
    <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 mb-4 sm:mb-6">
        <h3 class="text-base sm:text-lg font-semibold mb-3 sm:mb-5">Recent Activity</h3>
        <div class="text-gray-600 text-center py-6 sm:py-10">
            <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto mb-3 sm:mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <p class="font-medium text-sm sm:text-base">No recent activity to display</p>
            <p class="text-[10px] sm:text-xs mt-1">Activity will appear here when users interact with your site</p>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold mb-3 sm:mb-5">Quick Actions</h3>
        <div class="flex flex-col sm:flex-row flex-wrap gap-2 sm:gap-3">
            <button
                class="inline-flex items-center justify-center px-4 sm:px-5 py-2 sm:py-2.5 bg-[var(--color-brand)] text-white text-sm sm:text-base rounded-md font-medium transition-all duration-200 hover:opacity-90"
                onclick="alert('Feature coming soon!')">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Booking
            </button>
            <button
                class="inline-flex items-center justify-center px-4 sm:px-5 py-2 sm:py-2.5 bg-gray-600 text-white text-sm sm:text-base rounded-md font-medium transition-all duration-200 hover:opacity-90"
                onclick="alert('Feature coming soon!')">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Add User
            </button>
            <a href="{{ route('home') }}" target="_blank"
                class="inline-flex items-center justify-center px-4 sm:px-5 py-2 sm:py-2.5 bg-gray-600 text-white text-sm sm:text-base rounded-md font-medium transition-all duration-200 hover:opacity-90 no-underline">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                View Website
            </a>
        </div>
    </div>

    {{-- System Information --}}
    <div class="bg-gray-50 rounded-lg shadow-sm p-4 sm:p-6 mt-4 sm:mt-6">
        <div class="flex justify-between items-center">
            <div>
                <h4 class="font-semibold text-gray-700 text-sm sm:text-base mb-0.5 sm:mb-1">System Status</h4>
                <p class="text-gray-600 text-[10px] sm:text-xs">All systems operational</p>
            </div>
            <div class="w-2.5 h-2.5 sm:w-3 sm:h-3 bg-green-500 rounded-full"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Add any dashboard-specific JavaScript here
        console.log('Admin Dashboard Loaded');
    </script>
@endpush
