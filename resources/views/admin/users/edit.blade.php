@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center mb-4">
                <a href="{{ route('admin.users.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" class="text-[var(--color-brand)] hover:opacity-70 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Edit User</h1>
                    <p class="text-gray-600 mt-1">Update user information</p>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.users.update', ['locale' => request()->route('locale') ?? request()->segment(1), 'user' => $user]) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.users.form')

                <div class="flex gap-4 mt-6">
                    <button type="submit"
                        class="px-6 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition">
                        Update User
                    </button>
                    <a href="{{ route('admin.users.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
