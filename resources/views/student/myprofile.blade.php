@extends('layout.student.app')

@section('content')


<div class="container-fluid">
    <h1 class="dash-title">My Profile</h1>
    
    @if(session()->has('message'))
        <div class="alert alert-primary">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="spur-card-title">Update your details</div>
                </div>
                <div class="card-body ">
                    <form action="{{route('saveProfile')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" id="exampleFormControlInput1" placeholder="Your Name">
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}"  id="exampleFormControlInput1" placeholder="name@example.com">
                        </div><button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            
            
        </div>
    </div>
    
</div>

@endsection