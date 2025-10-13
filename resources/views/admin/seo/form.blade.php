{{-- Tab Navigation --}}
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="border-b border-gray-200">
        <nav class="flex flex-wrap -mb-px gap-2">
            <button type="button" onclick="switchTab('basic')" data-tab-btn="basic"
                class="px-4 py-3 text-sm font-medium border-b-2 border-[var(--color-brand)] text-[var(--color-brand)] transition-colors">
                Basic SEO
            </button>
            <button type="button" onclick="switchTab('social')" data-tab-btn="social"
                class="px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors">
                Social Media
            </button>
            <button type="button" onclick="switchTab('advanced')" data-tab-btn="advanced"
                class="px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors">
                Advanced
            </button>
            <button type="button" onclick="switchTab('settings')" data-tab-btn="settings"
                class="px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors">
                Settings
            </button>
        </nav>
    </div>
</div>

{{-- Basic SEO Tab checked--}}
<div data-tab="basic" class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic SEO Information</h3>

    <div class="space-y-4">
        {{-- Page Identification --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="page_url" class="block text-sm font-medium text-gray-700 mb-1">
                    Page URL <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        {{ url('/') }}
                    </span>
                    <input type="text" name="page_url" id="page_url" value="{{ old('page_url', $seo ? $seo->page_url : '/') }}"
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('page_url') border-red-500 @enderror"
                        placeholder="about" required>
                </div>
                @error('page_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Example: / for homepage, /about, /contact</p>
            </div>

            <div>
                <label for="page_name" class="block text-sm font-medium text-gray-700 mb-1">
                    Page Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="page_name" id="page_name" value="{{ old('page_name', $seo ? $seo->page_name : '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('page_name') border-red-500 @enderror"
                    placeholder="About Us" required>
                @error('page_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Display name for admin panel</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="page_type" class="block text-sm font-medium text-gray-700 mb-1">
                    Page Type <span class="text-red-500">*</span>
                </label>
                <select name="page_type" id="page_type"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('page_type') border-red-500 @enderror" required>
                    <option value="home" {{ old('page_type', $seo ? $seo->page_type : '') === 'home' ? 'selected' : '' }}>Home Page</option>
                    <option value="page" {{ old('page_type', $seo ? $seo->page_type : 'page') === 'page' ? 'selected' : '' }}>Regular Page</option>
                    <option value="blog" {{ old('page_type', $seo ? $seo->page_type : '') === 'blog' ? 'selected' : '' }}>Blog Post</option>
                    <option value="custom" {{ old('page_type', $seo ? $seo->page_type : '') === 'custom' ? 'selected' : '' }}>Custom</option>
                </select>
                @error('page_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="focus_keyword" class="block text-sm font-medium text-gray-700 mb-1">
                    Focus Keyword
                </label>
                <input type="text" name="focus_keyword" id="focus_keyword" value="{{ old('focus_keyword', $seo ? $seo->focus_keyword : '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('focus_keyword') border-red-500 @enderror"
                    placeholder="car detailing">
                @error('focus_keyword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Primary keyword for this page</p>
            </div>
        </div>

        {{-- Meta Title --}}
        <div>
            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">
                Meta Title
                <span class="text-xs font-normal text-gray-500 ml-2">(50-60 characters recommended)</span>
            </label>
            <input type="text" name="meta_title" id="meta_title" maxlength="60" value="{{ old('meta_title', $seo ? $seo->meta_title : '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('meta_title') border-red-500 @enderror"
                placeholder="Premium Car Detailing Services - ECD">
            <div class="flex justify-between mt-1">
                <div>
                    @error('meta_title')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @if(!$errors->has('meta_title'))
                        <p class="text-xs text-gray-500">The title that appears in search results</p>
                    @endif
                </div>
                <span id="meta_title_count" class="text-xs font-medium">0/60</span>
            </div>
        </div>

        {{-- Meta Description --}}
        <div>
            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">
                Meta Description
                <span class="text-xs font-normal text-gray-500 ml-2">(150-160 characters recommended)</span>
            </label>
            <textarea name="meta_description" id="meta_description" rows="3" maxlength="500"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('meta_description') border-red-500 @enderror"
                placeholder="Professional mobile car detailing services delivered to your door. Premium packages, expert care, and satisfaction guaranteed.">{{ old('meta_description', $seo ? $seo->meta_description : '') }}</textarea>
            <div class="flex justify-between mt-1">
                <div>
                    @error('meta_description')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @if(!$errors->has('meta_description'))
                        <p class="text-xs text-gray-500">The description that appears in search results</p>
                    @endif
                </div>
                <span id="meta_description_count" class="text-xs font-medium">0/500</span>
            </div>
        </div>

        {{-- Meta Keywords --}}
        <div>
            <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-1">
                Meta Keywords
            </label>
            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $seo ? $seo->meta_keywords : '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('meta_keywords') border-red-500 @enderror"
                placeholder="car detailing, mobile car wash, premium detailing">
            @error('meta_keywords')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @if(!$errors->has('meta_keywords'))
                <p class="mt-1 text-xs text-gray-500">Comma-separated keywords (optional, less important for modern SEO)</p>
            @endif
        </div>

        {{-- Canonical URL --}}
        <div>
            <label for="canonical_url" class="block text-sm font-medium text-gray-700 mb-1">
                Canonical URL
            </label>
            <input type="url" name="canonical_url" id="canonical_url" value="{{ old('canonical_url', $seo ? $seo->canonical_url : '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('canonical_url') border-red-500 @enderror"
                placeholder="{{ url('/') }}">
            @error('canonical_url')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @if(!$errors->has('canonical_url'))
                <p class="mt-1 text-xs text-gray-500">Prevent duplicate content issues</p>
            @endif
        </div>
    </div>

    <div class="flex justify-end mt-6">
        <button type="button" onclick="switchTab('social')"
            class="px-6 py-2.5 bg-[var(--color-brand)] text-white rounded-md font-medium hover:opacity-90 transition-all">
            Next: Social Media
        </button>
    </div>
</div>

{{-- Social Media Tab --}}
<div data-tab="social" class="hidden bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Social Media & Open Graph</h3>

    <div class="space-y-6">
        {{-- Open Graph (Facebook) --}}
        <div class="border-b border-gray-200 pb-6">
            <h4 class="text-md font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                Facebook / Open Graph Tags
            </h4>

            <div class="space-y-4">
                <div>
                    <label for="og_title" class="block text-sm font-medium text-gray-700 mb-1">
                        OG Title <span class="text-xs font-normal text-gray-500 ml-2">(95 characters max)</span>
                    </label>
                    <input type="text" name="og_title" id="og_title" maxlength="95" value="{{ old('og_title', $seo ? $seo->og_title : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="Premium Car Detailing Services">
                    <div class="flex justify-between mt-1">
                        <p class="text-xs text-gray-500">Title for Facebook shares</p>
                        <span id="og_title_count" class="text-xs font-medium text-gray-500">0/95</span>
                    </div>
                </div>

                <div>
                    <label for="og_description" class="block text-sm font-medium text-gray-700 mb-1">
                        OG Description
                    </label>
                    <textarea name="og_description" id="og_description" rows="2"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="Professional mobile car detailing services delivered to your door.">{{ old('og_description', $seo ? $seo->og_description : '') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Description for Facebook shares</p>
                </div>

                <div>
                    <label for="og_image" class="block text-sm font-medium text-gray-700 mb-1">
                        OG Image URL <span class="text-xs font-normal text-gray-500 ml-2">(1200x630px recommended)</span>
                    </label>
                    <input type="url" name="og_image" id="og_image" value="{{ old('og_image', $seo ? $seo->og_image : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="{{ asset('assets/img/og-image.jpg') }}">
                    <p class="mt-1 text-xs text-gray-500">Image that appears when shared on Facebook</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="og_type" class="block text-sm font-medium text-gray-700 mb-1">
                            OG Type
                        </label>
                        <input type="text" name="og_type" id="og_type" value="{{ old('og_type', $seo ? $seo->og_type : 'website') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                            placeholder="website">
                        <p class="mt-1 text-xs text-gray-500">Usually 'website' or 'article'</p>
                    </div>

                    <div>
                        <label for="og_locale" class="block text-sm font-medium text-gray-700 mb-1">
                            OG Locale
                        </label>
                        <input type="text" name="og_locale" id="og_locale" value="{{ old('og_locale', $seo ? $seo->og_locale : 'en_US') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                            placeholder="en_US">
                        <p class="mt-1 text-xs text-gray-500">Language and region code</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Twitter Card --}}
        <div>
            <h4 class="text-md font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
                Twitter Card Tags
            </h4>

            <div class="space-y-4">
                <div>
                    <label for="twitter_card" class="block text-sm font-medium text-gray-700 mb-1">
                        Twitter Card Type
                    </label>
                    <select name="twitter_card" id="twitter_card"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent">
                        <option value="summary_large_image" {{ old('twitter_card', $seo ? $seo->twitter_card : 'summary_large_image') === 'summary_large_image' ? 'selected' : '' }}>Summary Large Image</option>
                        <option value="summary" {{ old('twitter_card', $seo ? $seo->twitter_card : '') === 'summary' ? 'selected' : '' }}>Summary</option>
                        <option value="app" {{ old('twitter_card', $seo ? $seo->twitter_card : '') === 'app' ? 'selected' : '' }}>App</option>
                        <option value="player" {{ old('twitter_card', $seo ? $seo->twitter_card : '') === 'player' ? 'selected' : '' }}>Player</option>
                    </select>
                    <p class="mt-1 text-xs text-gray-500">Card style for Twitter shares</p>
                </div>

                <div>
                    <label for="twitter_title" class="block text-sm font-medium text-gray-700 mb-1">
                        Twitter Title <span class="text-xs font-normal text-gray-500 ml-2">(70 characters max)</span>
                    </label>
                    <input type="text" name="twitter_title" id="twitter_title" maxlength="70" value="{{ old('twitter_title', $seo ? $seo->twitter_title : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="Premium Car Detailing">
                    <div class="flex justify-between mt-1">
                        <p class="text-xs text-gray-500">Title for Twitter shares</p>
                        <span id="twitter_title_count" class="text-xs font-medium text-gray-500">0/70</span>
                    </div>
                </div>

                <div>
                    <label for="twitter_description" class="block text-sm font-medium text-gray-700 mb-1">
                        Twitter Description
                    </label>
                    <textarea name="twitter_description" id="twitter_description" rows="2"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="Professional mobile car detailing services.">{{ old('twitter_description', $seo ? $seo->twitter_description : '') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Description for Twitter shares</p>
                </div>

                <div>
                    <label for="twitter_image" class="block text-sm font-medium text-gray-700 mb-1">
                        Twitter Image URL <span class="text-xs font-normal text-gray-500 ml-2">(1200x600px recommended)</span>
                    </label>
                    <input type="url" name="twitter_image" id="twitter_image" value="{{ old('twitter_image', $seo ? $seo->twitter_image : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="{{ asset('assets/img/twitter-image.jpg') }}">
                    <p class="mt-1 text-xs text-gray-500">Image for Twitter shares</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="twitter_site" class="block text-sm font-medium text-gray-700 mb-1">
                            Twitter Site
                        </label>
                        <input type="text" name="twitter_site" id="twitter_site" value="{{ old('twitter_site', $seo ? $seo->twitter_site : '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                            placeholder="@ecddetailing">
                        <p class="mt-1 text-xs text-gray-500">@username of your website</p>
                    </div>

                    <div>
                        <label for="twitter_creator" class="block text-sm font-medium text-gray-700 mb-1">
                            Twitter Creator
                        </label>
                        <input type="text" name="twitter_creator" id="twitter_creator" value="{{ old('twitter_creator', $seo ? $seo->twitter_creator : '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                            placeholder="@author">
                        <p class="mt-1 text-xs text-gray-500">@username of content creator</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between mt-6">
        <button type="button" onclick="switchTab('basic')"
            class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-md font-medium hover:bg-gray-300 transition-all">
            Previous: Basic SEO
        </button>
        <button type="button" onclick="switchTab('advanced')"
            class="px-6 py-2.5 bg-[var(--color-brand)] text-white rounded-md font-medium hover:opacity-90 transition-all">
            Next: Advanced
        </button>
    </div>
</div>

{{-- Advanced Tab --}}
<div data-tab="advanced" class="hidden bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Advanced SEO Settings</h3>

    <div class="space-y-4">
        {{-- Schema Markup --}}
        <div>
            <label for="schema_markup" class="block text-sm font-medium text-gray-700 mb-1">
                Schema Markup (JSON-LD)
            </label>
            <textarea name="schema_markup" id="schema_markup" rows="8"
                class="w-full px-3 py-2 border border-gray-300 rounded-md font-mono text-sm focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent @error('schema_markup') border-red-500 @enderror"
                placeholder='{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "ECD",
  "url": "{{ url('/') }}"
}'>{{ old('schema_markup', $seo ? $seo->schema_markup : '') }}</textarea>
            @error('schema_markup')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @if(!$errors->has('schema_markup'))
                <p class="mt-1 text-xs text-gray-500">JSON-LD structured data for rich snippets</p>
            @endif
        </div>

        {{-- Robots Meta --}}
        <div class="border-t border-gray-200 pt-4">
            <h4 class="text-sm font-semibold text-gray-800 mb-3">Robots Meta Tags</h4>

            <div class="space-y-3">
                <div class="flex items-center">
                    <input type="checkbox" name="index" id="index" value="1"
                        {{ old('index', $seo ? $seo->index : true) ? 'checked' : '' }}
                        class="w-4 h-4 text-[var(--color-brand)] border-gray-300 rounded focus:ring-[var(--color-brand)]">
                    <label for="index" class="ml-2 text-sm text-gray-700">
                        <span class="font-medium">Index</span> - Allow search engines to index this page
                    </label>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="follow" id="follow" value="1"
                        {{ old('follow', $seo ? $seo->follow : true) ? 'checked' : '' }}
                        class="w-4 h-4 text-[var(--color-brand)] border-gray-300 rounded focus:ring-[var(--color-brand)]">
                    <label for="follow" class="ml-2 text-sm text-gray-700">
                        <span class="font-medium">Follow</span> - Allow search engines to follow links on this page
                    </label>
                </div>
            </div>

            <div class="mt-4">
                <label for="robots" class="block text-sm font-medium text-gray-700 mb-1">
                    Custom Robots Meta
                </label>
                <input type="text" name="robots" id="robots" value="{{ old('robots', $seo ? $seo->robots : '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                    placeholder="noindex, nofollow">
                <p class="mt-1 text-xs text-gray-500">Override index/follow settings with custom robots meta (optional)</p>
            </div>
        </div>

        {{-- Author & Publisher --}}
        <div class="border-t border-gray-200 pt-4">
            <h4 class="text-sm font-semibold text-gray-800 mb-3">Content Attribution</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700 mb-1">
                        Author
                    </label>
                    <input type="text" name="author" id="author" value="{{ old('author', $seo ? $seo->author : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="John Doe">
                    <p class="mt-1 text-xs text-gray-500">Content author name</p>
                </div>

                <div>
                    <label for="publisher" class="block text-sm font-medium text-gray-700 mb-1">
                        Publisher
                    </label>
                    <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $seo ? $seo->publisher : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                        placeholder="ECD">
                    <p class="mt-1 text-xs text-gray-500">Content publisher name</p>
                </div>
            </div>
        </div>

        {{-- Dates --}}
        <div class="border-t border-gray-200 pt-4">
            <h4 class="text-sm font-semibold text-gray-800 mb-3">Publication Dates</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">
                        Published Date
                    </label>
                    <input type="datetime-local" name="published_at" id="published_at"
                        value="{{ old('published_at', $seo && $seo->published_at ? $seo->published_at->format('Y-m-d\TH:i') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">When content was first published</p>
                </div>

                <div>
                    <label for="modified_at" class="block text-sm font-medium text-gray-700 mb-1">
                        Modified Date
                    </label>
                    <input type="datetime-local" name="modified_at" id="modified_at"
                        value="{{ old('modified_at', $seo && $seo->modified_at ? $seo->modified_at->format('Y-m-d\TH:i') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Last modification date</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between mt-6">
        <button type="button" onclick="switchTab('social')"
            class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-md font-medium hover:bg-gray-300 transition-all">
            Previous: Social Media
        </button>
        <button type="button" onclick="switchTab('settings')"
            class="px-6 py-2.5 bg-[var(--color-brand)] text-white rounded-md font-medium hover:opacity-90 transition-all">
            Next: Settings
        </button>
    </div>
</div>

{{-- Settings Tab --}}
<div data-tab="settings" class="hidden bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Page Settings</h3>

    <div class="space-y-4">
        {{-- Status --}}
        <div class="flex items-center">
            <input type="checkbox" name="is_active" id="is_active" value="1"
                {{ old('is_active', $seo ? $seo->is_active : true) ? 'checked' : '' }}
                class="w-4 h-4 text-[var(--color-brand)] border-gray-300 rounded focus:ring-[var(--color-brand)]">
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">
                Enable SEO for this page
            </label>
        </div>

        {{-- Priority --}}
        <div>
            <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">
                Priority
            </label>
            <input type="number" name="priority" id="priority" min="0" max="100" value="{{ old('priority', $seo ? $seo->priority : 0) }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                placeholder="0">
            <p class="mt-1 text-xs text-gray-500">Higher priority pages appear first in lists (0-100)</p>
        </div>

        {{-- Notes --}}
        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">
                Internal Notes
            </label>
            <textarea name="notes" id="notes" rows="4"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[var(--color-brand)] focus:border-transparent"
                placeholder="Add any internal notes or reminders for this page...">{{ old('notes', $seo ? $seo->notes : '') }}</textarea>
            <p class="mt-1 text-xs text-gray-500">These notes are only visible to admins</p>
        </div>
    </div>

    <div class="flex justify-between mt-6">
        <button type="button" onclick="switchTab('advanced')"
            class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-md font-medium hover:bg-gray-300 transition-all">
            Previous: Advanced
        </button>
        <button type="submit"
            class="px-6 py-2.5 bg-green-600 text-white rounded-md font-medium hover:bg-green-700 transition-all flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            {{ $submitText }}
        </button>
    </div>
</div>
