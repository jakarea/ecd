@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-900">Dashboard</a>
                <span>/</span>
                <a href="{{ route('admin.testimonials.index') }}" class="hover:text-gray-900">Testimonials</a>
                <span>/</span>
                <span class="text-gray-900">Edit</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Testimonial</h1>
            <p class="text-gray-600 mt-1">Update testimonial from {{ $testimonial->name }}</p>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.testimonials.form', ['testimonial' => $testimonial, 'submitText' => 'Update Testimonial'])
        </form>
    </div>
@endsection
