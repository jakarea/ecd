@extends('admin.layouts.app')

@section('title', 'Create Testimonial')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('admin.dashboard', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" class="hover:text-gray-900">Dashboard</a>
                <span>/</span>
                <a href="{{ route('admin.testimonials.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" class="hover:text-gray-900">Testimonials</a>
                <span>/</span>
                <span class="text-gray-900">Create</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Create New Testimonial</h1>
            <p class="text-gray-600 mt-1">Add a new customer testimonial to your website</p>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.testimonials.store', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.testimonials.form', ['testimonial' => null, 'submitText' => 'Create Testimonial'])
        </form>
    </div>
@endsection
