@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-12">
            <p class="display-4">{{$title}}</p>
                <p class="h4 text-center">We are going to create our Amdani to paikary web app</p>
            <div class="content text-center">
              
         <p class="text-center"><a href="/login" class="btn btn-sm btn-primary">Log In</a><a href="/register" class="btn  btn-sm btn-dark">Register</a></p>
            </div>
       
        </div>
    </div>

     
@endsection
        
       
