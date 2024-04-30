@extends('layout.app')
@section ("title","Edit post")

@section ('content')


<form action="/admins/{{$book['id']}}" method="POST">
    @csrf
    @method('put')

    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control" value="{{$book->title}}"><br>

    <label for="author">Author:</label>
    <input type="text" name="author" class="form-control" value="{{ $book->author }}">


    <label for="subject">Subject:</label>
    <input type="text" name="subject" class="form-control" value="{{$book->subject}}"><br>





    <input class="btn btn-primary" type="submit" value="Update">
</form>
@endsection