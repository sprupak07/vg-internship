@extends('layouts.app')


@section('content')
    <div class="w-auto h-auto">

        <div
            class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col group">
            <div class="h-64 bg-gray-100 relative overflow-hidden flex items-center justify-center">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Cover"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                @else
                    <div class="text-gray-400 font-semibold text-lg flex flex-col items-center">
                        No Cover
                    </div>
                @endif
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-colors duration-300">
                </div>
            </div>

            <div class="p-5 flex-grow flex flex-col">
                <span
                    class="text-xs font-bold text-blue-600 uppercase tracking-wider mb-2">{{ $book->category->name ?? 'Uncategorized' }}</span>
                <h3
                    class="text-lg font-bold text-gray-900 mb-1 leading-tight line-clamp-2 hover:text-blue-600 cursor-pointer transition">
                    {{ $book->title }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $book->author->name ?? 'Unknown Author' }}</p>

                <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                    <span class="font-bold text-lg text-gray-900">ISBN: {{ $book->isbn}}</span>
                    <span class="font-bold text-lg text-gray-900">Published Date: {{ $book->published_date}}</span>

                </div>
            </div>
        </div>

    </div>
@endsection
