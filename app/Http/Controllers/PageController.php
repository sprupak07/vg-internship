<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        $books = Book::count();
        $authors = Author::count();
        $categories = Category::count();

        return view('welcome', compact('books', 'authors', 'categories'));
    }
}
