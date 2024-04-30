@extends('layout.student.app')

@section('content')

<div class="container-fluid">
    <h1 class="dash-title">Explore Books</h1>
    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>Yaay!</strong> The book has been added your books list.
      </div>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">All Library Books</div>
                </div>
                <div class="card-body ">
                    <table class="table table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($books as $book)
                            <tr>
                                <td>{{$book->id}}</td>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->subject}}</td>

                                <td><a class="btn btn-primary" href="{{route('borrow-book-action',$book->id)}}">Borrow</a></td>
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
