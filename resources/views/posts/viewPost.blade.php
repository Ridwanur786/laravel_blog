@extends('layouts.app')

@section('content')
 <div class=" row justify-content-md-center">
<div class="col-md-12 col-sm-12">
    <div class="row">
        <div class="col">
            <a href="/posts" class="btn btn-sm btn-secondary">Back</a>
        </div>
        <div class="col-md-auto">
               @if (!Auth::guest())
     @if (Auth::user()->id == $post->user_id)
         
  
    <span><a href="/posts/{{$post->id}}/edit" class="btn btn-info btn-sm">edit Post</a> 
    </span></p>
    <p>
     <span>{!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id], 'method'=>'POST'])!!}
        {{Form::hidden('_method','DELETE')}}
         {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}

    {!!Form::close()!!}</span></p>
       @endif
   @endif
        </div>
          </div>
          
    </div>
</div>

   <p class="display-4">{{$post->title}} 
          <div class="cover_img">
              <img src="{{Storage::url('/images/'. $post->cover_img)}} " alt="cover-img" class="img-fluid">
          </div>
  
  
    <p>written at-{{$post->created_at}} by {{$post->user->name}}</p>
    <p>{!!$post->body!!}</p>
@endsection