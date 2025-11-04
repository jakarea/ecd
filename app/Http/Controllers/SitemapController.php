<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\GalleryItem;

class SitemapController extends Controller
{
    /**
     * Generate main sitemap index
     */
    public function index()
    {
        $sitemaps = [
            ['loc' => url('/sitemap-nl.xml'), 'lastmod' => now()->toAtomString()],
            ['loc' => url('/sitemap-en.xml'), 'lastmod' => now()->toAtomString()],
        ];

        $xml = $this->generateSitemapIndex($sitemaps);

        return response($xml, 200)
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Generate Dutch sitemap
     */
    public function dutch()
    {
        $urls = [
            // Static pages
            ['loc' => url('/nl'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => url('/nl/about'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => url('/nl/services-subscriptions'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => url('/nl/gallery'), 'priority' => '0.8', 'changefreq' => 'daily'],
            ['loc' => url('/nl/contact'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => url('/nl/blog'), 'priority' => '0.7', 'changefreq' => 'weekly'],
        ];

        // Add gallery items (optional)
        $galleryItems = GalleryItem::active()->get();
        foreach ($galleryItems as $item) {
            if ($item->image || $item->before_image) {
                $urls[] = [
                    'loc' => url('/nl/gallery#item-' . $item->id),
                    'priority' => '0.6',
                    'changefreq' => 'weekly',
                    'lastmod' => $item->updated_at->toAtomString()
                ];
            }
        }

        $xml = $this->generateUrlSet($urls);

        return response($xml, 200)
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Generate English sitemap
     */
    public function english()
    {
        $urls = [
            // Static pages
            ['loc' => url('/en'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => url('/en/about'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => url('/en/services-subscriptions'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => url('/en/gallery'), 'priority' => '0.8', 'changefreq' => 'daily'],
            ['loc' => url('/en/contact'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => url('/en/blog'), 'priority' => '0.7', 'changefreq' => 'weekly'],
        ];

        // Add gallery items (optional)
        $galleryItems = GalleryItem::active()->get();
        foreach ($galleryItems as $item) {
            if ($item->image || $item->before_image) {
                $urls[] = [
                    'loc' => url('/en/gallery#item-' . $item->id),
                    'priority' => '0.6',
                    'changefreq' => 'weekly',
                    'lastmod' => $item->updated_at->toAtomString()
                ];
            }
        }

        $xml = $this->generateUrlSet($urls);

        return response($xml, 200)
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Generate sitemap index XML
     */
    private function generateSitemapIndex($sitemaps)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($sitemaps as $sitemap) {
            $xml .= '  <sitemap>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($sitemap['loc']) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $sitemap['lastmod'] . '</lastmod>' . PHP_EOL;
            $xml .= '  </sitemap>' . PHP_EOL;
        }

        $xml .= '</sitemapindex>';

        return $xml;
    }

    /**
     * Generate sitemap urlset XML
     */
    private function generateUrlSet($urls)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" ';
        $xml .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml">' . PHP_EOL;

        foreach ($urls as $url) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . PHP_EOL;

            if (isset($url['lastmod'])) {
                $xml .= '    <lastmod>' . $url['lastmod'] . '</lastmod>' . PHP_EOL;
            }

            if (isset($url['changefreq'])) {
                $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . PHP_EOL;
            }

            if (isset($url['priority'])) {
                $xml .= '    <priority>' . $url['priority'] . '</priority>' . PHP_EOL;
            }

            // Add alternate language links (hreflang)
            if (strpos($url['loc'], '/nl') !== false) {
                $enUrl = str_replace('/nl', '/en', $url['loc']);
                $xml .= '    <xhtml:link rel="alternate" hreflang="en" href="' . $enUrl . '" />' . PHP_EOL;
                $xml .= '    <xhtml:link rel="alternate" hreflang="nl" href="' . $url['loc'] . '" />' . PHP_EOL;
            } elseif (strpos($url['loc'], '/en') !== false) {
                $nlUrl = str_replace('/en', '/nl', $url['loc']);
                $xml .= '    <xhtml:link rel="alternate" hreflang="nl" href="' . $nlUrl . '" />' . PHP_EOL;
                $xml .= '    <xhtml:link rel="alternate" hreflang="en" href="' . $url['loc'] . '" />' . PHP_EOL;
            }

            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
