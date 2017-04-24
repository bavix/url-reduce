<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @if(isset($title))
        <title>{{ $title }} - {{ config('app.name', 'Laravel') }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    <link href="{{ asset('css/sot.css')  }}" rel="stylesheet"/>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">СЮТ</a>

    <div class="collapse navbar-collapse" id="navbarDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Новости <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item drop">
                <a class="nav-link" href="{{ url('/albums') }}">Альбомы</a>
            </li>
            <li class="nav-item drop">
                <a class="nav-link" href="{{ url('/polls') }}">Опросы</a>
            </li>
            <li class="nav-item drop">
                <a class="nav-link" href="{{ url('/poll/1') }}">Подача заявления</a>
            </li>
            <li class="nav-item drop">
                <a class="nav-link" href="{{ url('/poll/2') }}">+</a>
            </li>
            <li class="nav-item drop">
                <a class="nav-link" href="{{ url('/poll/3') }}">-</a>
            </li>
            {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"--}}
            {{--aria-haspopup="true" aria-expanded="false">Страницы</a>--}}
            {{--<div class="dropdown-menu" aria-labelledby="dropdown01">--}}
            {{--<a class="dropdown-item" href="{{ url('/page/1-info') }}">Страница 1</a>--}}
            {{--<a class="dropdown-item" href="{{ url('/page/2-info') }}">Страница 2</a>--}}
            {{--<a class="dropdown-item" href="{{ url('/page/3-info') }}">Страница 3</a>--}}
            {{--<a class="dropdown-item" href="{{ url('/page/4-info') }}">Страница 4</a>--}}
            {{--</div>--}}
            {{--</li>--}}
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            @yield('content')
        </div>
        <div id="blocks" class="col-md-3">
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Важная информация</h5>
                    <ul id="menu" class="nav bd-sidenav">
                        <li>
                            <a href="{{ url('/page/1') }}">Страница 1</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/2') }}">Страница 2</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/3') }}">Страница 3</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/4') }}">Страница 4</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/5') }}">Страница 5</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/6') }}">Страница 6</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/7') }}">Страница 7</a>
                        </li>
                        <li>
                            <a href="{{ url('/page/8') }}">Страница 8</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Last news</h5>
                    <p class="card-text">Java Script</p>
                    <a href="#" class="btn btn-primary btn-sm btn-block">Self</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Last news</h5>
                    <p class="card-text">Java Script</p>
                    <a href="#" class="btn btn-primary btn-sm btn-block">Self</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card">
                <div class="card-block">
                    <h5 class="card-title">Last news</h5>
                    <p class="card-text">Java Script</p>
                    <a href="#" class="btn btn-primary btn-sm btn-block">Self</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<footer class="mainfooter" role="contentinfo">

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Контакты</h4>
                        <address>
                            <ul class="list-unstyled">
                                <li>
                                    г. БЕЛОРЕЧЕНСК<br>
                                    ул. 8 МАРТА, д. 57<br>
                                    КРАСНОДАРСКИЙ край<br>
                                    352630<br><br/>
                                </li>
                                <li>
                                    Телефоны: 86155-33803<br/>
                                    Электронная почта: nat_krakovsk@mail.ru<br/>
                                </li>
                            </ul>
                        </address>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Popular Services</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"></a></li>
                            <li><a href="#">Payment Center</a></li>
                            <li><a href="#">Contact Directory</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">News and Updates</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Website Information</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Website Tutorial</a></li>
                            <li><a href="#">Accessibility</a></li>
                            <li><a href="#">Disclaimer</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Webmaster</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Popular Departments</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Parks and Recreation</a></li>
                            <li><a href="#">Public Works</a></li>
                            <li><a href="#">Police Department</a></li>
                            <li><a href="#">Fire</a></li>
                            <li><a href="#">Mayor and City Council</a></li>
                            <li>
                                <a href="#"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!--Footer Bottom-->
                    <p class="text-xs-center">
                        <a class="btn btn-link" title="Babichev Maxim" href="https://babichev.net/" target="_blank">Создание сайта - Babichev</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- Scripts -->
<script defer async src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script defer async src="{{ asset('node_modules/tether/dist/js/tether.min.js') }}"></script>
<script defer async src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
