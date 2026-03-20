<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto h-screen flex flex-col items-center justify-center">
        @forelse ($chirps as $chirp)
            <x-chirp :chirp="$chirp" />
        @empty
            <div class="py-12">
                <div class="text-center">
                    <div class="mt-4 text-base-content/60">
                        No chirps yet. Be the first to chirp!.
                    </div>
                </div>
            </div>
            
        @endempty
    </div>
</x-layout>