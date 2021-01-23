@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">

   <p class="display-4">edit Posts</p>

</div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8">
           
        {!!  Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
              <div class="form-group row">
        {{Form::label('title', 'Title', ['class'=>'col-sm-2 col-form-label'])}} 
    <!--<div class="col-sm-10">-->
        {{Form::text('title', $post->title,['class'=> 'form-control form-control-sm col-sm-10','placeholder'=> 'Title'])}}
    <!--</div>-->
  </div>
        <div class="form-group row">
        {{Form::label('body', 'Text', ['class'=>'col-sm-2 col-form-label'])}} 
    <!--<div class="col-sm-10">-->
        {{Form::textarea('body', $post->body,['class'=> 'col-sm-10 form-control form-control-sm tinyEditor','placeholder'=> 'Enter Posts Texct here','id'=>'tinyEditor'])}}
        </div> 
    <!--</div>-->
     <div class="form-group row">
    {{Form::label('cover_img', 'File', ['class'=>'col-sm-2 col-form-label'])}} 
      {{Form::file('cover_img',['class'=>'col-sm-10 form-control-file'])}}
  </div>
  <div class="row justify-content-between">
      {{Form::hidden('_method','PUT',['class'=>'form-control form-control-sm col-10'])}}
    {{Form::submit('Submit',['class'=>' col-2 btn btn-sm btn-primary ml-auto'])}}
  </div>
    
        {!! Form::close() !!}
  </div>
        </div>
    

     
@endsection
        