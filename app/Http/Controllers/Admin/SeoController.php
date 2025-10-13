<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeoController extends Controller
{
    /**
     * Display a listing of SEO pages
     */
    public function index(Request $request)
    {
        $query = SeoMeta::query();

        // Filter by page type
        if ($request->filled('type')) {
            $query->byType($request->type);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Filter by SEO score
        if ($request->filled('score')) {
            switch ($request->score) {
                case 'excellent':
                    $query->where('seo_score', '>=', 80);
                    break;
                case 'good':
                    $query->whereBetween('seo_score', [60, 79]);
                    break;
                case 'average':
                    $query->whereBetween('seo_score', [40, 59]);
                    break;
                case 'poor':
                    $query->where('seo_score', '<', 40);
                    break;
            }
        }

        // Search by page name or URL
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('page_name', 'like', "%{$search}%")
                    ->orWhere('page_url', 'like', "%{$search}%");
            });
        }

        $seoPages = $query->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.seo.index', compact('seoPages'));
    }

    /**
     * Show the form for creating a new SEO entry
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created SEO entry in storage
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_url' => 'required|string|unique:seo_meta,page_url',
            'page_name' => 'required|string|max:255',
            'page_type' => 'required|in:home,page,blog,custom',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|url',
            'og_title' => 'nullable|string|max:95',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|url',
            'og_type' => 'nullable|string',
            'og_locale' => 'nullable|string',
            'twitter_card' => 'nullable|in:summary,summary_large_image,app,player',
            'twitter_title' => 'nullable|string|max:70',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|url',
            'twitter_site' => 'nullable|string',
            'twitter_creator' => 'nullable|string',
            'index' => 'nullable|boolean',
            'follow' => 'nullable|boolean',
            'robots' => 'nullable|string',
            'schema_markup' => 'nullable|json',
            'focus_keyword' => 'nullable|string',
            'author' => 'nullable|string',
            'publisher' => 'nullable|string',
            'published_at' => 'nullable|date',
            'modified_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'priority' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Set defaults
        $data['index'] = $request->has('index') ? true : false;
        $data['follow'] = $request->has('follow') ? true : false;
        $data['is_active'] = $request->has('is_active') ? true : false;

        // Ensure page_url starts with /
        if (!str_starts_with($data['page_url'], '/')) {
            $data['page_url'] = '/' . $data['page_url'];
        }

        $seo = SeoMeta::create($data);

        // Calculate and update SEO score
        $seo->updateSeoScore();

        return redirect()->route('admin.seo.index')
            ->with('success', 'SEO entry created successfully! SEO Score: ' . $seo->seo_score . '/100');
    }

    /**
     * Display the specified SEO entry
     */
    public function show(SeoMeta $seo)
    {
        return view('admin.seo.show', compact('seo'));
    }

    /**
     * Show the form for editing the specified SEO entry
     */
    public function edit(SeoMeta $seo)
    {
        return view('admin.seo.edit', compact('seo'));
    }

    /**
     * Update the specified SEO entry in storage
     */
    public function update(Request $request, SeoMeta $seo)
    {
        $validator = Validator::make($request->all(), [
            'page_url' => 'required|string|unique:seo_meta,page_url,' . $seo->id,
            'page_name' => 'required|string|max:255',
            'page_type' => 'required|in:home,page,blog,custom',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|url',
            'og_title' => 'nullable|string|max:95',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|url',
            'og_type' => 'nullable|string',
            'og_locale' => 'nullable|string',
            'twitter_card' => 'nullable|in:summary,summary_large_image,app,player',
            'twitter_title' => 'nullable|string|max:70',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|url',
            'twitter_site' => 'nullable|string',
            'twitter_creator' => 'nullable|string',
            'index' => 'nullable|boolean',
            'follow' => 'nullable|boolean',
            'robots' => 'nullable|string',
            'schema_markup' => 'nullable|json',
            'focus_keyword' => 'nullable|string',
            'author' => 'nullable|string',
            'publisher' => 'nullable|string',
            'published_at' => 'nullable|date',
            'modified_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'priority' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Set defaults
        $data['index'] = $request->has('index') ? true : false;
        $data['follow'] = $request->has('follow') ? true : false;
        $data['is_active'] = $request->has('is_active') ? true : false;

        // Ensure page_url starts with /
        if (!str_starts_with($data['page_url'], '/')) {
            $data['page_url'] = '/' . $data['page_url'];
        }

        $seo->update($data);

        // Recalculate SEO score
        $seo->updateSeoScore();

        return redirect()->route('admin.seo.index')
            ->with('success', 'SEO entry updated successfully! SEO Score: ' . $seo->seo_score . '/100');
    }

    /**
     * Remove the specified SEO entry from storage (soft delete)
     */
    public function destroy(SeoMeta $seo)
    {
        $seo->delete();

        return redirect()->route('admin.seo.index')
            ->with('success', 'SEO entry deleted successfully.');
    }

    /**
     * Bulk recalculate SEO scores
     */
    public function recalculateScores()
    {
        $seoPages = SeoMeta::all();

        foreach ($seoPages as $seo) {
            $seo->updateSeoScore();
        }

        return redirect()->route('admin.seo.index')
            ->with('success', 'SEO scores recalculated for ' . $seoPages->count() . ' pages.');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(SeoMeta $seo)
    {
        $seo->update(['is_active' => !$seo->is_active]);

        $status = $seo->is_active ? 'activated' : 'deactivated';
        return redirect()->back()
            ->with('success', "SEO for '{$seo->page_name}' has been {$status}.");
    }
}
