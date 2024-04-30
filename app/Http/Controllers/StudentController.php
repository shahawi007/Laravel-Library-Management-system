<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    function index()
    {
        $books = Book::all();
        return view('students.library', compact('books'));
    }

    function exploreBooks()
    {
        $books = Book::all();
        return view('student.explore_books', compact('books'));
    }

    function borrowBook(Request $request)
    {

        $borrow = new BorrowedBook();
        $borrow->student_id = Auth::user()->id;
        $borrow->book_id = $request->book_id;
        $borrow->save();
        return redirect()->back()->with('message', 'success');
        // dd(Auth::user()->id, $request->book_id);
        // dd($request);
    }

    function returnBook(Request $request)
    {

        $checkBook = BorrowedBook::where('id', $request->book_id)->where('student_id', Auth::user()->id)->firstOrFail();

        if ($checkBook) {
            $checkBook->return_date = \Carbon\Carbon::now();
            $status = $checkBook->save();

            if ($status) {
                return redirect()->back()->with('message', 'Book has returned to library successfully, Thank you :) ');
            } else {
                return redirect()->back()->with('message', 'Please try again later as book can not be returned');
            }
        }
    }

    function showBorrwed(Request $request)
    {
        $borrowedBooks = BorrowedBook::all();
        return view('student.show_borrowed', compact('borrowedBooks'));
    }


    //Profle Methods

    function showProfile()
    {
        $user = Auth::user();
        return view('student.myprofile', compact('user'));
    }

    function saveProfile(Request $request)
    {

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $status = $user->save();

        if ($status) {
            return redirect()->back()->with('message', 'Profile has been updated');
        } else {
            return redirect()->back()->with('message', 'Somting went wrong!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
