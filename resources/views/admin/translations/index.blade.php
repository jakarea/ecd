@extends('admin.layouts.app')

@section('title', 'Translations')

@section('page-title', 'Translations')

@section('content')
    <div class="mb-4 sm:mb-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Manage Translations</h2>
        <p class="text-gray-600 text-sm sm:text-base mt-1">Update translations for your website.</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="mb-4">
            <input type="text" id="translation-search" placeholder="Search for a translation key..." class="shadow-sm focus:ring-[var(--color-brand)] focus:border-[var(--color-brand)] block w-full sm:text-sm border-gray-300 rounded-md">
        </div>

        <form action="{{ route('admin.translations.update', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6" id="translations-container">
                @foreach ($nlTranslations as $key => $value)
                    <div class="p-4 border rounded-lg translation-item" data-key="{{ $key }}">
                        <h3 class="text-lg font-medium text-gray-900">{{ $key }}</h3>
                        <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Dutch</label>
                                <textarea name="nl[{{ $key }}]" rows="3" class="shadow-sm focus:ring-[var(--color-brand)] focus:border-[var(--color-brand)] block w-full sm:text-sm border-gray-300 rounded-md">{{ $value }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">English</label>
                                <textarea name="en[{{ $key }}]" rows="3" class="shadow-sm focus:ring-[var(--color-brand)] focus:border-[var(--color-brand)] block w-full sm:text-sm border-gray-300 rounded-md">{{ $enTranslations[$key] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[var(--color-brand)] hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-brand)]">
                    Save Translations
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('translation-search');
        const translationsContainer = document.getElementById('translations-container');
        const translationItems = translationsContainer.getElementsByClassName('translation-item');

        searchInput.addEventListener('keyup', function () {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 0; i < translationItems.length; i++) {
                const item = translationItems[i];
                const key = item.getAttribute('data-key').toLowerCase();
                const nlValue = item.querySelector('textarea[name^="nl"]').value.toLowerCase();
                const enValue = item.querySelector('textarea[name^="en"]').value.toLowerCase();

                if (key.includes(searchTerm) || nlValue.includes(searchTerm) || enValue.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            }
        });
    });
</script>
@endpush
