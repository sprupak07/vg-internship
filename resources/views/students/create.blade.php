@extends('layouts.app')
@section('content')
<div class="container mx-12 p-4">
    <h1>Create Student</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border rounded p-2 w-full">
        </div>

        <div class="mb-4">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="border rounded p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="border rounded p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="border rounded p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="address">Address</label>




            <textarea id="address" name="address" class="border rounded p-2 w-full"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Create</button>
    </form>
</div>
@endsection
