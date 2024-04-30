@extends('layout.app')
@section ("title","Borrowed books")
@section('content')
<div class="container">
    <h1>Borrowed Books</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Student Name</th>
                <th>Borrowed Date</th>
                <th>Returned Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowedBooks as $borrowedBook)
            <tr>
                <td>{{ $borrowedBook->book->title }}</td>
                <td>{{ $borrowedBook->getUserName() }}</td>
                <td>{{ $borrowedBook->borrowed_at }}</td>
                <td>{{ $borrowedBook->returned_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection