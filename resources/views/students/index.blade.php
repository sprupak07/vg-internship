@extends('layouts.app')
@section('content')
<div class="container mx-12 p-4">
   <h1 class="text-3xl">Students List</h1>
    <p>List of all students will be displayed here.</p>

    <div class="my-4">
        <button>
            <a href="{{ route('student.create') }}" class="bg-green-500 text-white rounded px-4 py-2">Add New Student</a>
        </button>
    </div>

    @foreach ($students as $student)
        <div class="border p-4 my-2">
            <h2 class="text-xl font-bold">{{ $student->name }}</h2>
            <p>Email: {{ $student->email }}</p>
            <p>Date of Birth: {{ $student->date_of_birth }}</p>
            <p>Phone Number: {{ $student->phone_number }}</p>
            <p>Address: {{ $student->address }}</p>
            <div class="mt-2 flex gap-2">
                <a href="{{ route('student.edit', $student->id) }}" class="bg-blue-500 text-white rounded px-4 py-2">Edit</a>
                <form action="{{ route("student.destroy", $student->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="bg-red-500 text-white rounded px-4 py-2 mt-2">Delete</button>
                </form>
            </div>
        </div>

    @endforeach

</div>
@endsection

