@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
                <div class="card-header">
                   <p class="h4">{{ __('Dashboard') }}</p> 
                
                </div>

                <div class="card-body">   
                    <div class="d-flex">
                          <p class="ml-auto p-2"><a href="/posts/create" class="btn btn-secondary btn-sm ">Create Post</a></p>
                    </div>
              
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- {{ __('You are logged in!') }}-->
                  
                       <table class="table table-bordered table-hover table-sm ">
                            <div class="table-responsive-sm">
                               
                                <thead class="table-dark">
                                     <tr>
                                         <th>Uid</th>
                               <th>Title</th>
                               <th>Body</th>
                               <th>Create</th>
                               <th>Update</th>
                               <th>Picture</th>
                               <th>Action</th>
                           </tr>
                                </thead>
                          
                           @foreach ($posts as $post)
                           <tbody>
                                <tr>
                                    <td>{{$post->user_id}}</td>
                               <td>{{$post->title}}</td>
                               <td>{!!$post->body!!}</td>
                               <td>{{$post->created_at}}</td>
                               <td>{{$post->updated_at}}</td>
                               <td style="Width:30px;"><img src="{{Storage::url('/images/'.$post->cover_img)}}" alt="cover_img" class="img-fluid  d-flex"></td>
                                <td colspan="2"><a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-outline-info">Edit</a>
                                    {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id], 'method'=>'POST'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}

                                    {!!Form::close()!!}
                               </td>
                           </tr>
                           </tbody>
                                @endforeach
                           
                                 </div>
                       </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
