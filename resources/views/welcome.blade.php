@extends("layouts.app")

@section('content')
   <div class="flex mx-4 my-8">
     <h1 class="text-3xl font-bold underline">Welcome to {{ config('app.name') }} class</h1>
   </div>

   <div class="flex mx-4 my-8">
    <button class="bg-blue-500">
        <a href="{{ route('student.list') }}" class="text-white p-4">Student List</a>
    </button>
   </div>

   <div class=" flex mx-4 my-4">
    <div class="bg-red-400  mx-2 p-4">
         <p> 12 </p>
         <p> Students </p>
    </div>

    </div>








@endsection
