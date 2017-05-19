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

<header>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
        <div class="container">
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
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="wrapper">

    <main class="container">

        <div class="row">

            <article class="col-lg-9">
                @yield('content')
            </article>

            <aside id="blocks" class="col-lg-3">
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

                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Last news</h5>
                        <p class="card-text">Java Script</p>
                        <a href="#" class="btn btn-primary btn-sm btn-block">Self</a>
                        <a href="#" class="btn btn-info btn-sm btn-block">Self</a>
                        <a href="#" class="btn btn-warning btn-sm btn-block">Self</a>
                        <a href="#" class="btn btn-danger btn-sm btn-block">Self</a>
                        <a href="#" class="btn btn-success btn-sm btn-block">Self</a>
                        <a href="#" class="btn btn-default btn-sm btn-block">Self</a>
                    </div>
                </div>

                <div class="clearfix"></div>

            </aside>

        </div>

    </main>

    <footer class="mainfooter">

        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Контакты</h4>
                            <address>
                                <ul class="list-unstyled">
                                    <li class="space">
                                        <span>г. БЕЛОРЕЧЕНСК,</span>
                                        <span>ул. 8 Марта, д. 57,</span>
                                        <span>Краснодарский край,</span>
                                        <span>352631</span>
                                    </li>
                                    <li>
                                        Телефоны: <span>(86155) 33803</span><br/>
                                        Электронная почта: <span>sut-belora@yandex.ru</span><br/>
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
                    <a class="bavix" title="Разработка и техническая поддержка сайта - bavix" href="https://bavix.ru/" target="_blank">
                        <img src="https://bavix.ru/images/bavix.svg"
                             alt="Разработка и техническая поддержка сайта - bavix"
                             title="Разработка и техническая поддержка сайта - bavix" />
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div>

    <!-- Scripts -->
<script defer async src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script defer async src="{{ asset('node_modules/tether/dist/js/tether.min.js') }}"></script>
<script defer async src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
