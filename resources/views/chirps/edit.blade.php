<x-layout>
    <x-slot:title>
        Edit
    </x-slot:title>

    <div class="max-w-2xl mx-auto pt-24 px-4">

        <h1 class="text-2xl font-bold mb-6">Edit Chirp</h1>

        <!-- Chirp Form -->
        <div class="w-full mb-8">
            <form method="POST" action="/chirps/{{ $chirp->id }}" class="bg-white shadow rounded-xl p-4 space-y-4">
                @csrf
                @method('PUT')

                <div class="w-full">
                    <textarea 
                        name="message"
                        rows="4"
                        maxlength="255"
                        required
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-gray-300 resize-none @error('message') border-red-500 @enderror"
                    >{{ old('message', $chirp->message) }}</textarea>

                    @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <a href="/" class="px-4 py-2 text-gray-600 hover:underline">
                        Cancel
                    </a>

                    <button 
                        type="submit" 
                        class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition"
                    >
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layout>