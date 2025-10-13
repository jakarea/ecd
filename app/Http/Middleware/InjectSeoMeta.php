<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class InjectSeoMeta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current URL path
        $currentPath = $request->path();
        $currentUrl = $currentPath === '/' ? '/' : '/' . $currentPath;

        // Find active SEO meta for this URL
        $seo = SeoMeta::active()->byUrl($currentUrl)->first();

        // Share SEO data with all views
        View::share('seoMeta', $seo);

        return $next($request);
    }
}
