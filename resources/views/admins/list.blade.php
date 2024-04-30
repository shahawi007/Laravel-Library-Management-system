@extends('layout.app')
@section ("title"," All Books")

@section ('content')
<div class="container">
    <h1>All Avalible Books</h1>
    <table border="2" class="table">
        <tr>
            <th>Id</th>
            <th>Title </th>
            <th>Author </th>
            <th>subject</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>


        @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->subject}}</td>
            <td>{{$book->status}}</td>


            <td><a class="btn btn-primary" href="/admins/{{$book->id}}">View</a></td>
            <td><a class="btn btn-primary" href="/admins/{{$book->id}}/edit">Edit</a></td>
            <td>
                <form action="/admins/{{$book->id}}" method="post">
                    @csrf
                    @method('delete')
                    <input class="btn btn-danger" type="submit" value="delete">
                </form>
            </td>

        </tr>



        @endforeach
    </table>
</div>
<a href="/admins/create">Add new Book </a>
@endsection