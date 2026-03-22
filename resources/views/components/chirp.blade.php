@props(['chirp'])

<div class="bg-white shadow rounded-2xl p-4 w-full max-w-lg ">
    <div class="flex items-start space-x-3">
        @if ($chirp->user)
            <div class="size-10 rounded-full overflow-hidden">
                <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                    alt="{{ $chirp->user->name }}'s avatar" class="w-full h-full object-cover rounded-full">
            </div>
        @else
            <div class="size-10 rounded-full overflow-hidden">
                <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                    alt="Anonymous User" class="w-full h-full object-cover rounded-full">
            </div>
        @endif

        <div class="bg-gray-100 p-4 rounded-2xl w-full">
            <div class="font-semibold text-gray-800">
                {{ $chirp->user ? $chirp->user->name : 'Anonymous' }}
            </div>

            <div class="mt-1 text-gray-700">
                {{ $chirp->message }}
            </div>

            <div class="text-sm text-gray-500 mt-2 flex gap-3">
                <div>
                    {{ $chirp->created_at?->diffForHumans() }}
                </div>

                <div>
                    @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                        <span class="text-base-content/60">.</span>
                        <span class="text-sm text-base-content/60 italic">edited</span>
                    @endif
                </div>
            </div>

            @can('update', $chirp)
                <div>
                    <div class="mt-2 flex justify-between">
                        <a href="/chirps/{{ $chirp->id }}/edit"
                            class="bg-blue-300 py-1.5 px-2.5 rounded-lg hover:bg-green-300">
                            Edit
                        </a>

                        <form method="POST" action="/chirps/{{ $chirp->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this chirp?')"
                                class=" text-white bg-red-600 py-1.5 px-2.5 rounded-lg hover:bg-orange-600 cursor-pointer">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endcan
        </div>

    </div>
</div>
