<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- First Name Field --}}
    <div class="mb-4">
        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $booking->first_name ?? '') }}"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('first_name') border-red-500 @enderror"
            required>
        @error('first_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Last Name Field --}}
    <div class="mb-4">
        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $booking->last_name ?? '') }}"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('last_name') border-red-500 @enderror"
            required>
        @error('last_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Address Field --}}
<div class="mb-4">
    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
    <input type="text" name="address" id="address" value="{{ old('address', $booking->address ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror"
        required>
    @error('address')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Package Name Field --}}
    <div class="mb-4">
        <label for="package_name" class="block text-sm font-medium text-gray-700 mb-2">Package Name *</label>
        <select name="package_name" id="package_name"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('package_name') border-red-500 @enderror"
            required>
            <option value="">Select a package</option>
            <option value="Basic Package" {{ old('package_name', $booking->package_name ?? '') == 'Basic Package' ? 'selected' : '' }}>Basic Package</option>
            <option value="Standard Package" {{ old('package_name', $booking->package_name ?? '') == 'Standard Package' ? 'selected' : '' }}>Standard Package</option>
            <option value="Premium Package" {{ old('package_name', $booking->package_name ?? '') == 'Premium Package' ? 'selected' : '' }}>Premium Package</option>
            <option value="Custom Package" {{ old('package_name', $booking->package_name ?? '') == 'Custom Package' ? 'selected' : '' }}>Custom Package</option>
        </select>
        @error('package_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Package Price Field --}}
    <div class="mb-4">
        <label for="package_price" class="block text-sm font-medium text-gray-700 mb-2">Package Price *</label>
        <input type="text" name="package_price" id="package_price" value="{{ old('package_price', $booking->package_price ?? '') }}"
            placeholder="e.g., €99.00"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('package_price') border-red-500 @enderror"
            required>
        @error('package_price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- Preferred Date Field --}}
    <div class="mb-4">
        <label for="preferred_date" class="block text-sm font-medium text-gray-700 mb-2">Preferred Date *</label>
        <input type="date" name="preferred_date" id="preferred_date"
            value="{{ old('preferred_date', isset($booking) ? $booking->preferred_date->format('Y-m-d') : '') }}"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('preferred_date') border-red-500 @enderror"
            required>
        @error('preferred_date')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Status Field --}}
    <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
        <select name="status" id="status"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
            required>
            <option value="pending" {{ old('status', $booking->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ old('status', $booking->status ?? '') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="completed" {{ old('status', $booking->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ old('status', $booking->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        @error('status')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Notes Field --}}
<div class="mb-4">
    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
    <textarea name="notes" id="notes" rows="4"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('notes') border-red-500 @enderror"
        placeholder="Add any additional notes about this booking...">{{ old('notes', $booking->notes ?? '') }}</textarea>
    @error('notes')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
