<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ECD</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8 bg-gradient-to-br from-[#6adbd9] to-[#124846]">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-[480px] p-6 sm:p-8 lg:p-10">
        {{-- Logo Section --}}
        <div class="text-center mb-6 sm:mb-8">
            <div class="flex justify-center mb-4 sm:mb-6">
                <img src="{{ asset(\App\Models\Setting::get('logo', 'assets/img/color-logo.png')) }}" alt="ECD Logo" class="h-14 sm:h-16 lg:h-20 w-auto">
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Admin Login</h1>
            <p class="text-gray-600 text-sm sm:text-base">Enter your credentials to access the admin panel</p>
        </div>

        {{-- Login Form --}}
        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block font-medium text-gray-700 mb-2 text-sm sm:text-base">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-3 sm:py-3.5 border border-gray-300 rounded-lg text-sm sm:text-base transition-all duration-200 focus:outline-none focus:border-[var(--color-brand)] focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-opacity-20"
                    value="{{ old('email') }}" required autofocus placeholder="admin@example.com">
                @error('email')
                    <p class="text-red-500 text-xs sm:text-sm mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block font-medium text-gray-700 mb-2 text-sm sm:text-base">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-3 sm:py-3.5 border border-gray-300 rounded-lg text-sm sm:text-base transition-all duration-200 focus:outline-none focus:border-[var(--color-brand)] focus:ring-2 focus:ring-[var(--color-brand)] focus:ring-opacity-20"
                    required placeholder="Enter your password">
                @error('password')
                    <p class="text-red-500 text-xs sm:text-sm mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-2 sm:gap-2.5">
                <input type="checkbox" id="remember" name="remember"
                    class="w-4 h-4 sm:w-5 sm:h-5 cursor-pointer text-[var(--color-brand)] border-gray-300 rounded focus:ring-[var(--color-brand)]">
                <label for="remember" class="text-sm sm:text-base text-gray-700 cursor-pointer select-none">Remember me</label>
            </div>

            <button type="submit"
                class="w-full py-3 sm:py-4 bg-[var(--color-brand)] text-white font-semibold text-base sm:text-lg rounded-lg transition-all duration-200 hover:opacity-90 hover:shadow-lg active:scale-[0.98]">
                Sign In
            </button>
        </form>

        {{-- Back Link --}}
        <div class="text-center mt-6 sm:mt-8">
            <a href="{{ route('home') }}"
                class="text-[var(--color-brand)] text-sm sm:text-base font-medium hover:underline inline-flex items-center gap-1.5 transition-all duration-200">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Website
            </a>
        </div>
    </div>
</body>

</html>
