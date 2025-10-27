<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query()->recent();

        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search by name or address
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        $bookings = $query->paginate(20);

        // Get counts for status badges
        $pendingCount = Booking::pending()->count();
        $confirmedCount = Booking::confirmed()->count();
        $completedCount = Booking::completed()->count();
        $cancelledCount = Booking::cancelled()->count();

        return view('admin.bookings.index', compact(
            'bookings',
            'pendingCount',
            'confirmedCount',
            'completedCount',
            'cancelledCount'
        ));
    }

    public function create(string $locale)
    {
        return view('admin.bookings.create');
    }

    // NOTE: Argument order is Request, then string $locale.
    public function store(Request $request, string $locale)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'package_name' => 'required|string|max:255',
            'package_price' => 'required|string|max:255',
            'preferred_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        // Add IP and user agent for admin-created bookings
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();

        $booking = Booking::create($validated);

        // FIX 1: Pass 'locale' and 'booking' parameters
        return redirect()->route('admin.bookings.show', [
            'locale' => $locale, // Use $locale from argument
            'booking' => $booking
        ])
            ->with('success', 'Booking created successfully.');
    }

    public function show(string $locale, Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    // NOTE: Corrected parameter order: Request, string $locale, then Model $booking
    public function updateStatus(Request $request, string $locale, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);

        // FIX 2b: Pass 'locale' and 'booking' parameters
        return redirect()->route('admin.bookings.show', [
            'locale' => $locale,
            'booking' => $booking
        ])
            ->with('success', 'Booking status updated successfully.');
    }

    // NOTE: Corrected parameter order
    public function destroy(string $locale, Booking $booking)
    {
        $booking->delete();

        // FIX 3b: Pass 'locale' parameter
        return redirect()->route('admin.bookings.index', ['locale' => $locale])
            ->with('success', 'Booking deleted successfully.');
    }
}
