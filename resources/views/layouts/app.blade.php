<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(!isset($cfg))
        @php($cfg = [\App\Models\ConfigModel::class, 'getValue'])
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php($fullTitle = $cfg('name', config('app.name', 'bavix')))
    @if(isset($title))
        @php($fullTitle = $title . ' - ' . $fullTitle)
    @endif

    <title>{{ $fullTitle }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('packages/admin/lightGallery/css/lightgallery.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    <link href="{{ asset('css/sot.css')  }}" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css') }}">

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

    <meta property="og:title" content="{{ $fullTitle }}"/>
    <meta property="og:description" content="{{ $description ?? '' }}"/>
    <meta property="og:url" content= "{{ request()->url() }}" />
    <meta property="og:type" content="website"/>
    @php($qr = qrUrl())
    @if($qr)
        <meta property="og:image" content="{{ $qr }}">
    @endif

    @if (!empty($description))
        <meta name="description" content="{{ $description }}" />
    @endif

    @if(!empty($title))
        <meta name="keywords" content="{{ keywords($title) }}" />
    @endif

</head>
@php($visually = visually() ? 'visually-impaired' : '')
@php($visually .= visuallyImage() ? ' visually-image' : '')
@php($visually .= ' f' . visuallyFont())
@php($visually .= ' visually-' . visuallyColor())
<body @if(!empty($visually))class="{{ $visually }}"@endif>

<header>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
        <div class="container">

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="visually" src="data:image/png;base64,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"
                     title="{{ config('app.name', 'Laravel') }}" alt="{{ config('app.name', 'Laravel') }}" />
            </a>

            <div class="collapse navbar-collapse" id="navbarDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ activeClass(['new', 'new.view', 'new.category']) }}">
                        <a class="nav-link" href="{{ route('new', [], false) }}">Новости <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ activeClass(['page', 'page.view']) }}">
                        <a class="nav-link" href="{{ route('page', [], false) }}">Страницы</a>
                    </li>
                    <li class="nav-item {{ activeClass(['album', 'album.view']) }}">
                        <a class="nav-link" href="{{ route('album', [], false) }}">Альбомы</a>
                    </li>
                    <li class="nav-item {{ activeClass(['poll', 'poll.view']) }}">
                        <a class="nav-link" href="{{ route('poll', [], false) }}">Опросы</a>
                    </li>
                    <li class="nav-item {{ activeClass('statement') }}">
                        <a class="nav-link" href="{{ route('statement', [], false) }}">Подать заявление</a>
                    </li>
                    <li class="nav-item {{ activeClass('feedback') }}">
                        <a class="nav-link" href="{{ route('feedback', [], false) }}">Обратная связь</a>
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

            <aside class="blocks col-lg-4">

                @if (!empty($item->files) && $item->files->count())
                    <div class="card">
                        <div class="card-block">
                            <h5 class="card-title">
                                Документы
                                <span class="badge badge-default float-right">{{ $item->files->count() }}</span>
                            </h5>

                            <ul class="menu nav bd-sidenav">
                                @foreach($item->files as $document)
                                    <li>
                                        @php( $docTitle = empty($document->title) ? 'Undefined' : $document->title  )
                                        <a href="/upload/{{ $document->src }}"
                                           download="{{ $docTitle }}"
                                           title="{{ $docTitle }}">{{ $docTitle }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-block">

                        <div class="row visually-special mx-auto">
                            <a href="{{ route('visually', [], false) }}" data-val="visually-impaired" data-sel="0"
                               title="Специальная версия сайта" class="visually-eye {{ visually() ? 'active' : '' }}">
                                <i></i><span>Обычная версия</span>
                            </a>
                            <a href="{{ route('visually', [], false) }}" data-val="visually-impaired" data-sel="1"
                               title="Специальная версия сайта" class="visually-eye {{ !visually() ? 'active' : '' }}">
                                <i></i><span>Версия для слабовидящих</span>
                            </a>
                        </div>

                        <div class="row visually-special">
                            <a class="mx-auto {{ visuallyImage() ? 'active' : '' }}"
                               data-val="visually-image"
                               href="{{ route('visually.image', [], false) }}"
                               title="Показать изображения">
                                <i class="visually-image"></i>
                            </a>
                            <a class="mx-auto {{ !visuallyImage() ? 'active' : '' }}"
                               data-val="visually-image"
                               href="{{ route('visually.image', [], false) }}" title="Убрать изображения">
                                <i class="visually-no-image"></i>
                            </a>
                        </div>

                        <div class="row visually-font visually-selected mx-auto">
                            <a href="{{ route('visually.font', [20], false) }}" data-val="f20"
                               class="col-md-4 f20 {{ visuallyFontString(20) }}">A</a>
                            <a href="{{ route('visually.font', [24], false) }}" data-val="f24"
                               class="col-md-4 f24 {{ visuallyFontString(24) }}">A</a>
                            <a href="{{ route('visually.font', [27], false) }}" data-val="f27"
                               class="col-md-4 f27 {{ visuallyFontString(27) }}">A</a>
                        </div>

                        <div class="row visually-color visually-selected mx-auto">
                            <a href="{{ route('visually.color', ['black-white'], false) }}" data-val="visually-black-white"
                               class="col-md-2 a-black-white {{ visuallyColorString('black-white') }}">C</a>
                            <a href="{{ route('visually.color', ['white-black'], false) }}" data-val="visually-white-black"
                               class="col-md-2 a-white-black {{ visuallyColorString('white-black') }}">C</a>
                            <a href="{{ route('visually.color', ['dark-blue-blue'], false) }}" data-val="visually-dark-blue-blue"
                               class="col-md-2 a-dark-blue-blue {{ visuallyColorString('dark-blue-blue') }}">C</a>
                            <a href="{{ route('visually.color', ['brown-beige'], false) }}" data-val="visually-brown-beige"
                               class="col-md-2 a-brown-beige {{ visuallyColorString('brown-beige') }}">C</a>
                            <a href="{{ route('visually.color', ['green-dark-brown'], false) }}" data-val="visually-green-dark-brown"
                               class="col-md-2 a-green-dark-brown {{ visuallyColorString('green-dark-brown') }}">C</a>
                        </div>

                        {{--<div class="row visually-letter">--}}
                            {{--<p>Межбуквенный интервал</p>--}}
                            {{--<a href="#" class="btn btn-default">Стандартный</a>--}}
                            {{--<a href="#" class="btn btn-default">Средний</a>--}}
                            {{--<a href="#" class="btn btn-default">Большой</a>--}}
                        {{--</div>--}}

                    </div>
                </div>

                @if ($qr)
                    <div class="card no-visually">
                        <div class="card-block">
                            <h5 class="card-title">QR-код текущей страницы</h5>

                            <img width="100%" src="{{ $qr }}"
                                 title="QR-код текущей страницы"
                                 alt="QR-код текущей страницы" />
                        </div>
                    </div>
                @endif

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

                <div class="card">
                    <div class="card-block">
                        <h5 class="card-title">Счётчики посещений</h5>

                        <div class="card-text">

                            <a href="{{ route('statistics', [], false) }}"
                               title="Статистика">
                                <img title="Счётчик посещений"
                                     alt="Счётчик посещений"
                                     src="{{ route('tracker', [], false) }}" />
                            </a>

                            @if (isset($counters) && $counters->count())
                                @foreach ($counters as $counter)
                                    <!-- begin {{ $counter->title }} -->
                                    {!! $counter->code !!}
                                    <!-- end {{ $counter->title }} -->
                                @endforeach
                            @endif
                            
                            <div>
                                Гостей: {{ \App\Models\TrackerModel::hostCount() }}<br />
                                Визитов: {{ \App\Models\TrackerModel::hitCount() }}<br />
                                Онлайн всего: {{ \App\Models\TrackerModel::onlineCount() }}
                            </div>

                        </div>
                    </div>
                </div>

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

        </div>

    </main>

    <div class="clearfix"></div>
    <br />

    <footer class="mainfooter">

        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
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
                        <div class="footer-pad">
                            <h4>
                                <a href="{{ route('contact', [], false) }}" title="Контакты">Контакты</a>
                            </h4>
                            <ul class="list-unstyled" itemscope itemtype="http://schema.org/Organization">
                                <li class="space">
                                    <address>
                                        <span itemprop="name">
                                            <a href="{{ route('contact', [], false) }}"
                                               title="Наш адрес">
                                                {{ $cfg('name', config('app.name', 'bavix')) }}</a></span>,

                                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                            <a href="{{ route('contact', [], false) }}"
                                               title="Наш адрес">
                                                <span itemprop="streetAddress">{{ $cfg('street', 'ул. 8 Марта, д. 57') }}</span>,
                                                <span itemprop="addressLocality">
                                                    {{ $cfg('city', 'г. БЕЛОРЕЧЕНСК') }},
                                                    {{ $cfg('region', 'Краснодарский край') }}</span>,
                                                <span itemprop="postalCode">{{ $cfg('index', '352631') }}</span>
                                            </a>
                                        </div>
                                    </address>
                                </li>
                                <li>
                                    Телефон: <span itemprop="telephone">
                                        <a href="tel:{{ phone($cfg('phone', '+7 (86155) 33803')) }}"
                                           title="Телефон">{{ $cfg('phone') }}
                                        </a>
                                    </span><br/>
                                    Электронная почта: <span itemprop="email">
                                        <a href="mailto:{{ $cfg('email', 'sut-belora@yandex.ru') }}"
                                           title="Электронная почта">{{ $cfg('email') }}
                                        </a>
                                    </span>
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
                        <img src="https://ds.bavix.ru/svg/logo.svg"
                             alt="Разработка и техническая поддержка сайта - bavix"
                             title="Разработка и техническая поддержка сайта - bavix" />

                        <span>Разработка и техническая поддержка сайта - bavix</span>
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
<script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="{{ asset('js/sot.js') }}"
        data-color="{{ visuallyColor() }}"
        data-font="{{ visuallyFont() }}"></script>

</body>
</html>
