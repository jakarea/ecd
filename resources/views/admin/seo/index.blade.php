@extends('admin.layouts.app')

@section('title', 'SEO Management')

@section('page-title', 'SEO Management')

@section('content')
    <div class="mb-4 sm:mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">SEO Management</h2>
                <p class="text-gray-600 text-sm sm:text-base mt-1">Manage SEO meta tags for all pages</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <form action="{{ route('admin.seo.recalculate') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2.5 bg-gray-700 text-white text-sm rounded-md font-medium transition-all duration-200 hover:opacity-90">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Recalculate All Scores
                    </button>
                </form>
                <a href="{{ route('admin.seo.create') }}"
                    class="inline-flex items-center justify-center px-4 py-2.5 bg-[var(--color-brand)] text-white text-sm rounded-md font-medium transition-all duration-200 hover:opacity-90">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Page
                </a>
            </div>
        </div>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
        <form method="GET" action="{{ route('admin.seo.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Page name or URL..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Page Type</label>
                <select name="type"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent">
                    <option value="">All Types</option>
                    <option value="home" {{ request('type') === 'home' ? 'selected' : '' }}>Home</option>
                    <option value="page" {{ request('type') === 'page' ? 'selected' : '' }}>Page</option>
                    <option value="blog" {{ request('type') === 'blog' ? 'selected' : '' }}>Blog</option>
                    <option value="custom" {{ request('type') === 'custom' ? 'selected' : '' }}>Custom</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">SEO Score</label>
                <select name="score"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent">
                    <option value="">All Scores</option>
                    <option value="excellent" {{ request('score') === 'excellent' ? 'selected' : '' }}>Excellent (80-100)
                    </option>
                    <option value="good" {{ request('score') === 'good' ? 'selected' : '' }}>Good (60-79)</option>
                    <option value="average" {{ request('score') === 'average' ? 'selected' : '' }}>Average (40-59)</option>
                    <option value="poor" {{ request('score') === 'poor' ? 'selected' : '' }}>Poor (0-39)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="sm:col-span-2 lg:col-span-4 flex gap-2">
                <button type="submit"
                    class="px-4 py-2 bg-[var(--color-brand)] text-white rounded-md font-medium hover:opacity-90 transition-all">
                    Apply Filters
                </button>
                <a href="{{ route('admin.seo.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md font-medium hover:bg-gray-300 transition-all">
                    Clear Filters
                </a>
            </div>
        </form>
    </div>

    {{-- SEO Pages List --}}
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        @if ($seoPages->count() > 0)
            {{-- Desktop Table View --}}
            <div class="hidden lg:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Page
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SEO
                                Score</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Updated</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($seoPages as $seo)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-medium text-gray-900">{{ $seo->page_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $seo->page_url }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 capitalize">
                                        {{ $seo->page_type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold
                                            @if ($seo->score_color === 'green') bg-green-500
                                            @elseif($seo->score_color === 'yellow') bg-yellow-500
                                            @elseif($seo->score_color === 'orange') bg-orange-500
                                            @else bg-red-500 @endif">
                                            {{ $seo->seo_score }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $seo->score_label }}</div>
                                            <div class="text-xs text-gray-500">{{ $seo->seo_score }}/100</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.seo.toggle', $seo) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-all
                                            {{ $seo->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                            {{ $seo->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $seo->updated_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ url($seo->page_url) }}" target="_blank"
                                            class="text-gray-600 hover:text-gray-900 transition-colors"
                                            title="View Page">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.seo.edit', $seo) }}"
                                            class="text-[var(--color-brand)] hover:opacity-80 transition-opacity"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.seo.destroy', $seo) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this SEO entry?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 transition-colors" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Mobile Card View --}}
            <div class="lg:hidden divide-y divide-gray-200">
                @foreach ($seoPages as $seo)
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-900">{{ $seo->page_name }}</h3>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $seo->page_url }}</p>
                            </div>
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800 capitalize ml-2">
                                {{ $seo->page_type }}
                            </span>
                        </div>

                        <div class="flex items-center gap-3 mb-3">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-bold
                                @if ($seo->score_color === 'green') bg-green-500
                                @elseif($seo->score_color === 'yellow') bg-yellow-500
                                @elseif($seo->score_color === 'orange') bg-orange-500
                                @else bg-red-500 @endif">
                                {{ $seo->seo_score }}
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-gray-900">{{ $seo->score_label }}</div>
                                <div class="text-xs text-gray-500">SEO Score: {{ $seo->seo_score }}/100</div>
                            </div>
                            <form action="{{ route('admin.seo.toggle', $seo) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    {{ $seo->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $seo->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </div>

                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <span class="text-xs text-gray-500">{{ $seo->updated_at->diffForHumans() }}</span>
                            <div class="flex items-center gap-3">
                                <a href="{{ url($seo->page_url) }}" target="_blank"
                                    class="text-gray-600 hover:text-gray-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.seo.edit', $seo) }}"
                                    class="text-[var(--color-brand)] hover:opacity-80">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.seo.destroy', $seo) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Delete this SEO entry?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $seoPages->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No SEO Pages Found</h3>
                <p class="text-gray-600 mb-6">Get started by creating your first SEO entry.</p>
                <a href="{{ route('admin.seo.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-[var(--color-brand)] text-white rounded-md font-medium hover:opacity-90 transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Page
                </a>
            </div>
        @endif
    </div>
@endsection
