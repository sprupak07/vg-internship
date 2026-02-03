<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create(Request $request)
    {
        return view('students.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'phone_number' => 'nullable|numeric',
            'address' => 'nullable|string|max:500',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('student.list');
    }

    public function show(Request $request, $id)
    {
        $student = Student::find($id);

        return view('students.show', compact('student'));
    }

    public function edit(Request $request, $id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:students,email,'.$id,
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'phone_number' => 'nullable|numeric',
        ]);

        $student = Student::find($id);

        $student->update($data);

        return redirect()->route('student.list');

    }

    public function destroy(Request $request, $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('student.list');
    }
}
