<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php($fullTitle = __('blocks.title'))
    @if(isset($title))
        @php($fullTitle = $title . ' / ' . $fullTitle)
    @endif

    <title>{{ $fullTitle }}</title>

    <!-- Styles -->
    <link href="{{ asset2('node_modules/bootstrap/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    <link href="{{ asset2('css/css-loader/index.css') }}" rel="stylesheet" />
    <link href="{{ asset2('css/default.css')  }}" rel="stylesheet"/>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png"/>
    <link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-icon-192x192.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png"/>
    <link rel="manifest" href="/favicons/manifest.json">

    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png"/>
    <meta name="theme-color" content="#ffffff"/>

    <meta property="og:title" content="{{ $fullTitle }}"/>
    <meta property="og:description" content="{{ __('blocks.description') }}"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:type" content="website"/>

    <meta name="twitter:site" content="{{ __('blocks.title') }}"/>
    <meta name="twitter:title" content="{{ $fullTitle }}"/>
    <meta name="twitter:description" content="{{ __('blocks.description') }}"/>
    <meta name="twitter:domain" content="{{ request()->getHost() }}"/>

    <meta name="description" content="{{ __('blocks.description') }}"/>

    @if(!empty($title))
        <meta name="keywords" content="{{ keywords($title) }}"/>
    @endif

</head>
<body>

<div class="wrapper container d-flex" style="min-height: 100%; width: 100%;">
    <div class="bx-container mx-auto align-self-center" style="width: 100%">

        @php($lang = app()->getLocale() === 'en' ? 'ru' : 'us')

        <a href="{{ route('language') }}" class="float-right"
           title="{{ __('blocks.changeLanguage') }}">
            <img width="18px" title="{{ __('blocks.changeLanguage') }}"
                 alt="{{ __('blocks.changeLanguage') }}"
                 src="https://ds.bavix.ru/svg/flags/4x3/{{ $lang }}.svg" />
        </a>

        <h1 class="text-center">
            <a href="{{ route('home') }}" title="{{ __('blocks.title') }}">{{ __('blocks.title') }}</a>
        </h1>

        <h5 class="text-center description">{{ __('blocks.description') }}</h5>

        <form class="bx-form" action="{{ route('shorter.store') }}">
            <div class="form-group">
                <div class="input-group input-group-lg">

                    <input class="form-control"
                           placeholder="{{ __('blocks.placeholderInputURL') }}"
                           name="url"
                           type="text"
                           autocomplete="off" />

                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-warning">

                            <img width="18px" src="/favicons/favicon-32x32.png"
                                 title="{{ __('blocks.submit') }}"
                                 alt="{{ __('blocks.submit') }}" />

                        </button>
                    </span>
                </div>

                <div class="form-control-feedback text-center"></div>
            </div>
        </form>

        <div class="collapse" id="collapse">
            <div class="mx-auto input-group">
                <input id="result" class="form-control"
                       name="shortUrl"
                       type="text"
                       value="hello"
                       readonly />

                <span class="input-group-btn">
                    <button title="Copy to clipboard!"
                            data-toggle="tooltip"
                            data-clipboard-target="#result"
                            class="btn btn-danger clipboard">
                        <img width="18px" src="https://ds.bavix.ru/svg/clipboard/clippy.svg"
                             title="Copy to clipboard!"
                             alt="Copy to clipboard!" />
                    </button>
                </span>
            </div>

            <div class="col-12" data-share-info>
                <div class="row">
                    <div class="col-md-5">
                        <div class="text-center">
                            <img id="qr-code" class="img-thumbnail" src="https://ds.bavix.ru/svg/logo.svg" title="QR-code" alt="QR-code" />
                        </div>
                        <div id="share" class="text-center" data-share-info>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <h3 class="share-title"></h3>
                        <p class="share-description"></p>
                    </div>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="text-center">
                <a class="social" href="/fbook" rel="nofollow" target="__blank" title="Facebook">
                    <i class="fa fa-3x fa-facebook-square icon-3d"></i>
                </a>
                <a class="social" href="/twitt" rel="nofollow" target="__blank" title="Twitter">
                    <i class="fa fa-3x fa-twitter-square icon-3d"></i>
                </a>
                <a class="social" href="/githb" rel="nofollow" target="__blank" title="Github">
                    <i class="fa fa-3x fa-github-square icon-3d"></i>
                </a>
            </div>

            <div class="text-center">
                <div class="referral">
                    <a href="/DigOn" rel="nofollow" target="__blank">
                        {{ __('blocks.digitalOceanTech') }}
                    </a>
                </div>
                <div class="referral">
                    <a href="https://docs.ln4.ru/" rel="nofollow" target="__blank">Swagger</a>
                </div>
                <div class="referral">
                    <a href="https://bavix.ru/" target="__blank">bavix</a>
                </div>
            </div>

            @if (counters()->count())
                <!--noindex-->
                <div style="display: none !important;">
                    @foreach (counters() as $counter)
                        {!! $counter->code !!}
                    @endforeach
                </div>
                <!--/noindex-->
            @endif

        </footer>
    </div>
</div>

<!-- Scripts -->
<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53347bb35778c0b9"></script>
<script src="{{ asset2('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset2('node_modules/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset2('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset2('node_modules/clipboard/dist/clipboard.min.js') }}"></script>
<script src="{{ asset2('js/default.js') }}"></script>

</body>
</html>
