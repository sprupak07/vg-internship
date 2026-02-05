<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = \App\Models\Book::with(['author', 'category'])->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'published_date' => 'nullable|date',
            'cover_image' => 'nullable|string', // Assuming simplified string input for now, or URL
        ]);

        \App\Models\Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(\App\Models\Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(\App\Models\Book $book)
    {
        $authors = \App\Models\Author::all();
        $categories = \App\Models\Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, \App\Models\Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'published_date' => 'nullable|date',
             'cover_image' => 'nullable|string',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(\App\Models\Book $book)
    {
        try {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
        } catch (\Exception $e) {
             return redirect()->route('books.index')->with('error', 'An error occurred while deleting the book.');
        }
    }
}
