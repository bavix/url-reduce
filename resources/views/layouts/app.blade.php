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

    <style id="zoom"></style>
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
                </ul>

                <ul class="navbar-nav pull-right">
                    <li class="nav-item drop">
                        <a href="#" class="zoom nav-link" data-type="0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.8 511.8">
                                <path d="M307.8 192h-84v-84c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v84h-84c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h8c6.6 0 12-5.4 12-12v-84h84c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12z"/>
                                <path d="M508.3 480l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-8.5C395.7 310.6 416 261.7 416 208 416 93.8 324.9 1.5 210.7 0 93.7-1.5-1.5 93.7 0 210.7 1.5 324.9 93.8 416 208 416c53.7 0 102.6-20.3 139.5-53.7v8.5c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l11.3-11.3c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item drop">
                        <a href="#" class="zoom nav-link" data-type="1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.8 511.8">
                                <path d="M307.8 223.8h-200c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12z"/>
                                <path d="M508.3 480l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-8.5C395.7 310.6 416 261.7 416 208 416 93.8 324.9 1.5 210.7 0 93.7-1.5-1.5 93.7 0 210.7 1.5 324.9 93.8 416 208 416c53.7 0 102.6-20.3 139.5-53.7v8.5c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l11.3-11.3c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="wrapper">

    <main class="container">

        <div class="row">

            <article class="col-lg-8">
                @yield('content')
            </article>

            <aside id="blocks" class="col-lg-4">
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
<script defer async src="{{ asset('js/watch.min.js') }}"></script>
<script defer async src="{{ asset('js/bavix.js') }}"></script>
<script defer async src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script defer async src="{{ asset('node_modules/tether/dist/js/tether.min.js') }}"></script>
<script defer async src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script defer async src="{{ asset('js/zoom.js') }}"></script>
</body>
</html>
