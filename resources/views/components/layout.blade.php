<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <header>
        <nav class="flex justify-between items-center fixed w-full bg-gray-300 p-3 shadow z-50">
            <h1 class="font-bold text-2xl cursor-pointer">
                <a href="/">Chirper</a>
            </h1>

            <div class="flex gap-5">

                @auth
                    <span>{{auth()->user()->name}}</span>
                    <form method="POST" action="{{route('logout')}}" class="inline">
                        @csrf
                        <button type="submit" class="cursor-pointer font-bold text-white bg-blue-600 px-4 py-1 rounded-full">Logout</button>
                    </form>
                @else
                <a href="/login" class="cursor-pointer font-bold">Sign In</a>
                <a href="{{ route('register') }}"
                    class="cursor-pointer font-bold text-white bg-black px-4 py-1 rounded-full">Sign Up</a>
                @endauth

            </div>
        </nav>
        @if (session('success'))
            <div
                class="fixed top-20 left-1/2 -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded-xl shadow animate-fade-out z-50">
                {{ session('success') }}
            </div>
        @endif
    </header>

    <!-- Content -->
    <main class="pt-20">
        {{ $slot }}
    </main>

</body>

</html>
