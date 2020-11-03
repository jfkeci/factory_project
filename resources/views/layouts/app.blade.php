<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

        <title>{{config('app.name', 'Jela Svijeta')}}</title>

    </head>
    @include('inc.navbar')
    <body class="antialiased">
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </body>
</html>
