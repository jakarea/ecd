@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="container mx-auto px-4 py-6">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Settings</h1>
            <p class="text-gray-600 mt-1">Manage tracking codes and site configuration</p>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- General Settings --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    General Settings
                </h2>

                <div class="mb-6">
                    <label for="favicon_path" class="block text-sm font-medium text-gray-700 mb-2">
                        Favicon
                    </label>
                    <input type="file" name="favicon_path" id="favicon_path" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('favicon_path') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Upload a .ico, .png, or .svg file for your favicon.</p>
                    @error('favicon_path')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    @if ($generalSettings->get('favicon_path')->value ?? false)
                        <div class="mt-4 flex items-center gap-4">
                            <div>
                                <p class="block text-sm font-medium text-gray-700 mb-2">Current Favicon:</p>
                                <img src="{{ asset($generalSettings->get('favicon_path')->value) }}" alt="Favicon"
                                    class="w-16 h-16 object-contain border border-gray-200 p-2 rounded-md">
                            </div>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="favicon_path_clear" value="1" class="mr-2">
                                <span class="text-sm font-medium text-gray-700">Clear Favicon</span>
                            </label>
                            <input type="hidden" name="existing_favicon_path" value="{{ $generalSettings->get('favicon_path')->value }}">
                        </div>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                        Logo
                    </label>
                    <input type="file" name="logo" id="logo" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('logo') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Upload a .png, .jpg, .jpeg, or .svg file for your logo.</p>
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    @if ($generalSettings->get('logo')->value ?? false)
                        <div class="mt-4 flex items-center gap-4">
                            <div>
                                <p class="block text-sm font-medium text-gray-700 mb-2">Current Logo:</p>
                                <img src="{{ asset($generalSettings->get('logo')->value) }}" alt="Logo"
                                    class="w-32 h-auto object-contain border border-gray-200 p-2 rounded-md">
                            </div>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="logo_clear" value="1" class="mr-2">
                                <span class="text-sm font-medium text-gray-700">Clear Logo</span>
                            </label>
                            <input type="hidden" name="existing_logo" value="{{ $generalSettings->get('logo')->value }}">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Social Media & Contact Settings --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                    Social Media & Contact
                </h2>

                {{-- Contact Information --}}
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex-1 mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Contact Information</h3>
                        <p class="text-sm text-gray-600">Contact details that will be displayed in the footer Quick Connect section.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <input type="text" name="contact_phone" id="contact_phone"
                                value="{{ old('contact_phone', $contactSettings->get('contact_phone')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('contact_phone') border-red-500 @enderror"
                                placeholder="+31 6 39866123">
                            <p class="text-xs text-gray-500 mt-1">Include country code for WhatsApp functionality</p>
                            @error('contact_phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input type="email" name="contact_email" id="contact_email"
                                value="{{ old('contact_email', $contactSettings->get('contact_email')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('contact_email') border-red-500 @enderror"
                                placeholder="support@ecd.com">
                            @error('contact_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="contact_address" class="block text-sm font-medium text-gray-700 mb-2">
                                Address
                            </label>
                            <input type="text" name="contact_address" id="contact_address"
                                value="{{ old('contact_address', $contactSettings->get('contact_address')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('contact_address') border-red-500 @enderror"
                                placeholder="Meander 9016825 MH India">
                            @error('contact_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Social Media Links --}}
                <div class="mb-6">
                    <div class="flex-1 mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Social Media Links</h3>
                        <p class="text-sm text-gray-600">Add your social media profile URLs. Leave blank to hide that icon in the footer.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Facebook --}}
                        <div>
                            <label for="facebook_url" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                    <path d="M8.90825 24.6656V13.6849H12.587L13.1339 9.38562H8.90825V6.64716C8.90825 5.40654 9.25151 4.55713 11.0197 4.55713H13.2603V0.724087C12.1701 0.606444 11.0743 0.549641 9.97795 0.553938C6.72625 0.553938 4.4937 2.55286 4.4937 6.22245V9.37758H0.838867V13.6769H4.50169V24.6656H8.90825Z" fill="currentColor"/>
                                </svg>
                                Facebook URL
                            </label>
                            <input type="url" name="facebook_url" id="facebook_url"
                                value="{{ old('facebook_url', $socialSettings->get('facebook_url')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('facebook_url') border-red-500 @enderror"
                                placeholder="https://facebook.com/yourpage">
                            @error('facebook_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- LinkedIn --}}
                        <div>
                            <label for="linkedin_url" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                    <path d="M3.20305 6.53349C4.76171 6.53349 6.02525 5.26996 6.02525 3.71132C6.02525 2.15269 4.76171 0.88916 3.20305 0.88916C1.6444 0.88916 0.380859 2.15269 0.380859 3.71132C0.380859 5.26996 1.6444 6.53349 3.20305 6.53349Z" fill="currentColor"/>
                                    <path d="M8.68985 8.67113V24.3285H13.5513V16.5856C13.5513 14.5425 13.9357 12.5639 16.4689 12.5639C18.9674 12.5639 18.9983 14.8998 18.9983 16.7146V24.3298H23.8624V15.7433C23.8624 11.5255 22.9543 8.28418 18.0245 8.28418C15.6576 8.28418 14.0711 9.58305 13.4223 10.8123H13.3565V8.67113H8.68985ZM0.767578 8.67113H5.63677V24.3285H0.767578V8.67113Z" fill="currentColor"/>
                                </svg>
                                LinkedIn URL
                            </label>
                            <input type="url" name="linkedin_url" id="linkedin_url"
                                value="{{ old('linkedin_url', $socialSettings->get('linkedin_url')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('linkedin_url') border-red-500 @enderror"
                                placeholder="https://linkedin.com/in/yourprofile">
                            @error('linkedin_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Twitter/X --}}
                        <div>
                            <label for="twitter_url" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48"/></svg>
                                Tiktok URL
                            </label>
                            <input type="url" name="twitter_url" id="twitter_url"
                                value="{{ old('twitter_url', $socialSettings->get('twitter_url')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('twitter_url') border-red-500 @enderror"
                                placeholder="https://tiktok.com/yourhandle">
                            @error('twitter_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Instagram --}}
                        <div>
                            <label for="instagram_url" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.57912 0.939585C8.83112 0.881949 9.23031 0.869141 12.4195 0.869141C15.6088 0.869141 16.008 0.883016 17.2589 0.939585C18.5098 0.996154 19.3637 1.19575 20.1109 1.48499C20.8932 1.78065 21.603 2.2428 22.19 2.84051C22.7878 3.42648 23.2489 4.13519 23.5434 4.91862C23.8338 5.66575 24.0323 6.51962 24.0899 7.76841C24.1476 9.02253 24.1604 9.42171 24.1604 12.6098C24.1604 15.799 24.1465 16.1982 24.0899 17.4502C24.0334 18.699 23.8338 19.5529 23.5434 20.3C23.2489 21.0835 22.787 21.7934 22.19 22.3802C21.603 22.978 20.8932 23.439 20.1109 23.7336C19.3637 24.0239 18.5098 24.2225 17.261 24.2801C16.008 24.3377 15.6088 24.3505 12.4195 24.3505C9.23031 24.3505 8.83112 24.3367 7.57912 24.2801C6.33032 24.2235 5.47644 24.0239 4.7293 23.7336C3.94578 23.439 3.23589 22.9772 2.64904 22.3802C2.05173 21.7939 1.5895 21.0844 1.29457 20.3011C1.00532 19.5539 0.806793 18.7001 0.749156 17.4513C0.691519 16.1972 0.678711 15.798 0.678711 12.6098C0.678711 9.42064 0.692586 9.02146 0.749156 7.77054C0.805725 6.51962 1.00532 5.66575 1.29457 4.91862C1.58993 4.13528 2.05252 3.42575 2.6501 2.83944C3.23612 2.24227 3.9453 1.78005 4.72823 1.48499C5.47537 1.19575 6.32925 0.997221 7.57805 0.939585H7.57912ZM17.1639 3.05291C15.9258 2.99634 15.5543 2.9846 12.4195 2.9846C9.28474 2.9846 8.9133 2.99634 7.67518 3.05291C6.52991 3.10521 5.90872 3.29626 5.49459 3.45743C4.94704 3.6709 4.55532 3.92386 4.14439 4.33478C3.75486 4.71374 3.45508 5.17508 3.26703 5.68496C3.10586 6.09909 2.91481 6.72028 2.86251 7.86553C2.80594 9.10364 2.7942 9.47508 2.7942 12.6098C2.7942 15.7446 2.80594 16.116 2.86251 17.3542C2.91481 18.4994 3.10586 19.1206 3.26703 19.5347C3.45488 20.0438 3.75481 20.506 4.14439 20.8849C4.5233 21.2745 4.98546 21.5744 5.49459 21.7623C5.90872 21.9234 6.52991 22.1145 7.67518 22.1668C8.9133 22.2233 9.28367 22.2351 12.4195 22.2351C15.5554 22.2351 15.9258 22.2233 17.1639 22.1668C18.3092 22.1145 18.9304 21.9234 19.3445 21.7623C19.892 21.5488 20.2838 21.2958 20.6947 20.8849C21.0843 20.506 21.3842 20.0438 21.5721 19.5347C21.7332 19.1206 21.9243 18.4994 21.9766 17.3542C22.0331 16.116 22.0449 15.7446 22.0449 12.6098C22.0449 9.47508 22.0331 9.10364 21.9766 7.86553C21.9243 6.72028 21.7332 6.09909 21.5721 5.68496C21.3586 5.13742 21.1056 4.74571 20.6947 4.33478C20.3157 3.94528 19.8544 3.64551 19.3445 3.45743C18.9304 3.29626 18.3092 3.10521 17.1639 3.05291ZM10.9199 16.2292C11.7574 16.5778 12.69 16.6249 13.5583 16.3623C14.4267 16.0997 15.1769 15.5439 15.6809 14.7896C16.185 14.0353 16.4115 13.1295 16.3218 12.2268C16.2322 11.3241 15.8319 10.4805 15.1893 9.84011C14.7797 9.43076 14.2844 9.11732 13.7391 8.92235C13.1939 8.72739 12.6121 8.65575 12.0358 8.71259C11.4595 8.76943 10.903 8.95334 10.4063 9.25108C9.90963 9.54881 9.48513 9.95297 9.16339 10.4345C8.84164 10.9159 8.63066 11.4628 8.54562 12.0356C8.46058 12.6084 8.5036 13.1929 8.67159 13.7471C8.83958 14.3013 9.12835 14.8113 9.51712 15.2405C9.9059 15.6697 10.385 16.0074 10.9199 16.2292ZM8.15228 8.34263C8.71267 7.78225 9.37794 7.33774 10.1101 7.03446C10.8423 6.73119 11.627 6.5751 12.4195 6.5751C13.212 6.5751 13.9968 6.73119 14.729 7.03446C15.4611 7.33774 16.1264 7.78225 16.6868 8.34263C17.2472 8.90301 17.6917 9.56828 17.995 10.3004C18.2983 11.0326 18.4544 11.8174 18.4544 12.6098C18.4544 13.4023 18.2983 14.1871 17.995 14.9192C17.6917 15.6514 17.2472 16.3167 16.6868 16.8771C15.5551 18.0088 14.0201 18.6446 12.4195 18.6446C10.819 18.6446 9.28403 18.0088 8.15228 16.8771C7.02054 15.7453 6.38473 14.2104 6.38473 12.6098C6.38473 11.0093 7.02054 9.47437 8.15228 8.34263ZM19.7928 7.47382C19.9317 7.34283 20.0428 7.1853 20.1197 7.01057C20.1966 6.83584 20.2377 6.64746 20.2404 6.45657C20.2432 6.26569 20.2077 6.07619 20.1359 5.8993C20.0642 5.7224 19.9576 5.5617 19.8226 5.42671C19.6876 5.29172 19.5269 5.18519 19.35 5.11342C19.1731 5.04166 18.9836 5.00611 18.7928 5.00889C18.6019 5.01168 18.4135 5.05273 18.2388 5.12962C18.064 5.20652 17.9065 5.31769 17.7755 5.45655C17.5207 5.72662 17.3813 6.08535 17.3867 6.45657C17.3921 6.8278 17.542 7.18231 17.8045 7.44484C18.067 7.70736 18.4215 7.85724 18.7928 7.86265C19.164 7.86806 19.5227 7.72858 19.7928 7.47382Z" fill="currentColor"/>
                                </svg>
                                Instagram URL
                            </label>
                            <input type="url" name="instagram_url" id="instagram_url"
                                value="{{ old('instagram_url', $socialSettings->get('instagram_url')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('instagram_url') border-red-500 @enderror"
                                placeholder="https://instagram.com/yourprofile">
                            @error('instagram_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- YouTube --}}
                        <div>
                            <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <svg width="34" height="25" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                    <path d="M0.967224 4.32023C1.1544 3.59088 1.52137 2.92575 2.03143 2.39142C2.54149 1.85708 3.17674 1.47228 3.87359 1.27553C6.43868 0.553711 16.7211 0.553711 16.7211 0.553711C16.7211 0.553711 27.0034 0.553711 29.5685 1.27169C30.2657 1.46781 30.9013 1.85239 31.4114 2.38682C31.9216 2.92126 32.2883 3.58672 32.4749 4.31639C33.1611 7.00401 33.1611 12.6096 33.1611 12.6096C33.1611 12.6096 33.1611 18.2153 32.4749 20.899C32.0969 22.3811 30.9814 23.5483 29.5685 23.9437C27.0034 24.6656 16.7211 24.6656 16.7211 24.6656C16.7211 24.6656 6.43868 24.6656 3.87359 23.9437C2.45711 23.5483 1.3452 22.3811 0.967224 20.899C0.280998 18.2153 0.280998 12.6096 0.280998 12.6096C0.280998 12.6096 0.280998 7.00401 0.967224 4.32023ZM19.9871 17.7545V7.46475L11.4735 12.5712L19.9871 17.7545Z" fill="currentColor"/>
                                </svg>
                                YouTube URL
                            </label>
                            <input type="url" name="youtube_url" id="youtube_url"
                                value="{{ old('youtube_url', $socialSettings->get('youtube_url')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('youtube_url') border-red-500 @enderror"
                                placeholder="https://youtube.com/@yourchannel">
                            @error('youtube_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tracking Settings --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Tracking & Analytics
                </h2>

                {{-- Facebook Pixel --}}
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Facebook Pixel</h3>
                            <p class="text-sm text-gray-600">Track conversions, optimize ads, and build targeted audiences
                                for your advertising campaigns.</p>
                        </div>
                        <label class="flex items-center cursor-pointer ml-4">
                            <input type="checkbox" name="fb_pixel_enabled" value="1"
                                {{ old('fb_pixel_enabled', $trackingSettings->get('fb_pixel_enabled')->value ?? false) ? 'checked' : '' }}
                                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm font-medium text-gray-700">Enable</span>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="fb_pixel_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Facebook Pixel ID
                            </label>
                            <input type="text" name="fb_pixel_id" id="fb_pixel_id"
                                value="{{ old('fb_pixel_id', $trackingSettings->get('fb_pixel_id')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('fb_pixel_id') border-red-500 @enderror"
                                placeholder="123456789012345">
                            <p class="text-xs text-gray-500 mt-1">Find your Pixel ID in Facebook Events Manager</p>
                            @error('fb_pixel_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-medium mb-1">How to find your Facebook Pixel ID:</p>
                                    <ol class="list-decimal list-inside space-y-1 text-xs">
                                        <li>Go to Facebook Events Manager</li>
                                        <li>Select your Pixel</li>
                                        <li>Copy the Pixel ID (15-digit number)</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Google Tag Manager --}}
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Google Tag Manager</h3>
                            <p class="text-sm text-gray-600">Manage all your website tags without editing code. Includes
                                support for Google Analytics, Google Ads, and more.</p>
                        </div>
                        <label class="flex items-center cursor-pointer ml-4">
                            <input type="checkbox" name="gtm_enabled" value="1"
                                {{ old('gtm_enabled', $trackingSettings->get('gtm_enabled')->value ?? false) ? 'checked' : '' }}
                                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm font-medium text-gray-700">Enable</span>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="gtm_id" class="block text-sm font-medium text-gray-700 mb-2">
                                GTM Container ID
                            </label>
                            <input type="text" name="gtm_id" id="gtm_id"
                                value="{{ old('gtm_id', $trackingSettings->get('gtm_id')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('gtm_id') border-red-500 @enderror"
                                placeholder="GTM-XXXXXXX">
                            <p class="text-xs text-gray-500 mt-1">Format: GTM-XXXXXXX</p>
                            @error('gtm_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-medium mb-1">Benefits of Google Tag Manager:</p>
                                    <ul class="list-disc list-inside space-y-1 text-xs">
                                        <li>Manage all tracking codes in one place</li>
                                        <li>Update tags without code deployment</li>
                                        <li>Built-in debugging and preview mode</li>
                                        <li>Version control and rollback capability</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Google Analytics 4 --}}
                <div class="mb-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Google Analytics 4</h3>
                            <p class="text-sm text-gray-600">Track website traffic, user behavior, and conversions with
                                Google's latest analytics platform.</p>
                        </div>
                        <label class="flex items-center cursor-pointer ml-4">
                            <input type="checkbox" name="ga4_enabled" value="1"
                                {{ old('ga4_enabled', $trackingSettings->get('ga4_enabled')->value ?? false) ? 'checked' : '' }}
                                class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm font-medium text-gray-700">Enable</span>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="ga4_measurement_id" class="block text-sm font-medium text-gray-700 mb-2">
                                GA4 Measurement ID
                            </label>
                            <input type="text" name="ga4_measurement_id" id="ga4_measurement_id"
                                value="{{ old('ga4_measurement_id', $trackingSettings->get('ga4_measurement_id')->value ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('ga4_measurement_id') border-red-500 @enderror"
                                placeholder="G-XXXXXXXXXX">
                            <p class="text-xs text-gray-500 mt-1">Format: G-XXXXXXXXXX</p>
                            @error('ga4_measurement_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-yellow-600 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm text-yellow-800">
                                    <p class="font-medium">Note: If you're using Google Tag Manager, you can configure GA4
                                        through GTM instead of adding it here directly.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Save Button --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.dashboard', ['locale' => request()->route('locale') ?? request()->segment(1)]) }}"
                    class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-[var(--color-brand)] text-white rounded-lg hover:opacity-90 transition font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
