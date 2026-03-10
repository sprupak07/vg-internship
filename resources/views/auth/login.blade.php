@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8fafc;
    }
</style>

<div class="min-h-screen flex items-center justify-center px-6">
    <div class="w-full max-w-6xl flex bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- LEFT PANEL -->
        <div class="w-1/2 bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-12 flex flex-col justify-between">
            <div>
                <h1 class="text-4xl font-bold mb-6">Start your journey with us.</h1>
                <p class="text-lg opacity-90">
                    Discover the world’s best community of freelancers and business owners.
                </p>
            </div>

            <div class="bg-white/10 p-6 rounded-xl mt-10">
                <p class="text-sm">
                    Simply unbelievable! I am really satisfied with my projects and business.
                    This is absolutely wonderful!
                </p>
                <div class="mt-4 text-sm font-semibold">
                    Rupak Sapkota<br>
                    <span class="font-normal opacity-80">Software Developer</span>
                </div>
            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="w-1/2 flex items-center justify-center p-12 bg-gray-50">
            <div class="w-full max-w-md">

                <h2 class="text-3xl font-bold mb-2">Login</h2>
                <p class="text-gray-500 mb-6">Welcome Back!</p>

                {{-- form errors  --}}
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-500 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('authenticate') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 text-sm">Email</label>
                        <input type="email" name="email"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="example@gmail.com"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm">Password</label>
                        <input type="password" name="password"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Minimum 8 characters"
                               required>
                    </div>

                    <div class="flex items-center justify-between text-sm mb-6">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>

                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                            Forgot Password?
                        </a>
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                        Login
                    </button>

                    <p class="text-sm text-center mt-6">
                        Not registered yet?
                        <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">
                            Create an Account
                        </a>
                    </p>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
