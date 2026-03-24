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
        // if ($request->user()) {
        //     return redirect()->route('admin.dashboard');
        // } else {
        //     return redirect()->route('login');
        // }


        //  $incomes = Income::where('user_id', $request->user()->id);


        $books = Book::all();

        return view("frontend.home", compact('books'));

    }

    public function dashboard(Request $request)
    {
        // validation of user role [admin or user]
        if ($request->user()->role === 'user') {
            return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
        }

        $books = Book::count();
        $authors = Author::count();
        $categories = Category::count();

        return view('dashboard', compact('books', 'authors', 'categories'));
    }

    public function dashboardNew()
    {
        return view('admin.dashboard');
    }

    public function mood()
    {
        $moods = ['Happy', 'Sad', 'Excited', 'Angry', 'Relaxed'];

        return view('frontend.mood.index', compact('moods'));
    }

    public function book(Request $request, $id){

        $book= Book::find($id);
        return view('frontend.book', compact('book'));
    }
}
