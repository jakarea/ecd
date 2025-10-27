<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{
    public function index(string $locale)
    {
        $galleryItems = GalleryItem::ordered()->paginate(20);
        return view('admin.gallery.index', compact('galleryItems'));
    }

    public function create(string $locale)
    {
        return view('admin.gallery.create');
    }

    public function store(string $locale,Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:video,interior,exterior,before&after',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video_url' => 'nullable|string|max:500',
            'video_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle image uploads
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        if ($request->hasFile('before_image')) {
            $validated['before_image'] = $request->file('before_image')->store('gallery/before-after', 'public');
        }

        if ($request->hasFile('after_image')) {
            $validated['after_image'] = $request->file('after_image')->store('gallery/before-after', 'public');
        }

        if ($request->hasFile('video_thumbnail')) {
            $validated['video_thumbnail'] = $request->file('video_thumbnail')->store('gallery/video-thumbnails', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        GalleryItem::create($validated);

        return redirect()->route('admin.gallery.index',['locale' => $locale])->with('success', 'Gallery item created successfully.');
    }

    public function edit(string $locale, GalleryItem $galleryItem)
    {
        return view('admin.gallery.edit', compact('galleryItem'));
    }

    public function update(string $locale,Request $request, GalleryItem $galleryItem)
    {
        $validated = $request->validate([
            'type' => 'required|in:video,interior,exterior,before&after',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video_url' => 'nullable|string|max:500',
            'video_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle image uploads and delete old ones
        if ($request->hasFile('image')) {
            if ($galleryItem->image) {
                Storage::disk('public')->delete($galleryItem->image);
            }
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        if ($request->hasFile('before_image')) {
            if ($galleryItem->before_image) {
                Storage::disk('public')->delete($galleryItem->before_image);
            }
            $validated['before_image'] = $request->file('before_image')->store('gallery/before-after', 'public');
        }

        if ($request->hasFile('after_image')) {
            if ($galleryItem->after_image) {
                Storage::disk('public')->delete($galleryItem->after_image);
            }
            $validated['after_image'] = $request->file('after_image')->store('gallery/before-after', 'public');
        }

        if ($request->hasFile('video_thumbnail')) {
            if ($galleryItem->video_thumbnail) {
                Storage::disk('public')->delete($galleryItem->video_thumbnail);
            }
            $validated['video_thumbnail'] = $request->file('video_thumbnail')->store('gallery/video-thumbnails', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $galleryItem->update($validated);

        return redirect()->route('admin.gallery.index',['locale' => $locale])->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(string $locale,GalleryItem $galleryItem)
    {
        // Delete associated images
        if ($galleryItem->image) {
            Storage::disk('public')->delete($galleryItem->image);
        }
        if ($galleryItem->before_image) {
            Storage::disk('public')->delete($galleryItem->before_image);
        }
        if ($galleryItem->after_image) {
            Storage::disk('public')->delete($galleryItem->after_image);
        }
        if ($galleryItem->video_thumbnail) {
            Storage::disk('public')->delete($galleryItem->video_thumbnail);
        }

        $galleryItem->delete();

        return redirect()->route('admin.gallery.index',['locale' => $locale])->with('success', 'Gallery item deleted successfully.');
    }
}
