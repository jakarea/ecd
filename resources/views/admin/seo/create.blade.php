@extends('admin.layouts.app')

@section('title', 'Create SEO Entry')

@section('page-title', 'Create SEO Entry')

@section('content')
    <div class="mb-4 sm:mb-6">
        <div class="flex items-center gap-3 mb-4">
            <a href="{{ route('admin.seo.index') }}"
                class="text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Create New SEO Entry</h2>
                <p class="text-gray-600 text-sm sm:text-base mt-1">Add SEO meta tags for a new page</p>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.seo.store') }}" method="POST" class="space-y-6">
        @csrf
        @include('admin.seo.form', ['seo' => null, 'submitText' => 'Create SEO Entry'])
    </form>
@endsection

@push('scripts')
    <script>
        // Character counter function
        function updateCharCounter(inputId, counterId, maxLength) {
            const input = document.getElementById(inputId);
            const counter = document.getElementById(counterId);
            if (input && counter) {
                const length = input.value.length;
                counter.textContent = `${length}/${maxLength}`;

                // Color coding
                if (inputId === 'meta_title') {
                    if (length >= 50 && length <= 60) {
                        counter.classList.add('text-green-600');
                        counter.classList.remove('text-yellow-600', 'text-red-600');
                    } else if (length >= 30 && length <= 70) {
                        counter.classList.add('text-yellow-600');
                        counter.classList.remove('text-green-600', 'text-red-600');
                    } else {
                        counter.classList.add('text-red-600');
                        counter.classList.remove('text-green-600', 'text-yellow-600');
                    }
                } else if (inputId === 'meta_description') {
                    if (length >= 150 && length <= 160) {
                        counter.classList.add('text-green-600');
                        counter.classList.remove('text-yellow-600', 'text-red-600');
                    } else if (length >= 120 && length <= 180) {
                        counter.classList.add('text-yellow-600');
                        counter.classList.remove('text-green-600', 'text-red-600');
                    } else {
                        counter.classList.add('text-red-600');
                        counter.classList.remove('text-green-600', 'text-yellow-600');
                    }
                }
            }
        }

        // Initialize all character counters
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = [
                { id: 'meta_title', max: 60 },
                { id: 'meta_description', max: 500 },
                { id: 'og_title', max: 95 },
                { id: 'twitter_title', max: 70 }
            ];

            inputs.forEach(input => {
                const element = document.getElementById(input.id);
                if (element) {
                    updateCharCounter(input.id, `${input.id}_count`, input.max);
                    element.addEventListener('input', () => {
                        updateCharCounter(input.id, `${input.id}_count`, input.max);
                    });
                }
            });
        });

        // Tab switching
        function switchTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('[data-tab]').forEach(tab => {
                tab.classList.add('hidden');
            });

            // Show selected tab
            document.querySelector(`[data-tab="${tabName}"]`).classList.remove('hidden');

            // Update tab buttons
            document.querySelectorAll('[data-tab-btn]').forEach(btn => {
                btn.classList.remove('border-[var(--color-brand)]', 'text-[var(--color-brand)]');
                btn.classList.add('border-transparent', 'text-gray-500');
            });

            const activeBtn = document.querySelector(`[data-tab-btn="${tabName}"]`);
            activeBtn.classList.remove('border-transparent', 'text-gray-500');
            activeBtn.classList.add('border-[var(--color-brand)]', 'text-[var(--color-brand)]');
        }
    </script>
@endpush
