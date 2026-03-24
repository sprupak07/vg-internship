<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="min-h-screen bg-gray-50 text-gray-900 flex flex-col">

    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') ?? '#' }}" class="text-2xl font-bold text-blue-600 tracking-tight">Ratna Books</a>

            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') ?? '#' }}" class="text-gray-600 hover:text-blue-600 font-medium transition">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Books</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Categories</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Contact</a>
            </nav>

            @if(Auth::check())
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 font-medium">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-blue-600 font-medium transition">Logout</button>
                    </form>
                </div>
            @else
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="hidden sm:block text-gray-600 hover:text-blue-600 font-medium transition">Sign In</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition font-medium shadow-sm">Sign Up</a>
            </div>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>

        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <span class="text-xl font-bold text-gray-800">Ratna Books</span>
                    <p class="text-gray-500 text-sm mt-1">Your favorite bookstore.</p>
                </div>
                <div class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Ratna Books. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
