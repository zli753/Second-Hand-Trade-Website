<!doctype html>
<html>
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <head>
        <title>@yield ('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
    </head>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
    <body>
        @include('includes.header')
        <div class="container">
            @yield('content')
        </div>
    </body>  
</html>