@extends('admin.layouts.app')

@section('title', 'Booking Details')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('admin.bookings.index') }}" class="hover:text-blue-600">Bookings</a>
                <span>/</span>
                <span>Booking #{{ $booking->id }}</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Booking Details</h1>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Info --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Customer Information --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Customer Information
                    </h2>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">First Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $booking->first_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Last Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $booking->last_name }}</dd>
                        </div>
                        <div class="md:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $booking->address }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Service Details --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        Service Details
                    </h2>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Package</dt>
                            <dd class="mt-1 text-sm font-semibold text-gray-900">{{ $booking->package_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Price</dt>
                            <dd class="mt-1 text-sm font-semibold text-green-600">{{ $booking->package_price }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Preferred Date</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $booking->preferred_date->format('l, F j, Y') }}
                                <span class="text-xs text-gray-500">({{ $booking->preferred_date->diffForHumans() }})</span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Booking Date</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $booking->created_at->format('M d, Y h:i A') }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Security Info --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Security Information
                    </h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">IP Address</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $booking->ip_address }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">User Agent</dt>
                            <dd class="mt-1 text-xs text-gray-900 break-all">{{ $booking->user_agent }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Status Update --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Update Status</h2>
                    <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                            <textarea name="notes" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Add any notes...">{{ $booking->notes }}</textarea>
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition font-medium">
                            Update Status
                        </button>
                    </form>
                </div>

                {{-- Current Status Badge --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-3">Current Status</h2>
                    <span class="px-4 py-2 inline-flex text-sm font-semibold rounded-full
                        {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $booking->status === 'confirmed' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                        {{ ucfirst($booking->status) }}
                    </span>

                    @if($booking->notes)
                        <div class="mt-4 pt-4 border-t">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Notes</h3>
                            <p class="text-sm text-gray-600">{{ $booking->notes }}</p>
                        </div>
                    @endif
                </div>

                {{-- Quick Actions --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-3">Quick Actions</h2>
                    <div class="space-y-2">
                        <a href="{{ route('admin.bookings.index') }}"
                            class="block w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center font-medium">
                            Back to Bookings
                        </a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this booking?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="block w-full px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition font-medium">
                                Delete Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
