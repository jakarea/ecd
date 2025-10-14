{{-- Question Field --}}
<div class="mb-4 form-field-animate">
    <label for="question" class="block text-sm font-medium text-gray-700 mb-2">Question *</label>
    <input type="text" name="question" id="question" value="{{ old('question', $faq->question ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent input-focus @error('question') border-red-500 @enderror"
        required>
    @error('question')
        <p class="text-red-500 text-sm mt-1 alert-animate">{{ $message }}</p>
    @enderror
</div>

{{-- Answer Field --}}
<div class="mb-4 form-field-animate">
    <label for="answer" class="block text-sm font-medium text-gray-700 mb-2">Answer *</label>
    <textarea name="answer" id="answer" rows="6"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent input-focus @error('answer') border-red-500 @enderror"
        required>{{ old('answer', $faq->answer ?? '') }}</textarea>
    @error('answer')
        <p class="text-red-500 text-sm mt-1 alert-animate">{{ $message }}</p>
    @enderror
</div>

{{-- Order Field --}}
<div class="mb-4 form-field-animate">
    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
    <input type="number" name="order" id="order" value="{{ old('order', $faq->order ?? 0) }}" min="0"
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
            {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}
            class="w-4 h-4 text-[var(--color-brand)] border-gray-300 rounded focus:ring-[var(--color-brand)]">
        <span class="ml-2 text-sm font-medium text-gray-700">Active (visible on website)</span>
    </label>
</div>
