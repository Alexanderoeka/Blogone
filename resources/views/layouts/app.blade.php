<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link type="text/css" href="{{ asset('css/css/bootstrap.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/my.css') }}" rel="stylesheet" />
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="col-3">
                    <p class="navbar-brand">Blogone</p>
                </div>
                <div class=" col-6 collapse navbar-collapse d-flex " {{-- id="navbarSupportedContent" --}}>
                    <ul class=" justify-content-center navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="{{ route('mainpage') }}">Домашняя
                                страница</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('categories') }}">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.create') }}">Создать пост</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('author') }}">Авторы</a>
                        </li>
                        <li> <a class="btn btn-light" href="{{ route('search') }}">Поиск</a></li>



                    </ul>






                </div>
                <ul class="col-3 navbar-nav d-flex collapse navbar-collapse align-self-end" style="margin-bottom:0.7%;">
                    @if (Auth::user() != null)

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">{{ Auth::user()->name }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Выйти</a>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Зарегестрироваться</a>
                        </li>

                    @endif
                </ul>
            </div>

        </nav>


    </header>
    @yield('content')

    <footer>
        <div class="footer">

        </div>
    </footer>
</body>

</html>
