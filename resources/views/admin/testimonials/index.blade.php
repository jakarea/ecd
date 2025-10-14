@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Testimonials</h1>
                <p class="text-gray-600 mt-1">Manage customer reviews and testimonials</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}"
                class="px-4 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Testimonial
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Testimonials Table --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Order
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Customer
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Images
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Review
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
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $testimonial->order }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if ($testimonial->profile_image)
                                        <img src="{{ Storage::url($testimonial->profile_image) }}"
                                            alt="{{ $testimonial->name }}"
                                            class="w-10 h-10 rounded-full object-cover mr-3">
                                    @else
                                        <div
                                            class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                            <span class="text-blue-600 font-semibold">{{ substr($testimonial->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $testimonial->name }}</div>
                                        @if ($testimonial->role)
                                            <div class="text-sm text-gray-500">{{ $testimonial->role }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($testimonial->vehicle_image)
                                    <img src="{{ Storage::url($testimonial->vehicle_image) }}" alt="Vehicle"
                                        class="w-16 h-12 rounded object-cover">
                                @else
                                    <span class="text-sm text-gray-400">No image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-600 line-clamp-2" style="max-width: 300px;">
                                    {{ $testimonial->review }}
                                </p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.testimonials.toggle', $testimonial) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-1 rounded-full text-xs font-semibold {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                        class="text-[var(--color-brand)] hover:opacity-70 font-medium link-hover">
                                        Edit
                                    </a>
                                    <button type="button" onclick="confirmDelete({{ $testimonial->id }})"
                                        class="text-red-600 hover:text-red-900 font-medium link-hover">
                                        Delete
                                    </button>
                                    <form id="delete-form-{{ $testimonial->id }}"
                                        action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                        method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
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
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                <p class="text-lg font-medium">No testimonials found</p>
                                <p class="text-sm mt-1">Get started by creating your first testimonial</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            @if ($testimonials->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $testimonials->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This testimonial will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-brand)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush
