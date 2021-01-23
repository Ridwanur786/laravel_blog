@extends('layouts.app')


@section('content')
<div class="row justify-content-center">

   <p class="display-4">Create Posts</p>

</div>
 <div class="row d-flex justify-content-center">
          
            <div class="col-sm-8">
                 {!!  Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
              <div class="form-group row">
        {{Form::label('title', 'Title', ['class'=>'col-sm-2 col-form-label'])}} 
    <!--<div class="col-sm-10">-->
        {{Form::text('title', '',['class'=> 'col-sm-10  form-control form-control-sm','placeholder'=> 'Title'])}}
    <!--</div>-->
  </div>
        <div class="form-group row">
        {{Form::label('body', 'Text', ['class'=>'col-sm-2 col-form-label'])}} 
    <!--<div class="col-sm-10">-->
        {{Form::textarea('body', '',['class'=> 'col-sm-10 form-control form-control-sm tinyEditor','placeholder'=> 'Enter Posts Texct here'])}}
         <!--</div>-->
  </div>
  <div class="form-group row">
    {{Form::label('cover_img', 'File', ['class'=>'col-sm-2 col-form-label'])}} 
      {{Form::file('cover_img',['class'=>'col-sm-10 form-control-file'])}}
  </div>
      <div class="row justify-content-between">
          <div class="col-10"></div>
           {{Form::submit('Submit',['class'=>'col-2 btn btn-sm btn-primary'])}}
        
             </div>
        {!! Form::close() !!} 
       
       
    </div>
 </div>
     
@endsection
        