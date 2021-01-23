@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-sm-12">
    <div class="justify-content-start d-inline-flex">
     
        <p class="display-4">Posts</p>
    </div>
    <div class="justify-content-end d-inline-flex">
    </div>  
    @if (count($posts)>0)

    @foreach ( $posts as $post)
    
        <div class="card">
  <div class="card-body">
    <div class="col-md-4 col-sm-4">
      <img src="{{Storage::url('/images/'. $post->cover_img)}}" alt="cover_image" class="img-fluid">
    </div>
    <div class="col-md-8 col-sm-8">
               <p class="display-4">{{$post->title}}</p>
    <p class="display-6">Post Created at - {{$post->created_at}} by {{$post->user->name}}</p>
    <p class="d-flex">{!!$post->body!!}</p>
    </div>
   
       <a href="/posts/{{$post->id}}" class="btn btn-dark btn-sm">Read More</a>
       </div>
  </div>
  
  
    @endforeach
  
        @else

        <p>No posts found</p>
         
    @endif
     <div class="d-flex justify-content-end">
             {!!$posts->links()!!}
    </div>
      </div>    
</div>
@endsection