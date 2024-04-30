<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BorrowedBook;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function borrowedBooks()
    {
        $borrowedBooks = BorrowedBook::with(['book', 'student'])->get();

        return view('admins.borrowed_books', compact('borrowedBooks'));
    }

    public function AllStudents()
    {
        $students = User::where('role', 0)->get();
        return view('admins.all_students', compact('students'));
    }

    function checkAdmin()
    {
        if (Auth::user()->role) {
            return Redirect::to('/admins');
        } else {
            return Redirect::to('/');
        }
    }
}
