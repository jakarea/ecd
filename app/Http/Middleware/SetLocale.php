<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locales = ['en', 'nl'];
        $firstSegment = $request->segment(1);
        $secondSegment = $request->segment(2);

        // If URL doesn't start with a locale
        if (!in_array($firstSegment, $locales)) {
            $defaultLocale = config('app.locale', 'nl');
            $path = $request->path(); // e.g. 'about', 'contact'

            // Redirect root "/" to /{defaultLocale}
            if ($path === '/') {
                return redirect("/{$defaultLocale}");
            }

            // Redirect any other path to /{defaultLocale}/{path}
            return redirect("/{$defaultLocale}/{$path}");
        }

        // Set application locale
        App::setLocale($firstSegment);

        return $next($request);
    }
}
