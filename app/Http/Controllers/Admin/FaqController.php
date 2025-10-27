<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends BaseAdminController
{
    public function index(string $locale,Request $request)
    {
        $locale = $this->setLocale($request);
        
        $faqs = Faq::ordered()->paginate(15);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(string $locale,Request $request)
    {
        $this->setLocale($request);
        
        return view('admin.faqs.create');
    }

    public function store(string $locale,Request $request)
    {
        $locale = $this->setLocale($request);
        
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Faq::create($validated);

        return redirect()->route('admin.faqs.index', ['locale' => $locale])
            ->with('success', 'FAQ created successfully!');
    }

    public function edit(string $locale,Request $request, Faq $faq)
    {
        $this->setLocale($request);
        
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(string $locale,Request $request, Faq $faq)
    {
        $locale = $this->setLocale($request);
        
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $faq->update($validated);

        return redirect()->route('admin.faqs.index', ['locale' => $locale])
            ->with('success', 'FAQ updated successfully!');
    }

    public function destroy(string $locale,Request $request, Faq $faq)
    {
        $locale = $this->setLocale($request);
        
        $faq->delete();

        return redirect()->route('admin.faqs.index', ['locale' => $locale])
            ->with('success', 'FAQ deleted successfully!');
    }

    public function toggle(string $locale, Request $request, Faq $faq)
    {
        $locale = $this->setLocale($request);
        
        $faq->update(['is_active' => !$faq->is_active]);

        return redirect()->route('admin.faqs.index', ['locale' => $locale])
            ->with('success', 'FAQ status updated successfully!');
    }
}
