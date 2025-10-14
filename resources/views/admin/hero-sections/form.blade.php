{{-- Page Information --}}
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
        </svg>
        Page Information
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Page Identifier --}}
        <div>
            <label for="page_identifier" class="block text-sm font-medium text-gray-700 mb-2">
                Page Identifier <span class="text-red-500">*</span>
            </label>
            <input type="text" name="page_identifier" id="page_identifier"
                value="{{ old('page_identifier', $heroSection->page_identifier ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('page_identifier') border-red-500 @enderror"
                placeholder="e.g., home, about, services" required>
            <p class="text-xs text-gray-500 mt-1">Unique identifier for this page (used in code)</p>
            @error('page_identifier')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Page Name --}}
        <div>
            <label for="page_name" class="block text-sm font-medium text-gray-700 mb-2">
                Page Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="page_name" id="page_name"
                value="{{ old('page_name', $heroSection->page_name ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('page_name') border-red-500 @enderror"
                placeholder="e.g., Home Page, About Us" required>
            <p class="text-xs text-gray-500 mt-1">Display name for this page</p>
            @error('page_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

{{-- Hero Content --}}
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        Hero Content
    </h3>

    <div class="space-y-6">
        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                Hero Title <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title" id="title"
                value="{{ old('title', $heroSection->title ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                placeholder="Enter hero title" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Subtitle --}}
        <div>
            <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                Subtitle (Optional)
            </label>
            <input type="text" name="subtitle" id="subtitle"
                value="{{ old('subtitle', $heroSection->subtitle ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('subtitle') border-red-500 @enderror"
                placeholder="Enter subtitle">
            @error('subtitle')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

{{-- Background Settings --}}
<div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Background Settings
    </h3>

    {{-- Media Type --}}
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-3">
            Background Type <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-6">
            <label class="flex items-center cursor-pointer">
                <input type="radio" name="media_type" value="image"
                    {{ old('media_type', $heroSection->media_type ?? 'image') === 'image' ? 'checked' : '' }}
                    class="mr-2 focus:ring-blue-500" onchange="toggleMediaFields()">
                <span class="text-gray-700">Image</span>
            </label>
            <label class="flex items-center cursor-pointer">
                <input type="radio" name="media_type" value="video"
                    {{ old('media_type', $heroSection->media_type ?? 'image') === 'video' ? 'checked' : '' }}
                    class="mr-2 focus:ring-blue-500" onchange="toggleMediaFields()">
                <span class="text-gray-700">Video</span>
            </label>
        </div>
    </div>

    {{-- Background Image --}}
    <div id="image-field" class="mb-6">
        <label for="background_image" class="block text-sm font-medium text-gray-700 mb-2">
            Background Image
        </label>
        <input type="file" name="background_image" id="background_image" accept="image/jpeg,image/png,image/jpg,image/webp"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('background_image') border-red-500 @enderror"
            onchange="previewImage(event)">
        <p class="text-xs text-gray-500 mt-1">Accepted formats: JPEG, PNG, JPG, WEBP (Max: 2MB)</p>
        @error('background_image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        {{-- Current Image Preview --}}
        @if(isset($heroSection) && $heroSection->background_image)
            <div class="mt-3">
                <p class="text-sm font-medium text-gray-700 mb-2">Current Image:</p>
                <img id="current-image"
                    src="{{ str_starts_with($heroSection->background_image, 'assets/') ? asset($heroSection->background_image) : Storage::url($heroSection->background_image) }}"
                    alt="Current background"
                    class="max-w-xs rounded-lg border border-gray-300">
            </div>
        @endif

        {{-- New Image Preview --}}
        <div id="image-preview" class="mt-3 hidden">
            <p class="text-sm font-medium text-gray-700 mb-2">New Image Preview:</p>
            <img id="preview-img" src="" alt="Preview" class="max-w-xs rounded-lg border border-gray-300">
        </div>
    </div>

    {{-- Background Video --}}
    <div id="video-field" class="mb-6 hidden">
        <label for="background_video" class="block text-sm font-medium text-gray-700 mb-2">
            Background Video URL
        </label>
        <input type="url" name="background_video" id="background_video"
            value="{{ old('background_video', $heroSection->background_video ?? '') }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('background_video') border-red-500 @enderror"
            placeholder="https://www.youtube.com/embed/VIDEO_ID or https://player.vimeo.com/video/VIDEO_ID">
        <p class="text-xs text-gray-500 mt-1">Enter YouTube or Vimeo embed URL</p>
        @error('background_video')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Background Color --}}
    <div>
        <label for="background_color" class="block text-sm font-medium text-gray-700 mb-2">
            Background Color
        </label>
        <input type="text" name="background_color" id="background_color"
            value="{{ old('background_color', $heroSection->background_color ?? 'bg-transparent') }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('background_color') border-red-500 @enderror"
            placeholder="e.g., bg-gray-900, #000000">
        <p class="text-xs text-gray-500 mt-1">Tailwind CSS class or hex color code</p>
        @error('background_color')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Display Options --}}
<div class="mb-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        Display Options
    </h3>

    <div class="space-y-4">
        {{-- Show Social Icons --}}
        <label class="flex items-center cursor-pointer">
            <input type="checkbox" name="show_social_icons" value="1"
                {{ old('show_social_icons', $heroSection->show_social_icons ?? true) ? 'checked' : '' }}
                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <div>
                <span class="text-sm font-medium text-gray-700">Show Social Icons</span>
                <p class="text-xs text-gray-500">Display social media icons in the hero section</p>
            </div>
        </label>

        {{-- Is Active --}}
        <label class="flex items-center cursor-pointer">
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', $heroSection->is_active ?? true) ? 'checked' : '' }}
                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <div>
                <span class="text-sm font-medium text-gray-700">Active</span>
                <p class="text-xs text-gray-500">Make this hero section active and visible</p>
            </div>
        </label>
    </div>
</div>

<script>
    // Toggle between image and video fields based on media type
    function toggleMediaFields() {
        const mediaType = document.querySelector('input[name="media_type"]:checked').value;
        const imageField = document.getElementById('image-field');
        const videoField = document.getElementById('video-field');

        if (mediaType === 'image') {
            imageField.classList.remove('hidden');
            videoField.classList.add('hidden');
        } else {
            imageField.classList.add('hidden');
            videoField.classList.remove('hidden');
        }
    }

    // Preview uploaded image
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewDiv = document.getElementById('image-preview');
                const previewImg = document.getElementById('preview-img');
                previewImg.src = e.target.result;
                previewDiv.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleMediaFields();
    });
</script>
