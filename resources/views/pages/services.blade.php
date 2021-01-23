@extends('layouts.app')

@section('content')
        <h1>{{$title}}</h1>
   
            @if (count($services)>0)
                 <ul>
            @foreach ($services as $item)

            <li>
                {{$item}}
            </li>
                
            @endforeach
                </ul> 
            @endif
                          
@endsection