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
                    {{ $books }}
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
                {{ $authors }}
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
                    {{ $categories }}
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

            <button class="hover:bg-green-600 bg-white text-gray-800 font-semibold py-2 px-6 rounded-lg shadow border border-gray-300 transition duration-200">
                View Reports
            </button>
        </div>
    </div>
</div>
@endsection
