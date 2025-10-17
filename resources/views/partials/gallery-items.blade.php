@foreach ($galleryItems as $item)

    <div class="masonry-item" data-category="{{ $item->type }}" data-item-id="{{ $item->id }}">
        @if ($item->isBeforeAfter())
            {{-- {{ $item->before_image }} --}}
            {{-- Before & After slider --}}
            <div class="slider-container relative w-full h-full overflow-hidden rounded-[15px]">
                @if ($item->before_image)

                    <img src="{{ Storage::url($item->before_image) }}" alt="Before - {{ $item->title ?? 'Gallery Item' }}"
                        class="before-image absolute inset-0 w-full h-full object-cover" />
                @endif
                @if ($item->after_image)
                    <img src="{{ Storage::url($item->after_image) }}" alt="After - {{ $item->title ?? 'Gallery Item' }}"
                        class="after-image absolute inset-0 w-full h-full object-cover" />
                @endif
                <div class="slider-line absolute top-0 bottom-0 w-[2px] bg-[var(--color-brand)] left-1/2"></div>
                <div
                    class="slider-handle absolute top-1/2 left-1/2 w-[55px] h-[55px] bg-[var(--color-brand)] border-2 border-[var(--color-brand)] rounded-full cursor-pointer transform -translate-x-1/2 -translate-y-1/2 shadow-md flex justify-center items-center gap-1.5">

                    <svg width="12" height="9" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.50072 10.2778L1.06348 5.84053L5.50072 1.40329" stroke="white" stroke-width="1.11598"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.06348 5.84039L12.7684 5.84039" stroke="white" stroke-width="1.11598" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <svg width="2" height="10" viewBox="0 0 2 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="0.782561" y1="0.910613" x2="0.782561" y2="10.0397" stroke="white" stroke-width="1.01434"
                            stroke-linecap="round" />
                    </svg>

                    <svg width="12" height="9" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.05006 10.278L12.4873 5.84071L8.05006 1.40347" stroke="white" stroke-width="1.11598"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.4873 5.84058L0.782391 5.84058" stroke="white" stroke-width="1.11598" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </div>
            </div>
        @elseif ($item->isVideo())
            {{-- Video thumbnail with play button --}}
            <div class="relative w-full h-full rounded-[15px] overflow-hidden group cursor-pointer video-item"
                data-video-url="{{ $item->getVideoEmbedUrl() }}">
                @if ($item->video_thumbnail)
                    <img src="{{ Storage::url($item->video_thumbnail) }}" alt="{{ $item->title ?? 'Video Thumbnail' }}"
                        class="w-full h-full object-cover" />
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center min-h-[300px]">
                        <svg class="w-20 h-20 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                        </svg>
                    </div>
                @endif
                {{-- Play button overlay --}}
                <div
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center group-hover:bg-opacity-50 transition-all">
                    <div class="w-16 h-16 bg-[var(--color-brand)] rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                        </svg>
                    </div>
                </div>
                @if ($item->title)
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                        <p class="text-white font-medium">{{ $item->title }}</p>
                    </div>
                @endif
            </div>
        @else
            {{-- Normal image (Interior/Exterior) --}}
            @if ($item->image)
                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title ?? 'Gallery Image' }}"
                    class="w-full h-full object-cover rounded-[15px]" />
            @else
                <div class="w-full h-full bg-gray-200 rounded-[15px] flex items-center justify-center min-h-[300px]">
                    <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
        @endif
    </div>
@endforeach