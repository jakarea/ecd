<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials
     */
    public function index(string $locale)
    {
        $testimonials = Testimonial::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial
     */
    public function create(string $locale)
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created testimonial
     */
    public function store(string $locale,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'review' => 'required|string',
            'vehicle_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle vehicle image upload
        if ($request->hasFile('vehicle_image')) {
            $validated['vehicle_image'] = $request->file('vehicle_image')->store('testimonials/vehicles', 'public');
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('testimonials/profiles', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index',['locale' => $locale])
            ->with('success', 'Testimonial created successfully!');
    }

    /**
     * Show the form for editing the specified testimonial
     */
    public function edit(string $locale,Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial
     */
    public function update(string $locale,Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'review' => 'required|string',
            'vehicle_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle vehicle image upload
        if ($request->hasFile('vehicle_image')) {
            // Delete old image if exists
            if ($testimonial->vehicle_image) {
                Storage::disk('public')->delete($testimonial->vehicle_image);
            }
            $validated['vehicle_image'] = $request->file('vehicle_image')->store('testimonials/vehicles', 'public');
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($testimonial->profile_image) {
                Storage::disk('public')->delete($testimonial->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('testimonials/profiles', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index',['locale' => $locale])
            ->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified testimonial
     */
    public function destroy(string $locale,Testimonial $testimonial)
    {
        // Delete associated images
        if ($testimonial->vehicle_image) {
            Storage::disk('public')->delete($testimonial->vehicle_image);
        }
        if ($testimonial->profile_image) {
            Storage::disk('public')->delete($testimonial->profile_image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index',['locale' => $locale])
            ->with('success', 'Testimonial deleted successfully!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(string $locale,Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);

            return redirect()->route('admin.testimonials.index',['locale' => $locale])
            ->with('success', 'Testimonial status updated successfully!');
    }
}
