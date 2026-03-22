<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="min-h-[calc(100vh-5rem)] flex items-center justify-center px-4">
        
        <div class="w-full max-w-md bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            
            <h1 class="text-xl font-semibold text-center text-gray-800 mb-6">
                Welcome Back
            </h1>

            <form method="POST" action="/login" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">
                        Email
                    </label>
                    <input 
                        type="email"
                        name="email"
                        placeholder="mail@example.com"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('email') border-red-500 @enderror"
                        required
                        autofocus
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">
                        Password
                    </label>
                    <input 
                        type="password"
                        name="password"
                        placeholder="********"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('password') border-red-500 @enderror"
                        required
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2">
                    <input 
                        type="checkbox"
                        name="remember"
                        class="w-4 h-4 border-gray-300 rounded"
                    >
                    <span class="text-sm text-gray-600">
                        Remember me
                    </span>
                </div>

                <!-- Submit -->
                <button 
                    type="submit" 
                    class="w-full bg-black text-white py-2 rounded-lg text-sm hover:bg-gray-800 transition"
                >
                    Sign In
                </button>

                <div class="text-center text-xs text-gray-400">
                    OR
                </div>

                <p class="text-sm text-center text-gray-600">
                    Don’t have an account?
                    <a href="/register" class="text-black font-medium hover:underline">
                        Register
                    </a>
                </p>

            </form>
        </div>
    </div>
</x-layout>