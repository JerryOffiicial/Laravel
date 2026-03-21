<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-2xl mx-auto min-h-screen flex flex-col items-center pt-24 px-4">

        <!-- Chirp Form -->
        <div class="w-full mb-6">
            <form method="POST" action="/chirps" class="bg-white shadow rounded-2xl p-4 space-y-3">
                @csrf 
                <textarea
                    name="message" 
                    rows="4"
                    maxlength="255"
                    placeholder="What's on your mind?"
                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring focus:ring-gray-300 resize-none @error('message') textarea-error @enderror"
                    required
                    
                >{{old('message')}}</textarea>

                @error('message')
                    <div class="label">
                        <span>{{$message}}</span>
                    </div>
                @enderror

                <div class="flex justify-end">
                    <button 
                        type="submit"
                        class="bg-black text-white px-4 py-2 rounded-xl hover:bg-gray-800 transition"
                    >
                        Chirp
                    </button>
                </div>

            </form>
        </div>

        <!-- Chirps List -->
        <div class="space-y-4 w-full">
            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="py-12">
                    <div class="text-center">
                        <div class="mt-4 text-gray-500">
                            No chirps yet. Be the first to chirp!
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</x-layout>