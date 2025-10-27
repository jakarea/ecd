<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index(string $locale)
    {
        $teamMembers = TeamMember::ordered()->paginate(15);
        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create(string $locale)
    {
        return view('admin.team-members.create');
    }

    public function store(string $locale,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('team-members', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index',['locale' => $locale])
            ->with('success', 'Team member created successfully!');
    }

    public function edit(string $locale,TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(string $locale,Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle image upload and delete old one
        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $validated['image'] = $request->file('image')->store('team-members', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index',['locale' => $locale])
            ->with('success', 'Team member updated successfully!');
    }

    public function destroy(string $locale,TeamMember $teamMember)
    {
        // Delete associated image
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index',['locale' => $locale])
            ->with('success', 'Team member deleted successfully!');
    }

    public function toggle(string $locale,TeamMember $teamMember)
    {
        $teamMember->update(['is_active' => !$teamMember->is_active]);

        return redirect()->route('admin.team-members.index',['locale' => $locale])
            ->with('success', 'Team member status updated successfully!');
    }
}
