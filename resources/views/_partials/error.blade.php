<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link href="{{ asset2('node_modules/bootstrap/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    @if (isset($reload))
        <link href="{{ asset2('css/css-loader/index.css') }}" rel="stylesheet" />
    @endif

    <style>
        html, body {height: 100%;width: 100%}
        #be-right-back {height: 200px;width: 260px}
        a.bavix:hover[href] {filter: contrast(150%)}
    </style>
</head>
<body>
<div class="d-flex" style="height: 100%; width: 100%;">
    <div id="be-right-back" class="mx-auto align-self-center">
        <a class="bavix" href="https://bavix.ru/" title="{{ __('bavix.description') }}">
            <img alt="{{ __('bavix.description') }}"
                 title="{{ __('bavix.description') }}"
                 width="100%" height="100%"
                 src="https://ds.bavix.ru/svg/logo.svg" />
        </a>
        @if (isset($reload))
            <div id="loaders">
                <div class="loader-container mx-auto arc-rotate-double">
                    <div class="loader">
                        <div class="arc-1"></div>
                        <div class="arc-2"></div>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($description))
            <h4 class="text-center">{{ $description }}</h4>
        @endif
        <h6 class="text-center">{{ $title }}</h6>
        @if (isset($toMainPage))
            <p class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary" title="{{ __('blocks.toMainPage') }}">
                    {{ __('blocks.toMainPage') }}
                </a>
            </p>
        @endif
    </div>
</div>

@if (isset($reload))
    <script src="{{ asset2('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script defer async>
        setInterval(function () {
            $.ajax({
                type: 'HEAD',
                url: '/',
                complete: function(xhr) {
                    if (xhr.status !== 503) {
                        location.reload();
                    }
                }
            });
        }, 2000);
    </script>
@endif
</body>
</html>
