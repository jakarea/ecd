<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 9; // Initial load

        $query = GalleryItem::active()->ordered();

        // Filter by type if specified
        if ($request->has('type') && $request->type !== 'all') {
            $query->ofType($request->type);
        }

        $galleryItems = $query->paginate($perPage);

        // If it's an AJAX request, return JSON for infinite scroll
        if ($request->ajax()) {
            return response()->json([
                'items' => view('partials.gallery-items', ['galleryItems' => $galleryItems])->render(),
                'has_more' => $galleryItems->hasMorePages(),
                'next_page' => $galleryItems->currentPage() + 1,
            ]);
        }

        return view('gallery', compact('galleryItems'));
    }
}
