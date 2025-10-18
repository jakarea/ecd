<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    public function index()
    {
        $nlTranslations = json_decode(File::get(lang_path('nl.json')), true);
        $enTranslations = json_decode(File::get(lang_path('en.json')), true);

        return view('admin.translations.index', compact('nlTranslations', 'enTranslations'));
    }

    public function update(Request $request)
    {
        $nlTranslations = $request->input('nl');
        $enTranslations = $request->input('en');

        File::put(lang_path('nl.json'), json_encode($nlTranslations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        File::put(lang_path('en.json'), json_encode($enTranslations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return back()->with('success', 'Translations updated successfully.');
    }
}
