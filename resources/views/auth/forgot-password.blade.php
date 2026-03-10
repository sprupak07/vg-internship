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
                    <h1 class="text-4xl font-bold mb-6">Forgot your password?</h1>
                    <p class="text-lg opacity-90">
                        No worries! Just let us know your email address and we will email you a password reset link that
                        will allow you to choose a new one.
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
        </div>
    </div>
@endsection
