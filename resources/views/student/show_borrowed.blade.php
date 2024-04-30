@extends('layout.student.app')

@section('content')

<div class="container-fluid">
    <h1 class="dash-title">Explore Books</h1>

    @if(session()->has('message'))
        <div class="alert alert-primary">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">All Borrowed Books</div>
                </div>
                <div class="card-body ">
                    <table class="table table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">Book ID</th>

                                <th scope="col">Borrowed at</th>
                                <th scope="col">Return date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($borrowedBooks as $borrowedBook)
                            <tr>
                                <td>{{$borrowedBook->book_id}}</td>
                                <td>{{$borrowedBook->borrowed_at}}</td>
                                <td>{{$borrowedBook->return_date}}</td>

                                <td><a class="btn btn-primary @if($borrowedBook->return_date) disabled @endif" href="{{route('return-book-action',$borrowedBook->id)}}">Return Book</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
