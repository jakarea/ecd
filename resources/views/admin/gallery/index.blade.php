@extends('admin.layouts.app')

@section('title', 'Gallery Items')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Gallery Items</h1>
                <p class="text-gray-600 mt-1">Manage gallery videos, interior, exterior, and before/after images</p>
            </div>
            <a href="{{ route('admin.gallery.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Item
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Gallery Items Table --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Order
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Preview
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($galleryItems as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $item->order }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $item->type === 'video' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $item->type === 'interior' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $item->type === 'exterior' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $item->type === 'before&after' ? 'bg-orange-100 text-orange-800' : '' }}">
                                    {{ ucfirst($item->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $item->title ?? 'Untitled' }}</div>
                                @if ($item->description)
                                    <p class="text-sm text-gray-500 line-clamp-1">{{ $item->description }}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->isVideo())
                                    @if ($item->video_thumbnail)
                                        <img src="{{ Storage::url($item->video_thumbnail) }}" alt="Video thumbnail"
                                            class="w-20 h-14 rounded object-cover">
                                    @else
                                        <div class="w-20 h-14 bg-purple-100 rounded flex items-center justify-center">
                                            <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                                            </svg>
                                        </div>
                                    @endif
                                @elseif ($item->isBeforeAfter())
                                    <div class="flex gap-1">
                                        @if ($item->before_image)
                                            <img src="{{ Storage::url($item->before_image) }}" alt="Before"
                                                class="w-10 h-14 rounded object-cover">
                                        @endif
                                        @if ($item->after_image)
                                            <img src="{{ Storage::url($item->after_image) }}" alt="After"
                                                class="w-10 h-14 rounded object-cover">
                                        @endif
                                    </div>
                                @else
                                    @if ($item->image)
                                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}"
                                            class="w-20 h-14 rounded object-cover">
                                    @else
                                        <span class="text-sm text-gray-400">No image</span>
                                    @endif
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.gallery.edit', $item) }}"
                                        class="text-blue-600 hover:text-blue-900">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this gallery item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-lg font-medium">No gallery items found</p>
                                <p class="text-sm mt-1">Get started by creating your first gallery item</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            @if ($galleryItems->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $galleryItems->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
