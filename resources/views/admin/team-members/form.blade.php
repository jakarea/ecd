{{-- Name Field --}}
<div class="mb-4 form-field-animate">
    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
    <input type="text" name="name" id="name" value="{{ old('name', $teamMember->name ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent input-focus @error('name') border-red-500 @enderror"
        required>
    @error('name')
        <p class="text-red-500 text-sm mt-1 alert-animate">{{ $message }}</p>
    @enderror
</div>

{{-- Position Field --}}
<div class="mb-4 form-field-animate">
    <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Position *</label>
    <input type="text" name="position" id="position" value="{{ old('position', $teamMember->position ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent input-focus @error('position') border-red-500 @enderror"
        required>
    @error('position')
        <p class="text-red-500 text-sm mt-1 alert-animate">{{ $message }}</p>
    @enderror
</div>

{{-- Image Field --}}
<div class="mb-4 form-field-animate">
    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
        Image * @if(isset($teamMember) && $teamMember->image)(Leave empty to keep current)@endif
    </label>

    @if(isset($teamMember) && $teamMember->image)
        <div class="mb-3">
            <img src="{{ Storage::url($teamMember->image) }}" alt="{{ $teamMember->name }}"
                class="w-32 h-32 object-cover rounded-lg border-2 border-gray-200">
        </div>
    @endif

    <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/webp"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent input-focus @error('image') border-red-500 @enderror"
        {{ isset($teamMember) ? '' : 'required' }}>
    @error('image')
        <p class="text-red-500 text-sm mt-1 alert-animate">{{ $message }}</p>
    @enderror
    <p class="text-gray-500 text-xs mt-1">Supported formats: JPEG, PNG, JPG, WEBP. Max size: 5MB</p>
</div>

{{-- Order Field --}}
<div class="mb-4 form-field-animate">
    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
    <input type="number" name="order" id="order" value="{{ old('order', $teamMember->order ?? 0) }}" min="0"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent input-focus @error('order') border-red-500 @enderror">
    @error('order')
        <p class="text-red-500 text-sm mt-1 alert-animate">{{ $message }}</p>
    @enderror
    <p class="text-gray-500 text-xs mt-1">Lower numbers appear first</p>
</div>

{{-- Active Status --}}
<div class="mb-4 form-field-animate">
    <label class="flex items-center cursor-pointer">
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $teamMember->is_active ?? true) ? 'checked' : '' }}
            class="w-4 h-4 text-[var(--color-brand)] border-gray-300 rounded focus:ring-[var(--color-brand)]">
        <span class="ml-2 text-sm font-medium text-gray-700">Active (visible on website)</span>
    </label>
</div>
