<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');



// Route::get("/me", function () {
//     return "Rupak Sapkota";
// });

// Route::post("/data", function () {
//     return "This is post route";
// });

// Route::put("/update", function () {
//     return "This is put route";
// });

// Route::delete("/delete", function () {
//     return "This is delete route";
// });

/*
Route::get("/students/rupak", function () {
    return "This is student rupak page";
});

Route::get("/students/ram", function () {
    return "This is student ram page";
});

*/




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
