<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PaymentController;


use Illuminate\Support\Facades\Route;

/*
For Online Magazine

[Page Controller]

get        /home
get     /category/id
get     /author/id
Get     /article/id
Get     /search/{query}


[Auth Controller]
/register
/login
/forgot-password
/reset-password/{token}



// admin
Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashb
    oard', [PageController::class, 'dashboardNew'])->name('admin.dashboard');


    Route::resource('categories', CategoryController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('articles', ArticleController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'profile'])->name('profile.update.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





*/




Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/book/{id}', [PageController::class, 'book'])->name('book');

// payment routes
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/failure', [PaymentController::class, 'paymentFailure'])->name('payment.failure');


// Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mood', [PageController::class, 'mood'])->name('mood');

// group route
Route::prefix('/students')->group(function () {

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

// frontend

Route::get('users/{id}', [PageController::class, 'book'])->name('user.detail');


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

/*
    * Auth Routes
*/

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('registerPost');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::prefix('/admin')->middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboardNew'])->name('admin.dashboard');


    Route::resource('categories', CategoryController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);


});

// require __DIR__.'/auth.php';
