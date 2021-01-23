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
              <script src="https://cdn.tiny.cloud/1/ncwrisk7mp2tv3teg5dnil0mkzi0s255qkj5od7w73322n68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script type="text/javascript">
          tinymce.init({
              selector :'textarea#tinyEditor',
              width: 920,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullpage | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
          });
      </script>
    </body>
</html>
