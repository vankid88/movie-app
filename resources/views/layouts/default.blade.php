<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Funny Movies</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/fontawesome-free/css/all.min.css') }}">
    <link href="{!! url('dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{!! url('dist/css/app.css') !!}" rel="stylesheet">
</head>
<body>
    @include('layouts.header')
    <main class="container">
        @yield('content')
    </main>
    <script src="{!! url('dist/js/bootstrap.bundle.min.js') !!}"></script>
  </body>
</html>