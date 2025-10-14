@extends('admin.layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Bookings</h1>
                <p class="text-gray-600 mt-1">Manage customer service bookings</p>
            </div>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Status Filter Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <a href="{{ route('admin.bookings.index') }}"
                class="bg-white p-4 rounded-lg shadow hover:shadow-md transition {{ !request('status') || request('status') === 'all' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">All Bookings</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $pendingCount + $confirmedCount + $completedCount + $cancelledCount }}</p>
                    </div>
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </a>

            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}"
                class="bg-white p-4 rounded-lg shadow hover:shadow-md transition {{ request('status') === 'pending' ? 'ring-2 ring-yellow-500' : '' }}">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Pending</p>
                        <p class="text-2xl font-bold text-yellow-600">{{ $pendingCount }}</p>
                    </div>
                    <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </a>

            <a href="{{ route('admin.bookings.index', ['status' => 'confirmed']) }}"
                class="bg-white p-4 rounded-lg shadow hover:shadow-md transition {{ request('status') === 'confirmed' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Confirmed</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $confirmedCount }}</p>
                    </div>
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </a>

            <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}"
                class="bg-white p-4 rounded-lg shadow hover:shadow-md transition {{ request('status') === 'completed' ? 'ring-2 ring-green-500' : '' }}">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Completed</p>
                        <p class="text-2xl font-bold text-green-600">{{ $completedCount }}</p>
                    </div>
                    <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </a>
        </div>

        {{-- Search Bar --}}
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <form action="{{ route('admin.bookings.index') }}" method="GET" class="flex gap-4">
                <input type="hidden" name="status" value="{{ request('status') }}">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by name or address..."
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.bookings.index', ['status' => request('status')]) }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        {{-- Bookings Table --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Package
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Booked On
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 font-semibold">{{ substr($booking->first_name, 0, 1) }}{{ substr($booking->last_name, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $booking->full_name }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($booking->address, 30) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $booking->package_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $booking->package_price }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $booking->preferred_date->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $booking->preferred_date->diffForHumans() }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $booking->status === 'confirmed' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $booking->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.bookings.show', $booking) }}"
                                        class="text-blue-600 hover:text-blue-900 mr-3">
                                        View
                                    </a>
                                    <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                    <p class="text-lg font-medium">No bookings found</p>
                                    <p class="text-sm mt-1">Bookings will appear here when customers submit the form</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($bookings->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
