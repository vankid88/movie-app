<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/fontawesome-free/css/all.min.css') }}">
    <link href="{!! url('dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('dist/css/signin.css') !!}" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-signin">
        @yield('content')
    </main>
</body>
</html>