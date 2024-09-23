<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    <body>
        <nav>
            <ol>
                @if (session('username'))
                <li><a href="{{route("dashboard")}}">dashboard</a></li>
                <li><a href="{{route("logout")}}">{{session('username')}}(logout)</a></li>
                @else 
                <li><a href="{{route("register")}}">register</a></li>
                <li><a href="{{route("login")}}">login</a></li>
                @endif
            </ol>
        </nav>