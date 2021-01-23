<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'startupApp')}}</title>

        <!-- Fonts -->
    

        <!-- Styles -->
 
    </head>
    <body>
        @include('Inc.navbar')

<div class="container-sm">
    @include('Inc.messages')
    @yield('content')
</div>
      
    </body>
</html>
