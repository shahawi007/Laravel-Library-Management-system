<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()
    {
        $books = Book::all();
        return view('admins.list', compact('books'));
    }

    function show(string $id)
    {

        $book = Book::find($id);
        return view('admins.show', compact('book'));
    }

    function create()
    {
        return view('admins.create');
    }


    function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->subject = $request->subject;
        $book->save();


        return redirect("/admins");
    }


    function edit(string $id)
    {
        $book = Book::find($id);
        return view("admins.edit", compact('book'));
    }


    function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->subject = $request->subject;
        $book->save();
        return redirect("/admins");
    }

    function destroy($id)
    {
        Book::destroy($id);
        return redirect("/admins");
    }
}
