<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app1.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="wrap">
        <header class="head">
            <a href="#" class="logo"></a>

            <nav class="main-nav">
                <ul class="main-nav-list">
                    @hasrole('admin')

                    <li class="main-nav-item {{ url()->current() == url('/pets') ? 'active' : ''}} ">
                        <a href="{{ url('/pets') }}" class="main-nav-link">
                            <i class="icon icon-th-list"></i>
                            <span>Ver Mascotas</span>
                        </a>
                    </li>
                    <li class="main-nav-item {{ url()->current() == url('pets/create') ? 'active' : ''}} ">
                        <a href="{{ url('pets/create') }}" class="main-nav-link">
                            <i class="icon icon-pen"></i>
                            <span>Nueva Mascota</span>
                        </a>
                    </li>

                    @endhasrole
                    <li class="main-nav-item ">
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="main-nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Salir
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                    </li>
                    <li class="main-nav-item ">
                            <a id="navbarDropdown" class="main-nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} Bienvenido<span class="caret"></span>
                            </a>
                    </li>
                </ul>
            </nav>
        </header>

        @yield('content')

        <footer class="foot">
            <div class="ad">
                <p>
                    Esta aplicación es desarrollada con
                    <a href="https://styde.net/laravel-6">Laravel 6</a>.
                </p>
            </div>
            <div class="license">
                <p>© 2020 Derechos Reservados</p>
            </div>
        </footer>
    </div>
</body>
</html>
