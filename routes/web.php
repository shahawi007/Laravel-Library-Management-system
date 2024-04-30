<?php

use App\Http\Controllers\StudentLibraryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/home', [AdminController::class, 'checkAdmin']);


Route::prefix('admins')->middleware(['auth', 'checkUserRole'])->group(function () {
    Route::get('all-students', [AdminController::class, 'AllStudents'])->name('admin.all.students');
    Route::get('borrowed-books', [AdminController::class, 'borrowedBooks'])->name('admin.borrowed.books');
    Route::resource("/", BookController::class);
});


// Route::get('/library', [StudentLibraryController::class, 'index'])->name('students.library')->middleware('student.auth');

// Route::prefix('/')->middleware(['auth', 'checkUserRole'])->group(function () {
//     Route::get('/library', [StudentController::class, 'index'])->name('students.library');
// });

Route::get('/library', [StudentController::class, 'index'])->name('students.library')->middleware(['auth', 'checkUserRole']);

Auth::routes();

Route::get('/', [App\Http\Controllers\StudentController::class, 'exploreBooks'])->name('exploreBooks');

//Borrow and return Books
Route::get('/borrow-book/{book_id}', [StudentController::class, 'borrowBook'])->name('borrow-book-action');
Route::get('/return-book/{book_id}', [StudentController::class, 'returnBook'])->name('return-book-action');
Route::get('/borrowed-books', [StudentController::class, 'showBorrwed'])->name('borrowed-books');

//Student Profile
Route::get('/my-profile', [StudentController::class, 'showProfile'])->name('showProfile');
Route::post('/my-profile', [StudentController::class, 'saveProfile'])->name('saveProfile');

Route::get('/logout', [StudentController::class, 'logout'])->name('logout');
