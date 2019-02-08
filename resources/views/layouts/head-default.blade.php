<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('icon/code.png')}}"/>
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form-auth.css') }}">
        <link rel="stylesheet" href="{{ asset('css/default.css') }}">
        <title> @yield('title') | Developer Tasks</title>
    </head>    
    @yield('body')
</html>