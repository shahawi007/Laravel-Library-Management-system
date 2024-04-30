@extends('layout.app')
@section ("title","All students")
@section('content')
<div class="container">
    <h1>All Students</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Borrowed Book</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection