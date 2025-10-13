# SEO Module Documentation - RankMath Style System

## Overview
This is a professional, RankMath-style SEO module built for the ECD Laravel application. It provides comprehensive SEO management for all pages with automatic meta tag injection, score calculation, and Open Graph/Twitter Card support.

---

## Database Architecture

### Table: `seo_meta`

#### Page Identification Fields
| Field | Type | Description |
|-------|------|-------------|
| `page_url` | string (unique) | URL path (e.g., `/`, `/about`, `/contact`) |
| `page_name` | string | Display name for admin panel |
| `page_type` | enum | Type: home, page, blog, custom |

#### Basic SEO Meta Tags
| Field | Type | Recommended | Description |
|-------|------|-------------|-------------|
| `meta_title` | string(60) | 50-60 chars | Page title tag |
| `meta_description` | text | 150-160 chars | Meta description |
| `meta_keywords` | string | - | Comma-separated keywords |
| `canonical_url` | string | - | Canonical URL |

#### Open Graph (Facebook) Tags
| Field | Type | Recommended | Description |
|-------|------|-------------|-------------|
| `og_title` | string(95) | 95 chars | OG title |
| `og_description` | text | - | OG description |
| `og_image` | string | 1200x630px | OG image URL |
| `og_type` | string | - | Default: website |
| `og_locale` | string | - | Default: en_US |

#### Twitter Card Tags
| Field | Type | Recommended | Description |
|-------|------|-------------|-------------|
| `twitter_card` | enum | - | summary_large_image, summary, app, player |
| `twitter_title` | string(70) | 70 chars | Twitter title |
| `twitter_description` | text | - | Twitter description |
| `twitter_image` | string | 1200x600px | Twitter image URL |
| `twitter_site` | string | - | @username of website |
| `twitter_creator` | string | - | @username of content creator |

#### Robots & Indexing
| Field | Type | Description |
|-------|------|-------------|
| `index` | boolean | Allow indexing (default: true) |
| `follow` | boolean | Allow following links (default: true) |
| `robots` | string | Custom robots meta |

#### Advanced SEO
| Field | Type | Description |
|-------|------|-------------|
| `schema_markup` | text | JSON-LD structured data |
| `focus_keyword` | string | Primary focus keyword |
| `seo_score` | integer (0-100) | Auto-calculated SEO score |

#### Additional Meta
| Field | Type | Description |
|-------|------|-------------|
| `author` | string | Content author |
| `publisher` | string | Content publisher |
| `published_at` | timestamp | Publication date |
| `modified_at` | timestamp | Last modification date |

#### Status & Management
| Field | Type | Description |
|-------|------|-------------|
| `is_active` | boolean | Enable/disable SEO for this page |
| `priority` | integer | Display priority in lists |
| `notes` | text | Internal notes for admins |

---

## SEO Score Calculation (0-100)

The system automatically calculates an SEO score based on:

### Scoring Breakdown:
- **Meta Title** (20 points)
  - Perfect (50-60 chars): 20 points
  - Good (30-70 chars): 15 points
  - Present: 10 points

- **Meta Description** (20 points)
  - Perfect (150-160 chars): 20 points
  - Good (120-180 chars): 15 points
  - Present: 10 points

- **Focus Keyword** (15 points)
  - Present: 15 points

- **Canonical URL** (10 points)
  - Present: 10 points

- **Open Graph Tags** (15 points)
  - Title + Description: 10 points
  - Image: 5 points

- **Twitter Card** (10 points)
  - Title + Description: 10 points

- **Schema Markup** (10 points)
  - Present: 10 points

### Score Labels:
- **80-100**: Excellent (Green)
- **60-79**: Good (Yellow)
- **40-59**: Average (Orange)
- **0-39**: Poor (Red)

---

## Model: `SeoMeta`

### Location
`app/Models/SeoMeta.php`

### Key Methods

#### `calculateSeoScore(): int`
Calculates SEO score based on all SEO factors

#### `updateSeoScore(): void`
Recalculates and saves the SEO score

#### `getRobotsMetaAttribute(): string`
Returns robots meta content (index/noindex, follow/nofollow)

#### `getScoreColorAttribute(): string`
Returns color for score badge (green, yellow, orange, red)

#### `getScoreLabelAttribute(): string`
Returns score label (Excellent, Good, Average, Poor)

### Query Scopes

```php
// Get active SEO meta
SeoMeta::active()->get();

// Get SEO by URL
SeoMeta::byUrl('/about')->first();

// Get SEO by type
SeoMeta::byType('blog')->get();
```

---

## Usage Examples

### 1. Create SEO for a Page

```php
$seo = SeoMeta::create([
    'page_url' => '/about',
    'page_name' => 'About Us',
    'page_type' => 'page',
    'meta_title' => 'About ECD - Premium Car Detailing Services',
    'meta_description' => 'Learn about ECD, your trusted mobile car detailing service. Professional care delivered to your door with premium packages and expert service.',
    'focus_keyword' => 'car detailing services',
    'og_title' => 'About ECD - Premium Mobile Car Detailing',
    'og_description' => 'ECD provides premium mobile car detailing services with expert care.',
    'og_image' => asset('assets/img/og-about.jpg'),
    'twitter_card' => 'summary_large_image',
    'twitter_title' => 'About ECD - Premium Car Detailing',
    'twitter_description' => 'Learn about our premium mobile car detailing services',
    'twitter_site' => '@ecddetailing',
    'canonical_url' => url('/about'),
]);

// Calculate and update SEO score
$seo->updateSeoScore();
```

### 2. Get SEO for Current Page

```php
$currentUrl = request()->path() === '/' ? '/' : '/' . request()->path();
$seo = SeoMeta::active()->byUrl($currentUrl)->first();

if ($seo) {
    // Use SEO data
    $title = $seo->meta_title;
    $description = $seo->meta_description;
}
```

### 3. Update SEO Score

```php
$seo = SeoMeta::find(1);
$seo->updateSeoScore(); // Automatically calculates and saves
```

---

## Frontend Integration

### Meta Tags Output Example

```html
<!-- Basic Meta Tags -->
<title>{{ $seo->meta_title ?? config('app.name') }}</title>
<meta name="description" content="{{ $seo->meta_description ?? '' }}">
<meta name="keywords" content="{{ $seo->meta_keywords ?? '' }}">
<link rel="canonical" href="{{ $seo->canonical_url ?? url()->current() }}">

<!-- Robots -->
<meta name="robots" content="{{ $seo->robots_meta }}">

<!-- Open Graph -->
<meta property="og:title" content="{{ $seo->og_title ?? $seo->meta_title }}">
<meta property="og:description" content="{{ $seo->og_description ?? $seo->meta_description }}">
<meta property="og:image" content="{{ $seo->og_image ?? '' }}">
<meta property="og:type" content="{{ $seo->og_type }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:locale" content="{{ $seo->og_locale }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="{{ $seo->twitter_card }}">
<meta name="twitter:title" content="{{ $seo->twitter_title ?? $seo->meta_title }}">
<meta name="twitter:description" content="{{ $seo->twitter_description ?? $seo->meta_description }}">
<meta name="twitter:image" content="{{ $seo->twitter_image ?? $seo->og_image }}">
<meta name="twitter:site" content="{{ $seo->twitter_site ?? '' }}">
<meta name="twitter:creator" content="{{ $seo->twitter_creator ?? '' }}">

<!-- Schema Markup -->
@if($seo->schema_markup)
<script type="application/ld+json">
{!! $seo->schema_markup !!}
</script>
@endif
```

---

## Admin Panel Features

### Pages to Build:

1. **SEO List Page** (`/admin/seo`)
   - List all pages with SEO
   - Show SEO scores with colors
   - Quick edit actions
   - Filter by type, score, status

2. **Create SEO** (`/admin/seo/create`)
   - Form to create new SEO entry
   - Real-time character counter
   - Score preview
   - Image uploader for OG/Twitter images

3. **Edit SEO** (`/admin/seo/{id}/edit`)
   - Full SEO editor
   - Tabs: Basic, Social, Advanced
   - Live SEO score calculator
   - Preview feature

4. **Bulk Actions**
   - Bulk enable/disable
   - Bulk score recalculation
   - Export to CSV

---

## Best Practices

### Meta Title
- ✅ Keep 50-60 characters
- ✅ Include focus keyword
- ✅ Make it compelling
- ✅ Unique for each page
- ❌ Don't keyword stuff

### Meta Description
- ✅ Keep 150-160 characters
- ✅ Include focus keyword naturally
- ✅ Write compelling copy
- ✅ Include call-to-action
- ❌ Don't duplicate titles

### Open Graph Images
- ✅ Use 1200x630px (Facebook)
- ✅ Keep text visible
- ✅ Use high quality images
- ✅ Include branding

### Twitter Images
- ✅ Use 1200x600px
- ✅ 2:1 aspect ratio
- ✅ Test on mobile

### Schema Markup
- ✅ Use Organization schema for home
- ✅ Use LocalBusiness for contact
- ✅ Use BreadcrumbList for navigation
- ✅ Use Review schema when applicable

---

## Migration Commands

```bash
# Run migration
php artisan migrate

# Rollback
php artisan migrate:rollback

# Fresh migration
php artisan migrate:fresh
```

---

## Next Steps

1. ✅ Migration created
2. ✅ Model created with methods
3. ⏳ Create Admin Controller
4. ⏳ Create Admin Routes
5. ⏳ Create Admin Views (List, Create, Edit)
6. ⏳ Create SEO Service Class
7. ⏳ Create Middleware for Meta Injection
8. ⏳ Update Frontend Layout
9. ⏳ Create Seeder for Default Pages

---

## Support & Maintenance

### Regular Tasks
- [ ] Monitor SEO scores monthly
- [ ] Update images seasonally
- [ ] Review keyword performance
- [ ] Check broken canonical URLs
- [ ] Validate schema markup
- [ ] Test social sharing

### Tools to Integrate
- Google Search Console
- Google Analytics
- Facebook Debugger
- Twitter Card Validator
- Schema.org Validator

---

**Last Updated**: {{ now()->format('Y-m-d') }}
**Version**: 1.0.0
**Author**: 7 Years SEO Expert Implementation
