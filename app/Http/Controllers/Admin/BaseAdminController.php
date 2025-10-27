<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseAdminController extends Controller
{
    protected function setLocale(Request $request): string
    {
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'nl'])) {
            app()->setLocale($locale);
            return $locale;
        }
        return 'nl'; // default locale
    }
}
