<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of hero sections
     */
    public function index(string $locale)
    {
        $heroSections = HeroSection::orderBy('page_name', 'asc')->get();
        return view('admin.hero-sections.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new hero section
     */
    public function create(string $locale)
    {
        return view('admin.hero-sections.create');
    }

    /**
     * Store a newly created hero section
     */
    public function store(string $locale,Request $request)
    {
        $validated = $request->validate([
            'page_identifier' => 'required|string|max:255|unique:hero_sections,page_identifier',
            'page_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'media_type' => 'required|in:image,video',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'background_video' => 'nullable|string|max:500',
            'background_color' => 'nullable|string|max:50',
            'show_social_icons' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate page identifier from page name if not provided
        if (empty($validated['page_identifier'])) {
            $validated['page_identifier'] = Str::slug($validated['page_name']);
        }

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $request->file('background_image')->store('hero-sections', 'public');
        }

        $validated['show_social_icons'] = $request->has('show_social_icons');
        $validated['is_active'] = $request->has('is_active');

        HeroSection::create($validated);

        return redirect()->route('admin.hero-sections.index',['locale' => $locale])
            ->with('success', 'Hero section created successfully!');
    }

    /**
     * Show the form for editing the specified hero section
     */
    public function edit(string $locale,HeroSection $heroSection)
    {
        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    /**
     * Update the specified hero section
     */
    public function update(string $locale,Request $request, HeroSection $heroSection)
    {
        $validated = $request->validate([
            'page_identifier' => 'required|string|max:255|unique:hero_sections,page_identifier,' . $heroSection->id,
            'page_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'media_type' => 'required|in:image,video',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'background_video' => 'nullable|string|max:500',
            'background_color' => 'nullable|string|max:50',
            'show_social_icons' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            // Delete old image if exists and not an asset
            if ($heroSection->background_image && !str_starts_with($heroSection->background_image, 'assets/')) {
                Storage::disk('public')->delete($heroSection->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('hero-sections', 'public');
        }

        $validated['show_social_icons'] = $request->has('show_social_icons');
        $validated['is_active'] = $request->has('is_active');

        $heroSection->update($validated);

        return redirect()->route('admin.hero-sections.index',['locale' => $locale])
            ->with('success', 'Hero section updated successfully!');
    }

    /**
     * Remove the specified hero section
     */
    public function destroy(string $locale,HeroSection $heroSection)
    {
        // Delete associated image if exists and not an asset
        if ($heroSection->background_image && !str_starts_with($heroSection->background_image, 'assets/')) {
            Storage::disk('public')->delete($heroSection->background_image);
        }

        $heroSection->delete();

        return redirect()->route('admin.hero-sections.index',['locale' => $locale])
            ->with('success', 'Hero section deleted successfully!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(string $locale,HeroSection $heroSection)
    {
        $heroSection->update(['is_active' => !$heroSection->is_active]);

            return redirect()->route('admin.hero-sections.index',['locale' => $locale])
            ->with('success', 'Hero section status updated successfully!');
    }
}
