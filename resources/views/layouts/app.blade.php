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
                    <a class="navbar-brand" href="#">Blogone</a>
                </div>
                <div class=" col-6 collapse navbar-collapse d-flex " {{-- id="navbarSupportedContent" --}}>
                    <ul class=" justify-content-center navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="{{route('mainpage')}}">Домашняя страница</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('categories') }}">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Профиль</a>
                        </li>
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>


                </div>

        </nav>
        </nav>
        </div>
        </div>

    </header>
    @yield('content')

    <footer>
        <div class="footer">

        </div>
    </footer>
</body>

</html>
