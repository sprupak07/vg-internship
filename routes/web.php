<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialiteController;


Route::get('/', [PageController::class, 'home'])->name('home');


Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mood', [PageController::class, 'mood'])->name('mood');


// group route
Route::prefix("/students")->group(function () {

    // "/" means "/students"
//   Route::get("/", function () {    return "Ram Sita Hari Gita";})->name("student.list");
// Route::get("/", [StudentsController::class, 'index'])->name("student.list");
// Route::get("/create", [StudentsController::class, 'create'])->name("student.create");
// Route::post("/store", [StudentsController::class, 'store'])->name("student.store");
// Route::get('edit/{id}', [StudentsController::class, 'edit'])->name('student.edit');
// Route::put('update/{id}', [StudentsController::class, 'update'])->name('student.update');
// Route::delete('delete/{id}', [StudentsController::class, 'destroy'])->name('student.destroy');


//  Route::get("/{id}", [StudentsController::class, 'show'])->name("student.detail");


// Route::get("/{name}", function ($name) {
//     return "This is student " . $name . " page";
// }) ->name("student.detail");

});

// name routes : we use ->name("route.name") to name a route

Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);


Route::get('/auth/google/redirect', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/auth/github/redirect', [SocialiteController::class, 'redirectToGitHub'])->name('github.login');
Route::get('/auth/github/callback', [SocialiteController::class, 'handleGitHubCallback'])->name('github.callback');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'profile'])->name('profile.update.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
