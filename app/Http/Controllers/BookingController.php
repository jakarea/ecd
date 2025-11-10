<?php

namespace App\Http\Controllers;

use App\Mail\BookingNotification;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Verify reCAPTCHA (if configured)
        $recaptchaSecret = config('services.recaptcha.secret_key');
        $recaptchaResponse = $request->input('g-recaptcha-response');

        if ($recaptchaSecret && $recaptchaResponse) {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $recaptchaSecret,
                'response' => $recaptchaResponse,
                'remoteip' => $request->ip()
            ]);

            $result = $response->json();

            if (!$result['success'] || $result['score'] < 0.5) {
                if ($request->expectsJson()) {
                    return response()->json(['message' => 'Security verification failed. Please try again.'], 422);
                }
                return back()->with('error', 'Security verification failed. Please try again.');
            }
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'number_of_cars' => 'required|integer',
            'licence_plate' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'preferred_date' => 'required|date|after:today',
            'package_name' => 'nullable|string|max:255',
            'package_price' => 'nullable|string|max:255',
        ]);

        // Add IP and User Agent for security
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();
        $validated['status'] = 'pending';

        $booking = Booking::create($validated);

        // Send email notification
        try {
            $adminEmail = env('ADMIN_EMAIL', config('mail.from.address'));
            Mail::to($adminEmail)->send(new BookingNotification($booking));
        } catch (\Exception $e) {
            // Log the error but don't fail the booking
            \Log::error('Failed to send booking notification email: ' . $e->getMessage());
        }

        // Return JSON for AJAX requests
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your booking has been submitted successfully! We will contact you soon.'
            ]);
        }

        return back()->with('success', 'Your booking has been submitted successfully! We will contact you soon.');
    }
}
