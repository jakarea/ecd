@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Team Members</h1>
                <p class="text-gray-600 mt-1">Manage your team members</p>
            </div>
            <a href="{{ route('admin.team-members.create', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                class="px-4 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition flex items-center gap-2 btn-animate">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Member
            </a>
        </div>

        {{-- Team Members Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 animate-fade-in-up">
            @forelse($teamMembers as $member)
                <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover stagger-item">
                    {{-- Image --}}
                    <div class="relative h-64 bg-gray-200">
                        @if($member->image)
                            <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                <svg class="w-20 h-20 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="p-4">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $member->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $member->position }}</p>
                                <p class="text-xs text-gray-500 mt-1">Order: {{ $member->order }}</p>
                            </div>
                            <form action="{{ route('admin.team-members.toggle', ['locale' => request()->route('locale') ?? request()->segment(1), 'teamMember' => $member]) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-2 py-1 rounded-full text-xs font-semibold badge-animate {{ $member->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $member->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </div>

                        {{-- Actions --}}
                        <div class="flex gap-2 mt-4 pt-4 border-t">
                        <a href="{{ route('admin.team-members.edit', [
    'locale' => request()->route('locale') ?? request()->segment(1), 
    'team_member' => $member 
]) }}"
                                class="flex-1 text-center px-3 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition text-sm font-medium">
                                Edit
                            </a>
                            <button type="button" onclick="confirmDelete({{ $member->id }})"
                                class="flex-1 text-center px-3 py-2 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm font-medium">
                                Delete
                            </button>
                            <form id="delete-form-{{ $member->id }}"
                                action="{{ route('admin.team-members.destroy', ['locale' => request()->route('locale') ?? request()->segment(1), 'team_member' => $member]) }}"
                                method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                            
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-lg shadow p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="text-lg font-medium text-gray-900">No team members found</p>
                    <p class="text-sm text-gray-500 mt-1">Get started by adding your first team member</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($teamMembers->hasPages())
            <div class="mt-6">
                {{ $teamMembers->links() }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This team member will be permanently deleted!",
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
