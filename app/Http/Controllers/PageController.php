<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {

        // if Auth user then redirect to dashboard
        if ($request->user()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }

    }

    public function dashboard()
    {
        $books = Book::count();
        $authors = Author::count();
        $categories = Category::count();

        return view('dashboard', compact('books', 'authors', 'categories'));
    }

    public function mood()
    {
        $moods = ['Happy', 'Sad', 'Excited', 'Angry', 'Relaxed'];

        return view('mood.index', compact('moods'));
    }
}
