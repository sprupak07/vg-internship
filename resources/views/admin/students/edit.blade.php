@extends('layouts.app')
@section('content')
    <div class="container mx-12 p-4">
        <h1 class="text-3xl font-bold">Edit Student</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $student->name }}"
                    class="border rounded p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $student->email }}"
                    class="border rounded p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $student->date_of_birth }}"
                    class="border rounded p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ $student->phone_number }}"
                    class="border rounded p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="address">Address</label>

                <textarea id="address" name="address" class="border rounded p-2 w-full">{{ $student->address }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Update</button>
        </form>
    </div>
@endsection
