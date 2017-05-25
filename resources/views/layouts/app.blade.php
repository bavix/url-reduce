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
    <link href="{{ asset('packages/admin/lightGallery/css/lightgallery.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    <link href="{{ asset('css/sot.css')  }}" rel="stylesheet"/>

    <!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};</script>

    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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

            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="data:image/png;base64,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"
                     title="{{ config('app.name', 'Laravel') }}" alt="{{ config('app.name', 'Laravel') }}" />
            </a>

            <div class="collapse navbar-collapse" id="navbarDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ activeClass(['new', 'new.view', 'new.category']) }}">
                        <a class="nav-link" href="{{ route('new') }}">Новости <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item  {{ activeClass(['page', 'page.view']) }}">
                        <a class="nav-link" href="{{ route('page') }}">Страницы</a>
                    </li>
                    <li class="nav-item  {{ activeClass(['album', 'album.view']) }}">
                        <a class="nav-link" href="{{ route('album') }}">Альбомы</a>
                    </li>
                    <li class="nav-item  {{ activeClass(['poll', 'poll.view']) }}">
                        <a class="nav-link" href="{{ route('poll') }}">Опросы</a>
                    </li>
                    <li class="nav-item  {{ activeClass('statement') }}">
                        <a class="nav-link" href="{{ route('statement') }}">Подать заявление</a>
                    </li>
                </ul>

                <ul class="navbar-nav pull-right">
                    <li class="nav-item drop">
                        <a href="#" class="zoom nav-link" data-type="0">
                            <!-- search plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.8 511.8">
                                <path d="M307.8 192h-84v-84c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v84h-84c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h8c6.6 0 12-5.4 12-12v-84h84c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12z"/>
                                <path d="M508.3 480l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-8.5C395.7 310.6 416 261.7 416 208 416 93.8 324.9 1.5 210.7 0 93.7-1.5-1.5 93.7 0 210.7 1.5 324.9 93.8 416 208 416c53.7 0 102.6-20.3 139.5-53.7v8.5c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l11.3-11.3c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item drop">
                        <a href="#" class="zoom nav-link" data-type="1">
                            <!-- search minus -->
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

            @if(isset($links))
                <article class="col-lg-8">
                    @yield('content')
                </article>

                <aside class="blocks col-lg-4">

                    @if (!empty($polls) && $polls->count())
                        <div class="card">
                            <div class="card-block">
                                <h5 class="card-title">
                                    Опросы
                                    <span class="badge badge-default float-right">{{ $polls->count() }}</span>
                                </h5>

                                <ul class="menu nav bd-sidenav">
                                    @foreach($polls as $poll)
                                        <li>
                                            <a href="{{ $poll->url() }}" title="{{ $poll->title }}">{{ $poll->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (!empty($pages) && $pages->count())
                        <div class="card">
                            <div class="card-block">
                                <h5 class="card-title">
                                    Страницы
                                    <span class="badge badge-default float-right">{{ $pages->count() }}</span>
                                </h5>

                                <ul class="menu nav bd-sidenav">
                                    @foreach($pages as $page)
                                        <li>
                                            <a href="{{ $page->url() }}" title="{{ $page->title }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (!empty($links) && $links->count())
                        <div class="card">
                            <div class="card-block">
                                <h5 class="card-title">
                                    Ссылки
                                    <span class="badge badge-default float-right">{{ $links->count() }}</span>
                                </h5>

                                <ul class="menu nav bd-sidenav">
                                    @foreach($links as $link)
                                        <li>
                                            <a href="{{ $link->url }}" title="{{ $link->title }}">{{ $link->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    {{--<div class="card">--}}
                        {{--<div class="card-block">--}}
                            {{--<h5 class="card-title">Last news</h5>--}}
                            {{--<p class="card-text">Java Script</p>--}}
                            {{--<a href="#" class="btn btn-primary btn-sm btn-block">Self</a>--}}
                            {{--<a href="#" class="btn btn-info btn-sm btn-block">Self</a>--}}
                            {{--<a href="#" class="btn btn-warning btn-sm btn-block">Self</a>--}}
                            {{--<a href="#" class="btn btn-danger btn-sm btn-block">Self</a>--}}
                            {{--<a href="#" class="btn btn-success btn-sm btn-block">Self</a>--}}
                            {{--<a href="#" class="btn btn-default btn-sm btn-block">Self</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="clearfix"></div>

                </aside>
            @else
                <article class="col-lg-12">
                    @yield('content')
                </article>
            @endif

        </div>

    </main>

    <div class="clearfix"></div>
    <br />

    <footer class="mainfooter">

        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            @if(isset($pages))
                                <h4>Последние страницы</h4>
                                <ul class="list-unstyled">
                                    @foreach($pages as $page)
                                        <li>
                                            <a href="{{ $page->url() }}"
                                               title="{{ $page->title }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            @if(isset($polls))
                                <h4>Последние опросы</h4>
                                <ul class="list-unstyled">
                                    @foreach($polls as $poll)
                                        <li>
                                            <a href="{{ $poll->url() }}"
                                               title="{{ $poll->title }}">{{ $poll->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
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
                                        Электронная почта: <span>sut-belora@yandex.ru</span>
                                    </li>
                                </ul>
                            </address>
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
<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('node_modules/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('packages/admin/lightGallery/js/lightgallery.min.js') }}"></script>
<script src="{{ asset('js/watch.min.js') }}"></script>
<script src="{{ asset('js/bavix.js') }}"></script>
<script src="{{ asset('js/zoom.js') }}"></script>
<script>
    $(function () {
        var $poll = $('#poll');
        var $polls = $poll.data('count');
        $('.lightGallery').lightGallery();

        $poll.find('[type=radio]').change(function () {
            $poll.find('button').prop('disabled', $poll.serializeArray().length !== ($polls + 1));
        });
    });
</script>

</body>
</html>
