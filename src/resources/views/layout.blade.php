<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>
        body {
            padding-top: 75px;
        }
        </style>

    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">MyBlog</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::path() === 'posts' ? 'active': '' }}">
                    <a class="nav-link" href="/posts">Home</a>
                </li>
                <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                    <a class="nav-link" href="/about">About</a>
                </li>
            </ul>
        </nav>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
