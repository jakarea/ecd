@extends('admin.layouts.app')

@section('title', 'Create Hero Section')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Create Hero Section</h1>
                <p class="text-gray-600 mt-1">Add a new hero section for a page</p>
            </div>
            <a href="{{ route('admin.hero-sections.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to List
            </a>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.hero-sections.store', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.hero-sections.form')

                <div class="flex gap-3 pt-6 border-t">
                    <button type="submit"
                        class="px-6 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition font-medium">
                        Create Hero Section
                    </button>
                    <a href="{{ route('admin.hero-sections.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
