<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="token" content="{{ csrf_token() }}">

    <title>Панель управления администратора</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/admin-project.css') }}">

    <script type="text/javascript" src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery.printPage.js') }}"></script>

</head>
<body id="app-layout">
    <header>
        @include('header.adminModals')
    </header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ url('/') }}">

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Вернуться на сайт</a></li>
                    <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-cogs"></i>Панель управления</a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ url('/admin/editLogin') }}"><i class="fa glyphicon glyphicon-user"></i> Сменить логин/пароль </a></li>    
                                <li><a href="{{ url('/logout') }}"><i class="fa glyphicon glyphicon-log-out"></i> Выйти </a></li>

                            </ul>
                        </li>
                    @endif
                </ul>
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
