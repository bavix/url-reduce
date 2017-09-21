<!DOCTYPE html>
<html>
<head>
    <title>{{ $danger ?? '18+' }} - {{ $item->parameters['title'] ?? '#' . $item->hash }} - URL Shortener</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="{{ asset2('https://cdn.bavix.ru/bootstrap/next/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>

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

    <meta property="og:title" content="{{ $item->parameters['title'] ?? $item->hash }}"/>
    <meta property="og:description" content="{{ $item->parameters['description'] ?? '' }}"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://{{ request()->getHost() }}/qr/{{ $item->hash }}"/>

    <meta name="twitter:image:src" content="https://{{ request()->getHost() }}/qr/{{ $item->hash }}"/>
    <meta name="twitter:site" content="{{ __('blocks.title') }}"/>
    <meta name="twitter:title" content="{{ $item->parameters['title'] ?? $item->hash }}"/>
    <meta name="twitter:description" content="{{ $item->parameters['description'] ?? '' }}"/>
    <meta name="twitter:domain" content="{{ request()->getHost() }}"/>

    <meta name="description" content="{{ $item->parameters['description'] ?? '' }}"/>
    <meta name="keywords" content="{{ keywords($item->parameters['title'] ?? 'URL Shortener', $item->parameters['tags'] ?? []) }}"/>

    <style>
        html, body {height: 100%;width: 100%}
        #be-right-back {word-wrap: break-word;max-width: 500px; padding: 15px}
        a.bavix:hover[href] {filter: contrast(150%)}
    </style>
</head>
<body>
<div class="d-flex" style="height: 100%; width: 100%;">
    <div id="be-right-back" class="mx-auto align-self-center row">

        <div class="col-12">
            <a class="bavix" href="https://bavix.ru/" title="{{ __('bavix.description') }}">
                <img alt="{{ __('bavix.description') }}"
                     title="{{ __('bavix.description') }}"
                     width="100%" height="100%"
                     src="https://ds.bavix.ru/svg/logo.svg" />
            </a>
        </div>

        <div class="col-12">
            <h3>
                <span class="float-right badge badge-danger">{{ $danger ?? '18+' }}</span>
                {{ $item->parameters['title'] ?? $item->hash }}
            </h3>
            <p>{{ $item->parameters['description'] ?? '' }}</p>
        </div>

        <div class="col-12">
            <p class="text-center">
                <a href="/" class="btn btn-primary" title="{{ __('blocks.title') }}">
                    {{ __('blocks.toMainPage') }}
                </a>
                <a href="{{ $item->url }}" rel="nofollow noreferrer" class="btn btn-danger" title="{{ __('blocks.goto') }}">
                    {{ __('blocks.goto') }}
                </a>
            </p>
        </div>

    </div>
</div>

</body>
</html>
