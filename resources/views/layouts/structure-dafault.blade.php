<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('icon/code.png')}}"/>
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/default.css') }}">
        <title>Developer Tasks</title>
    </head>
    <body>
        <div>
            @include('layouts.navbar')
            <div class="container">
                <div class="shadow margin-top-3-percent bg-light padding-5-percent">
                    <h1>@yield('title')</h1>
                </div>
                @yield('content')                
            </div>
            <div class="footer text-center border padding-2-percent margin-top-3-percent ">
                ©2018 Eduardo Mitkus
            </div>
        </div>
    </body>
</html>