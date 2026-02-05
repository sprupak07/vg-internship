<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = \App\Models\Author::paginate(10);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        \App\Models\Author::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function show(\App\Models\Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(\App\Models\Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, \App\Models\Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(\App\Models\Author $author)
    {
        try {
            $author->delete();
            return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('authors.index')->with('error', 'Cannot delete author. They may have books associated with them.');
        }
    }
}
