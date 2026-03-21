<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="max-w-md mx-auto pt-24 px-4">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Create Account
        </h1>

        <div class="w-full">
            <form method="POST" action="/register" class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 space-y-5">
                @csrf

                {{-- Name --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="Jerry"
                        value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('name') border-red-500 @enderror"
                        required
                    >
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="jerry@gmail.com"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('email') border-red-500 @enderror"
                        required
                    >
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="********"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 @error('password') border-red-500 @enderror"
                        required
                    >
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        placeholder="********"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400"
                        required
                    >
                </div>

                {{-- Submit --}}
                <button 
                    type="submit" 
                    class="w-full bg-black text-white py-2 rounded-lg text-sm hover:bg-gray-800 transition"
                >
                    Register
                </button>

                <div class="text-center text-xs text-gray-400">
                    OR
                </div>

                <p class="text-sm text-center text-gray-600">
                    Already have an account?
                    <a href="/login" class="text-black font-medium hover:underline">
                        Sign in
                    </a>
                </p>

            </form>
        </div>
    </div>
</x-layout>