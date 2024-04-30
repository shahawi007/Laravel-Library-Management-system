@extends('layout.app')
@section ("title","view book")

@section ('content')
<ul>
    <li>ID: {{$book->id}}</li>
    <li>Title: {{$book->title}}</li>
    <li>Subject: {{$book->subject}}</li>
    <li>Status: {{$book->status}}</li>

</ul>
@endsection