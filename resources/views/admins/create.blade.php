@extends('layout.app')
@section ("title","Add Book")

@section ('content')
<form action="/admins" method="POST">
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control" required placeholder="Title"><br>


    <label for="author">Author:</label>
    <input type="text" name="author" class="form-control" required placeholder="Author"">

    <label for=" subject">subject:</label>
    <input type="text" name="subject" class="form-control" required placeholder="Subject"><br>
    <input class="btn btn-primary" type="submit" value="Add">
</form>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endsection