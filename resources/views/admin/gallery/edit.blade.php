@extends('admin.layouts.app')

@section('title', 'Edit Gallery Item')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('admin.gallery.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" class="hover:text-blue-600">Gallery</a>
                <span>/</span>
                <span>Edit Item</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Gallery Item</h1>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-lg shadow p-6">
            @if ($galleryItem)
            
                <form action="{{ route('admin.gallery.update', ['locale' => request()->route('locale') ?? request()->segment(1), 'galleryItem' => $galleryItem->id]) }}" method="POST" enctype="multipart/form-data">
 
                    @csrf
                    @method('PUT')
                    @include('admin.gallery.form')

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('admin.gallery.index',['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition">
                            Update Gallery Item
                        </button>
                    </div>
                </form>
            @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <p>Error: Gallery item not found.</p>
                    <p>Please ensure the gallery item exists and try again.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
