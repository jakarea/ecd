{{-- Name Field --}}
<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
        required>
    @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Email Field --}}
<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
        required>
    @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Password Field --}}
<div class="mb-4">
    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
        Password {{ isset($user) ? '(leave blank to keep current)' : '*' }}
    </label>
    <input type="password" name="password" id="password"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
        {{ isset($user) ? '' : 'required' }}>
    @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    <p class="text-gray-500 text-xs mt-1">Minimum 8 characters</p>
</div>

{{-- Password Confirmation Field --}}
<div class="mb-4">
    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
        Confirm Password {{ isset($user) ? '' : '*' }}
    </label>
    <input type="password" name="password_confirmation" id="password_confirmation"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        {{ isset($user) ? '' : 'required' }}>
</div>
