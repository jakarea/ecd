{{-- Shared form component for create and edit --}}
<div class="space-y-6">
    {{-- Customer Information --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Customer Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $testimonial ? $testimonial->name : '') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                    placeholder="John Doe">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                    Role/Title
                </label>
                <input type="text" name="role" id="role"
                    value="{{ old('role', $testimonial ? $testimonial->role : '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('role') border-red-500 @enderror"
                    placeholder="CEO, Company XYZ">
                @error('role')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Review Content --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Review Content</h3>

        <div>
            <label for="review" class="block text-sm font-medium text-gray-700 mb-2">
                Review Text <span class="text-red-500">*</span>
            </label>
            <textarea name="review" id="review" rows="6" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('review') border-red-500 @enderror"
                placeholder="Write the customer's review here...">{{ old('review', $testimonial ? $testimonial->review : '') }}</textarea>
            @error('review')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-sm text-gray-500">This will be displayed on the homepage testimonials section</p>
        </div>
    </div>

    {{-- Images --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Images</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Vehicle Image --}}
            <div>
                <label for="vehicle_image" class="block text-sm font-medium text-gray-700 mb-2">
                    Vehicle Image
                </label>
                <input type="file" name="vehicle_image" id="vehicle_image" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('vehicle_image') border-red-500 @enderror"
                    onchange="previewImage(this, 'vehicle-preview')">
                @error('vehicle_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Recommended: 225x296px, JPG/PNG/WEBP, max 2MB</p>

                @if($testimonial && $testimonial->vehicle_image)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-2">Current image:</p>
                        <img src="{{ Storage::url($testimonial->vehicle_image) }}" alt="Current vehicle"
                            id="vehicle-preview" class="w-32 h-40 object-cover rounded-lg border border-gray-200">
                    </div>
                @else
                    <img id="vehicle-preview" class="hidden mt-3 w-32 h-40 object-cover rounded-lg border border-gray-200">
                @endif
            </div>

            {{-- Profile Image --}}
            <div>
                <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-2">
                    Profile Image
                </label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('profile_image') border-red-500 @enderror"
                    onchange="previewImage(this, 'profile-preview')">
                @error('profile_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Recommended: 62x62px (square), JPG/PNG/WEBP, max 2MB</p>

                @if($testimonial && $testimonial->profile_image)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-2">Current image:</p>
                        <img src="{{ Storage::url($testimonial->profile_image) }}" alt="Current profile"
                            id="profile-preview" class="w-16 h-16 object-cover rounded-full border border-gray-200">
                    </div>
                @else
                    <img id="profile-preview" class="hidden mt-3 w-16 h-16 object-cover rounded-full border border-gray-200">
                @endif
            </div>
        </div>
    </div>

    {{-- Settings --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                    Display Order
                </label>
                <input type="number" name="order" id="order" min="0"
                    value="{{ old('order', $testimonial ? $testimonial->order : 0) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('order') border-red-500 @enderror">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
            </div>

            <div class="flex items-center">
                <div>
                    <label for="is_active" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                            {{ old('is_active', $testimonial ? $testimonial->is_active : true) ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Active (show on website)</span>
                    </label>
                    <p class="mt-1 text-sm text-gray-500 ml-6">Uncheck to hide this testimonial</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.testimonials.index') }}"
            class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
            Cancel
        </a>
        <button type="submit"
            class="px-6 py-2 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition">
            {{ $submitText }}
        </button>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
