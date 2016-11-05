<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Philosopher|Oswald|Kelly Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/project.css') }}">
</head>
<body>
    <header>
        @include('header.header')
        @include('header.cart')
    </header>

        @yield('content')
    
    <footer>
        @include('footer.footer')
    </footer>

    <!-- JavaScripts -->
    <script type="text/javascript" src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/cookies.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/project.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>

</body>
</html>

