@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="bg-blue-600 rounded-2xl p-10 md:p-16 text-center text-white mb-16 shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Nepal's Premier Book Store</h1>
            <p class="text-lg md:text-xl mb-8 text-blue-100 max-w-2xl mx-auto">Discover millions of books, from bestsellers
                to rare finds. Start your reading journey today.</p>
            <a href="#"
                class="bg-white text-blue-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition shadow-md inline-block">Explore
                Collection</a>
        </div>
        <div class="absolute inset-0 bg-blue-700 opacity-20 transform -skew-y-12 scale-150"></div>
    </div>

    {{-- Section Title --}}
    <div class="mb-10 flex justify-between items-end border-b border-gray-200 pb-4">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Featured Books</h2>
            <p class="text-gray-500 mt-2 text-sm">Check out our latest and most popular collections.</p>
        </div>
        <a href="#" class="text-blue-600 hover:text-blue-800 hidden sm:block font-semibold transition">View All
            &rarr;</a>
    </div>


    {{-- Books Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse ($books ?? [] as $book)
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col group">
                <div class="h-64 bg-blue-100 relative overflow-hidden flex items-center justify-center">
                    @if ($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Book Cover"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                    @else
                        <div class="text-gray-400 font-semibold text-lg flex flex-col items-center ">
                            No Cover
                        </div>
                    @endif
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-colors duration-300">
                    </div>
                </div>

                <div class="p-5 flex-grow flex flex-col">
                    <span
                        class="text-xs font-bold text-blue-600 uppercase tracking-wider mb-2">{{ $book->category->name ?? 'Uncategorized' }}</span>
                    <a href="{{ route('book', $book->id) }}">
                        <h3
                            class="text-lg font-bold text-gray-900 mb-1 leading-tight line-clamp-2 hover:text-blue-600 cursor-pointer transition">
                            {{ $book->title }}</h3>
                    </a>

                    <p class="text-gray-500 text-sm mb-4">{{ $book->author->name ?? 'Unknown Author' }}</p>

                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-bold text-lg text-gray-900">${{ number_format($book->price ?? 0, 2) }}</span>
                        <button
                            class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-600 hover:text-white transition shadow-sm border border-blue-100 group-hover:border-blue-600">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                <span class="text-5xl mb-4 block">📚</span>
                <h3 class="text-xl font-bold text-gray-700 mb-2">No books available</h3>
                <p class="text-gray-500">We couldn't find any books. Please check back later!</p>
            </div>
        @endforelse
    </div>


    {{-- Section: Nepali Books --}}
    <div class="mt-16 mb-10 flex justify-between items-end border-b border-gray-200 pb-4">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Nepali Books</h2>
            <p class="text-gray-500 mt-2 text-sm">Explore our collection of Nepali literature and culture.</p>
        </div>
        <a href="#" class="text-blue-600 hover:text-blue-800 hidden sm:block font-semibold transition">View All
            &rarr;</a>
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-col-3 lg:grid-cols-4 gap-8">
        @forelse ($nepaliBooks ?? [] as $book)
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col group">
                <div class="h-64 bg-blue-100 relative overflow-hidden flex items-center justify-center">
                    @if ($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Book Cover"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                    @else
                        <div class="text-gray-400 font-semibold text-lg flex flex-col items-center ">
                            No Cover
                        </div>
                    @endif
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-colors duration-300">
                    </div>
                </div>

                <div class="p-5 flex-grow flex flex-col">
                    <span
                        class="text-xs font-bold text-blue-600 uppercase tracking-wider mb-2">{{ $book->category->name ?? 'Uncategorized' }}</span>
                    <a href="{{ route('book', $book->id) }}">
                        <h3
                            class="text-lg font-bold text-gray-900 mb-1 leading-tight line-clamp-2 hover:text-blue-600 cursor-pointer transition">
                            {{ $book->title }}</h3>
                    </a>

                    <p class="text-gray-500 text-sm mb-4">{{ $book->author->name ?? 'Unknown Author' }}</p>

                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-bold text-lg text-gray-900">${{ number_format($book->price ?? 0, 2) }}</span>
                        <button
                            class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-600 hover:text-white transition shadow-sm border border-blue-100 group-hover:border-blue-600">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                <span class="text-5xl mb-4 block">📚</span>
                <h3 class="text-xl font-bold text-gray-700 mb-2">No Nepali books available</h3>
                <p class="text-gray-500">We couldn't find any Nepali books. Please check back later!</p>
            </div>
        @endforelse

        {{-- https://developer.esewa.com.np/ --}}

        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
            @csrf
            @php
                $amount = 100;
                $tax_amount = 10;
                $total_amount = $amount + $tax_amount;
                $transaction_uuid = uniqid(); // better unique
                $product_code = 'EPAYTEST';

                // MUST match exactly
                $signed_field_names = 'total_amount,transaction_uuid,product_code';

                // EXACT format (NO spaces)
                $data = "total_amount={$total_amount},transaction_uuid={$transaction_uuid},product_code={$product_code}";

                // eSewa test secret
                $secret = '8gBm/:&EnhH.1/q';

                $signature = base64_encode(hash_hmac('sha256', $data, $secret, true));
            @endphp

            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="tax_amount" value="{{ $tax_amount }}">
            <input type="hidden" name="total_amount" value="{{ $total_amount }}">
            <input type="hidden" name="transaction_uuid" value="{{ $transaction_uuid }}">
            <input type="hidden" name="product_code" value="{{ $product_code }}">
            <input type="hidden" name="product_service_charge" value="0">
            <input type="hidden" name="product_delivery_charge" value="0">

            <input type="hidden" name="success_url" value="{{ route('payment.success') }}">
            <input type="hidden" name="failure_url" value="{{ route('payment.failure') }}">

            <input type="hidden" name="signed_field_names" value="{{ $signed_field_names }}">
            <input type="hidden" name="signature" value="{{ $signature }}">

            <!-- UI -->
            <div class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-bold text-lg">Nepali Book 123</h3>
                <p class="text-sm text-gray-500">Rupak Sapkota</p>

                <div class="flex justify-between mt-4">
                    <span class="font-bold text-lg">Rs {{ $total_amount }}</span>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Buy with eSewa
                    </button>
                </div>
            </div>
        </form>


        {{-- Mobile View All Button --}}
        <div class="mt-10 text-center sm:hidden">
            <a href="#"
                class="bg-white border focus:ring-4 focus:ring-blue-100 border-gray-300 text-gray-700 hover:bg-gray-50 hover:text-blue-600 px-6 py-3 rounded-lg font-semibold transition inline-block w-full">View
                All Books</a>
        </div>
    @endsection
