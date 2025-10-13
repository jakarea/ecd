@extends('admin.layouts.app')

@section('title', 'Hero Sections')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Hero Sections</h1>
                <p class="text-gray-600 mt-1">Manage hero sections for all pages</p>
            </div>
            <a href="{{ route('admin.hero-sections.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Hero Section
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Hero Sections Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($heroSections as $heroSection)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    {{-- Preview --}}
                    <div class="h-48 bg-gray-200 relative overflow-hidden">
                        @if ($heroSection->media_type === 'video' && $heroSection->background_video)
                            <div class="absolute inset-0 flex items-center justify-center bg-gray-800">
                                <svg class="w-16 h-16 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                                </svg>
                                <span class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white text-xs px-2 py-1 rounded">
                                    VIDEO
                                </span>
                            </div>
                        @elseif ($heroSection->background_image)
                            @if(str_starts_with($heroSection->background_image, 'assets/'))
                                <img src="{{ asset($heroSection->background_image) }}" alt="{{ $heroSection->page_name }}"
                                    class="w-full h-full object-cover">
                            @else
                                <img src="{{ Storage::url($heroSection->background_image) }}" alt="{{ $heroSection->page_name }}"
                                    class="w-full h-full object-cover">
                            @endif
                        @else
                            <div class="w-full h-full flex items-center justify-center {{ $heroSection->background_color }}">
                                <span class="text-gray-400 text-sm">No background</span>
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-4">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $heroSection->page_name }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $heroSection->page_identifier }}
                                    </span>
                                </p>
                            </div>
                            <form action="{{ route('admin.hero-sections.toggle', $heroSection) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-2 py-1 rounded-full text-xs font-semibold {{ $heroSection->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $heroSection->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </div>

                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $heroSection->title }}</p>

                        <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                @if ($heroSection->media_type === 'video')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                    </svg>
                                    Video
                                @else
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                    </svg>
                                    Image
                                @endif
                            </span>
                            @if ($heroSection->show_social_icons)
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                    Social Icons
                                </span>
                            @endif
                        </div>

                        {{-- Actions --}}
                        <div class="flex gap-2 pt-3 border-t">
                            <a href="{{ route('admin.hero-sections.edit', $heroSection) }}"
                                class="flex-1 text-center px-3 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-100 transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.hero-sections.destroy', $heroSection) }}" method="POST"
                                class="flex-1" onsubmit="return confirm('Are you sure you want to delete this hero section?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full px-3 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-lg shadow p-12 text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No hero sections found</h3>
                        <p class="text-gray-600 mb-6">Get started by creating your first hero section</p>
                        <a href="{{ route('admin.hero-sections.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create Hero Section
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
