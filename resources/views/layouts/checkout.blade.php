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

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/project.css') }}">

    <script type="text/javascript" src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery.printPage.js') }}"></script>

</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand Oswald" href="/">
                <img class="img-responsive" src="{{ url('img/dobrotex_logo.png') }}">
            </a>
        </div>

    </div>
</nav>


@yield('content')

<!-- JavaScripts -->
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap-multiselect.js') }}"></script>
<script type="text/javascript" src="{{ url('js/project.js') }}"></script>

</body>
</html>
