{{-- Gallery Type Selection --}}
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
        </svg>
        Gallery Type
    </h3>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition
            {{ old('type', $galleryItem->type ?? '') === 'video' ? 'border-purple-500 bg-purple-50' : 'border-gray-300 hover:border-purple-300' }}">
            <input type="radio" name="type" value="video"
                {{ old('type', $galleryItem->type ?? '') === 'video' ? 'checked' : '' }}
                class="sr-only" onchange="toggleTypeFields()" required>
            <svg class="w-8 h-8 mb-2 {{ old('type', $galleryItem->type ?? '') === 'video' ? 'text-purple-600' : 'text-gray-400' }}"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
            </svg>
            <span class="font-medium">Video</span>
        </label>

        <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition
            {{ old('type', $galleryItem->type ?? '') === 'interior' ? 'border-blue-500 bg-blue-50' : 'border-gray-300 hover:border-blue-300' }}">
            <input type="radio" name="type" value="interior"
                {{ old('type', $galleryItem->type ?? '') === 'interior' ? 'checked' : '' }}
                class="sr-only" onchange="toggleTypeFields()" required>
            <svg class="w-8 h-8 mb-2 {{ old('type', $galleryItem->type ?? '') === 'interior' ? 'text-blue-600' : 'text-gray-400' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="font-medium">Interior</span>
        </label>

        <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition
            {{ old('type', $galleryItem->type ?? '') === 'exterior' ? 'border-green-500 bg-green-50' : 'border-gray-300 hover:border-green-300' }}">
            <input type="radio" name="type" value="exterior"
                {{ old('type', $galleryItem->type ?? '') === 'exterior' ? 'checked' : '' }}
                class="sr-only" onchange="toggleTypeFields()" required>
            <svg class="w-8 h-8 mb-2 {{ old('type', $galleryItem->type ?? '') === 'exterior' ? 'text-green-600' : 'text-gray-400' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="font-medium">Exterior</span>
        </label>

        <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition
            {{ old('type', $galleryItem->type ?? '') === 'before&after' ? 'border-orange-500 bg-orange-50' : 'border-gray-300 hover:border-orange-300' }}">
            <input type="radio" name="type" value="before&after"
                {{ old('type', $galleryItem->type ?? '') === 'before&after' ? 'checked' : '' }}
                class="sr-only" onchange="toggleTypeFields()" required>
            <svg class="w-8 h-8 mb-2 {{ old('type', $galleryItem->type ?? '') === 'before&after' ? 'text-orange-600' : 'text-gray-400' }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
            </svg>
            <span class="font-medium">Before & After</span>
        </label>
    </div>
    @error('type')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>

{{-- Basic Information --}}
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Basic Information
    </h3>

    <div class="space-y-6">
        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                Title (Optional)
            </label>
            <input type="text" name="title" id="title" value="{{ old('title', $galleryItem->title ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                placeholder="Enter title">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                Description (Optional)
            </label>
            <textarea name="description" id="description" rows="3"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                placeholder="Enter description">{{ old('description', $galleryItem->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Order --}}
        <div>
            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                Display Order
            </label>
            <input type="number" name="order" id="order" value="{{ old('order', $galleryItem->order ?? 0) }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('order') border-red-500 @enderror"
                min="0">
            <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
            @error('order')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

{{-- Video Fields --}}
<div id="video-fields" class="mb-8 hidden">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
        </svg>
        Video Information
    </h3>

    <div class="space-y-6">
        {{-- Video URL --}}
        <div>
            <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">
                YouTube Video URL
            </label>
            <input type="url" name="video_url" id="video_url"
                value="{{ old('video_url', $galleryItem->video_url ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('video_url') border-red-500 @enderror"
                placeholder="https://www.youtube.com/watch?v=...">
            <p class="text-xs text-gray-500 mt-1">Any YouTube URL format (watch, embed, youtu.be)</p>
            @error('video_url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Video Thumbnail --}}
        <div>
            <label for="video_thumbnail" class="block text-sm font-medium text-gray-700 mb-2">
                Video Thumbnail (Optional)
            </label>
            <input type="file" name="video_thumbnail" id="video_thumbnail" accept="image/*"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('video_thumbnail') border-red-500 @enderror"
                onchange="previewImage(event, 'video-thumbnail-preview')">
            <p class="text-xs text-gray-500 mt-1">Custom thumbnail image (Max: 5MB)</p>
            @error('video_thumbnail')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if (isset($galleryItem) && $galleryItem->video_thumbnail)
                <div class="mt-3">
                    <p class="text-sm font-medium text-gray-700 mb-2">Current Thumbnail:</p>
                    <img src="{{ Storage::url($galleryItem->video_thumbnail) }}" alt="Video thumbnail"
                        class="max-w-xs rounded-lg border border-gray-300">
                </div>
            @endif

            <div id="video-thumbnail-preview" class="mt-3 hidden">
                <p class="text-sm font-medium text-gray-700 mb-2">New Preview:</p>
                <img src="" alt="Preview" class="max-w-xs rounded-lg border border-gray-300">
            </div>
        </div>
    </div>
</div>

{{-- Single Image Fields (Interior/Exterior) --}}
<div id="single-image-fields" class="mb-8 hidden">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Image Upload
    </h3>

    <div>
        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
            Image
        </label>
        <input type="file" name="image" id="image" accept="image/*"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror"
            onchange="previewImage(event, 'single-image-preview')">
        <p class="text-xs text-gray-500 mt-1">Accepted formats: JPEG, PNG, JPG, WEBP (Max: 5MB)</p>
        @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        @if (isset($galleryItem) && $galleryItem->image)
            <div class="mt-3">
                <p class="text-sm font-medium text-gray-700 mb-2">Current Image:</p>
                <img src="{{ Storage::url($galleryItem->image) }}" alt="{{ $galleryItem->title }}"
                    class="max-w-xs rounded-lg border border-gray-300">
            </div>
        @endif

        <div id="single-image-preview" class="mt-3 hidden">
            <p class="text-sm font-medium text-gray-700 mb-2">New Preview:</p>
            <img src="" alt="Preview" class="max-w-xs rounded-lg border border-gray-300">
        </div>
    </div>
</div>

{{-- Before & After Fields --}}
<div id="before-after-fields" class="mb-8 hidden">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
        </svg>
        Before & After Images
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Before Image --}}
        <div>
            <label for="before_image" class="block text-sm font-medium text-gray-700 mb-2">
                Before Image
            </label>
            <input type="file" name="before_image" id="before_image" accept="image/*"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('before_image') border-red-500 @enderror"
                onchange="previewImage(event, 'before-image-preview')">
            <p class="text-xs text-gray-500 mt-1">Max: 5MB</p>
            @error('before_image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if (isset($galleryItem) && $galleryItem->before_image)
                <div class="mt-3">
                    <p class="text-sm font-medium text-gray-700 mb-2">Current Before:</p>
                    <img src="{{ Storage::url($galleryItem->before_image) }}" alt="Before"
                        class="w-full rounded-lg border border-gray-300">
                </div>
            @endif

            <div id="before-image-preview" class="mt-3 hidden">
                <p class="text-sm font-medium text-gray-700 mb-2">New Preview:</p>
                <img src="" alt="Preview" class="w-full rounded-lg border border-gray-300">
            </div>
        </div>

        {{-- After Image --}}
        <div>
            <label for="after_image" class="block text-sm font-medium text-gray-700 mb-2">
                After Image
            </label>
            <input type="file" name="after_image" id="after_image" accept="image/*"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('after_image') border-red-500 @enderror"
                onchange="previewImage(event, 'after-image-preview')">
            <p class="text-xs text-gray-500 mt-1">Max: 5MB</p>
            @error('after_image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if (isset($galleryItem) && $galleryItem->after_image)
                <div class="mt-3">
                    <p class="text-sm font-medium text-gray-700 mb-2">Current After:</p>
                    <img src="{{ Storage::url($galleryItem->after_image) }}" alt="After"
                        class="w-full rounded-lg border border-gray-300">
                </div>
            @endif

            <div id="after-image-preview" class="mt-3 hidden">
                <p class="text-sm font-medium text-gray-700 mb-2">New Preview:</p>
                <img src="" alt="Preview" class="w-full rounded-lg border border-gray-300">
            </div>
        </div>
    </div>
</div>

{{-- Status --}}
<div class="mb-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        Status
    </h3>

    <label class="flex items-center cursor-pointer">
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $galleryItem->is_active ?? true) ? 'checked' : '' }}
            class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
        <div>
            <span class="text-sm font-medium text-gray-700">Active</span>
            <p class="text-xs text-gray-500">Make this gallery item visible on the website</p>
        </div>
    </label>
</div>

<script>
    // Toggle fields based on selected type
    function toggleTypeFields() {
        const selectedType = document.querySelector('input[name="type"]:checked')?.value;
        const videoFields = document.getElementById('video-fields');
        const singleImageFields = document.getElementById('single-image-fields');
        const beforeAfterFields = document.getElementById('before-after-fields');

        // Hide all fields first
        videoFields.classList.add('hidden');
        singleImageFields.classList.add('hidden');
        beforeAfterFields.classList.add('hidden');

        // Show relevant fields based on type
        if (selectedType === 'video') {
            videoFields.classList.remove('hidden');
        } else if (selectedType === 'interior' || selectedType === 'exterior') {
            singleImageFields.classList.remove('hidden');
        } else if (selectedType === 'before&after') {
            beforeAfterFields.classList.remove('hidden');
        }

        // Update border colors for selected type
        document.querySelectorAll('input[name="type"]').forEach(input => {
            const label = input.closest('label');
            label.classList.remove('border-purple-500', 'bg-purple-50', 'border-blue-500', 'bg-blue-50',
                'border-green-500', 'bg-green-50', 'border-orange-500', 'bg-orange-50');
            label.classList.add('border-gray-300');

            const svg = label.querySelector('svg');
            svg.classList.remove('text-purple-600', 'text-blue-600', 'text-green-600', 'text-orange-600');
            svg.classList.add('text-gray-400');
        });

        const selectedLabel = document.querySelector('input[name="type"]:checked')?.closest('label');
        if (selectedLabel) {
            selectedLabel.classList.remove('border-gray-300');
            const svg = selectedLabel.querySelector('svg');
            svg.classList.remove('text-gray-400');

            if (selectedType === 'video') {
                selectedLabel.classList.add('border-purple-500', 'bg-purple-50');
                svg.classList.add('text-purple-600');
            } else if (selectedType === 'interior') {
                selectedLabel.classList.add('border-blue-500', 'bg-blue-50');
                svg.classList.add('text-blue-600');
            } else if (selectedType === 'exterior') {
                selectedLabel.classList.add('border-green-500', 'bg-green-50');
                svg.classList.add('text-green-600');
            } else if (selectedType === 'before&after') {
                selectedLabel.classList.add('border-orange-500', 'bg-orange-50');
                svg.classList.add('text-orange-600');
            }
        }
    }

    // Preview uploaded image
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewDiv = document.getElementById(previewId);
                const previewImg = previewDiv.querySelector('img');
                previewImg.src = e.target.result;
                previewDiv.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleTypeFields();
    });
</script>
