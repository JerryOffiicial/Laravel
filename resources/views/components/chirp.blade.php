@props(['chirp'])

<div class="bg-base-100 shadow rounded-2xl p-4 w-full max-w-lg">
    <div>
        <div class="flex items-start space-x-3">

            @if($chirp->user)
                <div>
                    <div class="size-10 rounded-full overflow-hidden">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}" 
                             alt="{{ $chirp->user->name }}'s avatar" 
                             class="rounded-full w-full h-full object-cover">
                    </div>
                </div>
            @else
                <div class="placeholder">
                    <div class="size-10 rounded-full overflow-hidden">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth" 
                             alt="Anonymous User" 
                             class="rounded-full w-full h-full object-cover">
                    </div>
                </div>
            @endif

            <div class="bg-gray-100 p-4 rounded-2xl w-full">
                <div class="font-semibold text-gray-800">
                    {{ $chirp->user ? $chirp->user->name : 'Anonymous' }}
                </div>

                <div class="mt-1 text-gray-700">
                    {{ $chirp->message }}
                </div>

                <div class="text-sm text-gray-500 mt-2">
                    {{ $chirp->created_at?->diffForHumans() }}
                </div>
            </div>

        </div>
    </div>
</div>