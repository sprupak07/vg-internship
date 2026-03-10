<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')

    <link href="{{ asset("assets/css/nepali.datepicker.v5.0.6.min.css") }}" rel="stylesheet" type="text/css"/>


</head>
<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Admin Panel
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
                Dashboard
            </a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
                Users
            </a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
                Settings
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <a href="#" class="block px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-center">
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h1>

            <div>
                <span class="text-gray-600">Welcome, Admin</span>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
