@extends("layouts.app")

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Welcome to {{ config('app.name') }}</h1>
        <p class="text-gray-600 text-lg">Manage your library resources efficiently.</p>
    </div>

    <nav class="mb-8">
        <ul class="flex space-x-6">
            <li>
                <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Books</a>
            </li>
            <li>
                <a href="{{ route('authors.index') }}" class="text-green-500 hover:text-green-700 font-semibold">Authors</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="text-purple-500 hover:text-purple-700 font-semibold">Categories</a>
            </li>
        </ul>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Metric Card 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Books</h2>
                    <p class="text-gray-500">Manage collection</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu"><path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h16"/></svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm">View details &rarr;</a>
            </div>
        </div>

        <!-- Metric Card 2 -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Authors</h2>
                    <p class="text-gray-500">Writers & Contributors</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('authors.index') }}" class="text-green-500 hover:text-green-700 font-medium text-sm">View details &rarr;</a>
            </div>
        </div>

        <!-- Metric Card 3 -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Categories</h2>
                    <p class="text-gray-500">Genres & Types</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('categories.index') }}" class="text-purple-500 hover:text-purple-700 font-medium text-sm">View details &rarr;</a>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h3>
        <div class="flex gap-4">
            <a href="{{ route('books.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition duration-200 flex items-center gap-2">
                <span>Add Book</span>
            </a>

            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow border border-gray-300 transition duration-200">
                View Reports
            </button>
        </div>
    </div>
</div>
@endsection
