@extends('admin.layouts.app')

@section('title', 'Add Team Member')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center gap-2 mb-2">
                <a href="{{ route('admin.team-members.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="text-gray-600 hover:text-gray-900 link-hover">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Add New Team Member</h1>
            </div>
            <p class="text-gray-600">Fill in the details to add a new team member</p>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl animate-fade-in-up">
            <form action="{{ route('admin.team-members.store', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.team-members.form')

                <div class="flex gap-4 mt-6 pt-4 border-t">
                    <button type="submit"
                        class="px-6 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition btn-animate">
                        Create Team Member
                    </button>
                    <a href="{{ route('admin.team-members.index', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
